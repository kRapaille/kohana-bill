# Créer son template

Afin d'utiliser Bill, il est nécessaire de créer au préalable un [template Twig](http://www.twig-project.org/doc/templates.html).

Cependant, quelques variables/mot clefs sont spécifique à Bill et peuvent être utile lors de la création de votre template : 

## Les totaux
- `{{ totalHTVA }}` pour le total hors TVA
- `{{ totalTVA }}` pour le total de la TVA
- `{{ totalTTC }}` pour le total TVA comprise

## L'affichage de la TVA
- Si tous les produits ont la même TVA, `{{ vat }}` contiendra *(21 %)* (dans le cadre d'une tva à 21%).
- Sinon, `{{ vat }}` sera vide.

# Utilisation du template

Afin de l'utiliser, il vous suffit de modifier le fichier de config *modules\bill\config\bill.php* et de lui préciser votre nouveau template.