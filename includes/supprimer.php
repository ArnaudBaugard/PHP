<?php 

include("connexion.inc.php");
$id=$_GET['id'];
$query="DELETE FROM messages WHERE id= $id";
$prep=$pdo->prepare($query);
$prep->execute();
header("Location:..\index.php");

?>