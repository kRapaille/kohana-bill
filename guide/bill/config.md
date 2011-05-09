# Configuration

Bill contient un fichier de config avec une configuration par defaut qui sera utilisée s'il n'y en a aucune de précisée à la création d'une facture ou si Bill ne trouve pas la configuration spécifiée.

[!!] A l'installation de Bill, n'oubliez pas de préciser votre template par defaut dans le fichier *modules\bill\config\bill.php*.

### Créer sa propre configuration

Vous pouvez créer autant de configuration que vous le souhaitez. Voici les informations minimum requise à la création de votre config :
~~~
[...]
'myConfig' => array(
		'template' => 'pdf/myConfigTemplate',
		
		'data' => array(
			'vat' => 21,
		),
),
[...]
~~~

Après, rien ne vous empêche d'ajouter dans **data** des données supplémentaire par defaut que vous souhaiteriez pour pour votre template.

Par exemple :

~~~
[...]
'myConfig' => array(
		'template' => 'path/myConfigTemplate',
		
		'data' => array(
			'vat' => 21,
			'sender' => array(
				'vat' => 'TVA BE 1234.567.890',
				'name' => 'Awesome Company',
				'street' => 'Boulevard Awesome, 1',
				'city' => 'B-1000 Brussel',
				'tel' => '0470/11.22.33',
				'email' => 'contact@awesomeCompany.com',
				'bank' => 'MYBANK 001-1234567-01',
				'iban' => 'IBAN BE43 0012 1234 5678',
				'website' => 'www.iamawesome.com',
			),
		),
),
[...]
~~~

Et pour l'utiliser :

~~~
$pdf = Bill::factory('myConfig');
~~~


