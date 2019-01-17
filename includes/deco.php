<?php

/* Auteur : Arnaud Baugard */
/* Version : 2.0 */
/* Projet : micro_blog */

/* Page qui gère les cookies */

	$temps= 365*24*3600;
	$domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
	setcookie('pseudo', "ok", time(), '/', $domain, false);
	header("Location:..\index.php");
?>