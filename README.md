# Site des rongeurs

## Présentation

Le site des rongeurs n'est pas comme son nom l'indique un endroit pour se réunir et discuter de joyeuse petites bêtes poilues, non. Il s'agit là d'un site permettant à un utilisateurs de partager une collection qu'il possède avec les visiteurs. CE projet de site à été réalisé sur base d'un template bootstrap de type blog au départ puis remis au goût de son auteur dans l'optique de réalisé un site web agréable lors de la consultation et le partage de collections.

## Disponibilité

En tant que simple visiteur, vous avez le droit de:
* Vous inscrire ou vous connecter sur le site;
* Consulter les différentes collections.

En tant qu'utilisateur, vous pouvez:
* Vous créer une ou plusieurs collection;
* Ajouter de nouveaux objet à votre collection;
* Vous déconnecter de votre compte.

## Base de donnée

Le site emploie une base de donnée composée de 4 tables:
* users, qui enregistre les données des utilisateurs qui s'inscrivent [usrName, password]
* groupe, qui classifie une collection [genre, type]
* collection, qui détermine une collection d'un utilisateur [titre, description]
* item, qui est un des objet de collection d'un utilisateur [nom, dateAjout, urlImg]
