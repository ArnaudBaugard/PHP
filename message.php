<?php 
/* Auteur : Arnaud Baugard */
/* Version : 2.0 */
/* Projet : micro_blog */

/* Page pour insérer les messages et les modifier */


/* Il faut encore mettre à jour la date quand on modifie un message */

if(isset($_POST['id']) AND $_POST['id'] != 0){
    include("includes/connexion.inc.php");
		$query="UPDATE messages SET contenu = '".$_POST['message']."' WHERE id = '".$_POST['id']."'";
		$prep=$pdo->prepare($query);
		$prep->execute();
    header("Location:index.php");
	}
else{
    include("includes/connexion.inc.php");
		$query="INSERT INTO messages(contenu, date) VALUES(:contenu, :date)";
		$prep=$pdo->prepare($query);
		$prep->bindValue(':contenu', $_POST['message']);
		$prep->bindValue(':date', time());
		$prep->execute();
	header("Location:index.php");
}
?>