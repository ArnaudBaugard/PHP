<?php
/* Auteur : Arnaud Baugard */
/* Version : 2.0 */
/* Projet : micro_blog */

/* Redimensionnement d'image */
	
	$getextension = "upload/".$_GET['id'];	
	$extension = pathinfo($getextension, PATHINFO_EXTENSION);

if($extension == 'jpg' || $extension == 'jpeg'){
	$dossier = "upload/".$_GET['id'];													// Chemin où se trouve l'image //
	$width = 450;																		// Largeur fixe d'une image //
	$fichier = imagecreatefromjpeg($dossier);											// On crée une nouvelle image //
	$taille = getimagesize($dossier);													// On récupère la taille de l'image //	
	$largeur = $taille[0];																// On récupère la largeur d'origine //
	$hauteur = $taille[1];																// On récupère la hauteur d'origine //
	$height = ($width / $largeur) * $hauteur;											// On créé une nouvelle hauteur //
	$destination = imagecreatetruecolor($width, $height);								// On créé la nouvelle image avec lea nouvelle largeur et nouvelle hauteur
	imagecopyresampled($destination, $fichier, 0, 0, 0, 0, $width, $height, $largeur, $hauteur);					// On copie, redimensionne, et rééchantillonne l'image //
	imagejpeg($destination);															// On envoie l'image jpeg vers le navigateur //
	imagedestroy($destination);															// On libère la mémoire associée à l'image //
}
else if($extension == 'png'){
	$dossier = "upload/".$_GET['id'];													
	$width = 450;																		
	$fichier = imagecreatefrompng($dossier);											
	$taille = getimagesize($dossier);														
	$largeur = $taille[0];																
	$hauteur = $taille[1];																
	$height = ($width / $largeur) * $hauteur;											
	$destination = imagecreatetruecolor($width, $height);
	imagealphablending($destination, false );											// Renger le PNG transparent //
	imagesavealpha($destination, true );												// Renger le PNG transparent //
	imagecopyresampled($destination, $fichier, 0, 0, 0, 0, $width, $height, $largeur, $hauteur);					
	imagepng($destination);
	imagedestroy($destination);
}

?>





