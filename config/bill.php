<?php defined('SYSPATH') or die('No direct script access.');

return array(
	'default' => array(
		'template' => 'pdf/default',
		
		'data' => array(
			'vat' => 21,
			'sender' => array(
				'vat' => 'TVA BE 0000.000.000',
				'name' => 'Default SPRL',
				'street' => 'Boulevard par defaut, 1',
				'city' => '0000 Default Belgique',
				'tel' => '0000/00.00.00',
				'email' => 'contact@default.com',
				'bank' => 'MYBANK 001-0000000-00',
				'iban' => 'IBAN BE00 0000 0000 0000',
				'website' => 'www.default.com',
			),
		),
	),
	'reaklab' => array(
		'template' => 'pdf/default',
		
		'data' => array(
			'vat' => 21,
			'sender' => array(
				'vat' => 'TVA BE 0827.675.759',
				'name' => 'Reaklab SPRL',
				'street' => 'Boulevard Initialis, 1',
				'city' => 'B-7000 Mons',
				'tel' => '0489/33.24.99',
				'email' => 'contact@reaklab.com',
				'bank' => 'MYBANK 001-6123729-01',
				'iban' => 'IBAN BE43 0016 1237 2901',
				'website' => 'www.reaklab.com',
			),
		),
	),
);
