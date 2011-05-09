# Utiliser Bill

##Installation
1. git submodule add https://github.com/shadowhand/dompdf.git vendor
2. cd vendor && git submodule update --init

### Pour chaque produits
* Si le prix (**price**) est précisé, il sera pris en compte dans les totaux de l'ensemble des produits.
* Si la quantité (**quantity**) est précié, elle sera prise en compte leur du calcul des totaux.
* Si la tva (**vat**) est précisé, elle sera prise en compte, sinon ce sera la tva par défaut précisée dans le fichier de configuration qui sera prise en compte.

### Exemple d'utilisation

Dans votre controller :
~~~
$dest = array(
	'name' => 'Company Name',
	'contact' => 'Mr. Contact',
);

$product1 = array(
	'name' => 'product 1',
	'description' => 'description of the first product',
	'quantity' => '3',
	'price' => '1',
);

$product2 = array(
	'name' => 'product 2',
	'description' => 'description of the second product',
	'quantity' => '5',
	'price' => '2',
	'tva' => '6',
);

$infos = array(
		'fact_nb' => '007',
		'client_nb' => '008',
		'date' => '24/01/2012',
		'object' => 'Object of the bill',
);

$pdf = Bill::factory();

$pdf->dest($dest);

$pdf->item($product1);
$pdf->item($product2);

$pdf->infos($infos);

// Use the PDF as the request response
$this->response->body($pdf);

// Display the PDF in the browser as "my_bill.pdf"
// Remove "inline = TRUE" to force the PDF to be downloaded
$this->response->send_file(TRUE, 'facture.pdf', array('inline' => TRUE));
~~~