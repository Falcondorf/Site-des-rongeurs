# Site des rongeurs

## Présentation

Le site des rongeurs n'est pas comme son nom l'indique un endroit pour se réunir et discuter de joyeuse petites bêtes poilues, non. Il s'agit là d'un site permettant à un utilisateur de partager une collection qu'il possède avec les visiteurs. Ce projet de site a été réalisé sur base d'un template bootstrap de type blog au départ puis remis au goût de son auteur dans l'optique de réaliser un site web agréable lors de la consultation et le partage de collections.

## Disponibilité

En tant que simple visiteur, vous avez le droit de:
* Vous inscrire ou vous connecter sur le site.
* Consulter les différentes collections.

En tant qu'utilisateur, vous pouvez:
* Vous créer une ou plusieurs collection.
* Ajouter de nouveaux objet à votre collection.
* Vous déconnecter de votre compte.

## Base de donnée

Le site emploie une base de donnée composée de 4 tables:
* users, qui enregistre les données des utilisateurs qui s'inscrivent [usrName, password]
* groupe, qui classifie une collection [genre, type]
* collection, qui détermine une collection d'un utilisateur [titre, description]
* item, qui est un des objet de collection d'un utilisateur [nom, dateAjout, urlImg]

## Fichiers et utilisation

Le sites est constitué des différentes pages suivantes:

* 'index.php' qui compose la page d'index dans laquelle sont affiché deux messages, un de bienvenue et un redirigeant vers le F.A.Q.
* 'index-inscr.php' page accessible dans la boîte de connexion permettant à un visiteur de s'inscrire sur le site. Il lui faut seulement un nom et un mot de passe.
*  'Inscription.php' est un script php offrant la possibilité de s'inscrire dans la base de donnée du site et ainsi de pouvoir se connecter plus tard.
*  'Connexion.php' est un script php vérifiant via un formulaire un nom et un mot de passe dans la base de données users existe et offir une session à un utilisateur.
*  'deco.php' est un petit script php détruisant les variables de session de l'utilisateur et ainsi le déconnecte.
*  'ListeMembre.php' est une page affichant un tableau contenant les membres et leurs collections. Si un utilisateur n'a pas encore de collection, il n'est pas affiché.
*  'collection.php' est une page affichant toute les collections en slideshow. Seulement pour un utilisateurs connecté, deux boutons redirigent vers des formulaires permettant d'ajouter une collection ou un objet à une collection que l'on possède.
*  'AjoutCollec.php' page contenant un formulaire permettant de se rajouter une collection. On y choisit le genre et le type de collection dont il s'agit. Ensuite on donne un titre à la collection et une description.
*  'addCollec.php' est un script php qui va traiter les informations du formulaire de AjoutCollec.php et ainsi créer la collection et un groupe lié à l'utilisateur.
*  'ajoutItem.php' est un formulaire permettant de rajouter un objet à une de ses collections. Une requête sql permet de choisir la collection que l'on veut remplir. Le formulaire requiert ainsi le nom de l'objet et l'url où l'image est hébergé.
*  'addItem.php' est un script php qui va traiter le formulaire de ajoutItem.php et ainsi créer un nouvel item qui sera lié à une collection.
*  'categorie.php' est un script php appelé dans toute les pages ayant une requête sql qui affiche tous les type de collections rangé par genre.
