Vous pouvez créer la base de données en important le fichier "micro_blog.sql" ou sinon lisez les instructions suivantes.

Créer la base de données portant le nom : micro blog

Créer ensuite les 2 tables : 

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `vote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `pseudo` varchar(255) NOT NULL,
  `passe` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ps : N'oubliez pas de créer un utilisateur pour tester les cookies car la page inscription n'est pas faite.

Ensuite vous pouvez envoyer un message, le modifer et le supprimer.
Vous pouvez vous connecter et vous restez connecté sur la page même si vous rafraîchissez la page.
Vous pouvez également voter pour un message (mais je ne l'ai pas fait en AJAX et le vote multiple est possible).

Les messages sont triés dans l'ordre décroissant et il y a une limite de 5 messages par page, vous pouvez changer de page en cliquant sur les différentes pages en bas du blog.

