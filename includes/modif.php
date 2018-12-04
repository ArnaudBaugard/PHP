<?php 

include ("connexion.inc.php");
	
	$query="UPDATE messages SET contenu = :contenu, date = :date WHERE id=:id; ";

	$prep = $pdo->prepare($query);

	$prep->bindValue(':contenu',$_POST['message']);
	$prep->bindValue(':date',time());
	$prep->bindValue(':id', $_POST['id']);

	$prep->execute();

header("Location:../index.php");

?>