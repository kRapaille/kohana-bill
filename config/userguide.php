<?php
return array
(
    // Leave this alone
    'modules' => array(
 
        // This should be the path to this modules userguide pages, without the 'guide/'. Ex: '/guide/modulename/' would be 'modulename'
        'bill' => array(
 
            // Whether this modules userguide pages should be shown
            'enabled' => TRUE,
 
            // The name that should show up on the userguide index page
            'name' => 'Bill',
 
            // A short description of this module, shown on the index page
            'description' => 'Extension de la classe View de Kohana qui génère un PDF de votre facture à partir d\'un template Twig.',
            
            // Copyright message, shown in the footer for this module
            'copyright' => '&copy; 2010–2011 Kévin Rapaille',
        )   
    )
);