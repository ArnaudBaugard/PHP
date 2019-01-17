<?php

/* Auteur : Arnaud Baugard */
/* Version : 2.0 */
/* Projet : micro_blog */

/* Ajout des votes */

/* Il faut encore le faire en ajax et éviter les votes multiples*/

	include("includes/connexion.inc.php");
	
	setcookie('vote', 'oui', time()+60*60*24*30);
	
	//if(isset($_COOKIE['vote'])){
	//	echo 'Vous ne pouvez pas voter deux fois !';
	//}
	//else {
     //tout ce qu'il y a à faire pour prendre en compte le vote
		$query="UPDATE messages SET vote=vote+1 WHERE id=:id";
		$prep=$pdo->prepare($query);
		$prep->bindValue(':id', $_GET['id']);
		$prep->execute();
	header("Location:index.php");
//}


?>