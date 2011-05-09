<?php defined('SYSPATH') or die('No direct script access.');

class Kohana_Bill extends View
{
	static $template = '';
	
	public static function factory($file = NULL, array $data = NULL)
	{
		if(is_null($data))
		{
			$data = Kohana::config('bill.default.data');
		}
		
		if(is_null($file) || !array_key_exists($file, Kohana::config('bill')))
		{
			$file = Kohana::config('bill.default.template');
		}
		else
		{
			$file = Kohana::config('bill.'.$file.'.template');
		}
		
		self::$template = $file;
		
		$data['totalHTVA'] = 0;
		$data['totalTVA'] = 0;
		$data['totalTTC'] = 0;
		
		if(!array_key_exists('dest', $data))
		{
			$data['dest'] = array();
		}
		if(!array_key_exists('infos', $data))
		{
			$data['infos'] = array();
		}
		
		return new Kohana_Bill($data);
	}
	
	public function __construct(array $data = NULL)
	{
		if ($data !== NULL)
		{
			$this->_data = $data + $this->_data;
		}
	}
	
	public function dest(array $dest)
	{
		$this->_data['dest'] = Arr::merge($this->_data['dest'], $dest);
	}
	
	public function infos(array $infos)
	{
		$this->_data['infos'] = Arr::merge($this->_data['infos'], $infos);
	}
	
	public function item(array $item)
	{
		$this->_data['items'][] = $item;
	}
	
	public function render($file = NULL)
	{
		if(isset($this->_data['items']))
		{
			$same_TVA = true;
			
			$temp_TVA = 0;
			
			foreach($this->_data['items'] as $item)
			{
				if(is_numeric($item['price']))
				{
					if(!isset($item['quantity']))
					{
						$item['quantity'] = 1;
					}
					
					$this->_data['totalHTVA'] = $this->_data['totalHTVA'] + $item['price'] * $item['quantity'];
					
					if(!isset($item['vat']))
					{
						$item['vat'] = $this->_data['vat'];
					}
					
					if ($temp_TVA == 0)
					{
						$temp_TVA = $item['vat'];
					}
					
					$this->_data['totalTVA'] = $this->_data['totalTVA'] +  $item['price'] * $item['quantity'] * ($item['vat']/100);	
					
					if($item['vat'] != $temp_TVA)
					{
						$same_TVA = false;
					}
					
					$temp_TVA = $item['vat'];
				}
			}

			$this->_data['totalTTC'] = $this->_data['totalHTVA'] + $this->_data['totalTVA'];
			
			if($same_TVA)
			{
				$this->_data['vat'] = '('.$temp_TVA.' %) ';
			}
			else
			{
				$this->_data['vat'] = '';
			}
		}
		
		$html = Twig::factory(self::$template , $this->_data);

		// Turn off strict errors, DOMPDF is stupid like that
		$ER = error_reporting(~E_STRICT);

		// Render the HTML to a PDF
		$pdf = new DOMPDF;
                $pdf->set_paper("a4");
		$pdf->load_html($html);
		$pdf->render();

		// Restore error reporting settings
		error_reporting($ER);

		return $pdf->output();
	}
}

if ( ! defined('DOMPDF_ENABLE_REMOTE'))
{
	// Unfortunately this is a define, not a setting
	define('DOMPDF_ENABLE_REMOTE', TRUE);
}

// Load DOMPDF configuration, this will prepare DOMPDF
require_once Kohana::find_file('vendor', 'dompdf/dompdf_config.inc');