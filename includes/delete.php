<?php
include ("connexion.inc.php");

$query="DELETE FROM messages WHERE id=:id; ";

$prep = $pdo->prepare($query);

$prep->bindValue(':id', $_GET['id']);

$prep->execute();

header("Location:../index.php");


?>