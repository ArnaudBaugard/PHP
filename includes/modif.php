<?php 

include("includes/connexion.inc.php");
$query="SELECT id FROM messages(contenu, date) VALUES(:contenu, :date)";

?>