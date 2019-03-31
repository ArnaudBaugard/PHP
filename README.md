# To-do-List

Voici mon projet micro_blog

## Base de données.
Je vous ai donné un fichier micro_blog.sql contenant les différents tables à avoir.

Le nom de la base : micro_blog

Le nom des 2 tables : messages et utilisateur

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  `fichier` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `utilisateur` (`pseudo`, `passe`) VALUES
('admin', 'admin');


## Fonctionnalités

Voici la liste des différentes fonctionnalités présentes :
* Affichage des messages
* Ajout de messages
* Ajout d'images
* Modification des messages (et des images)
* Suppression de messages
* Possibilité de vote (non fait en AJAX)
* Redimensionnement d'image
* Système de cookie
* Possibilité d'avoir un compte. (nom : admin, passe : admin)

## Fonctionnalités manquantes
* Smarty
* Regex URL

Merci d'avoir lu jusqu'ici, et bon courage !
