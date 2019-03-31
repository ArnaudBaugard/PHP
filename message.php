<?php

// Fichier permettant d'upload une image, d'insérer un message dans le base et de le modifer //




$dossier = 'upload/';
$fichier = basename($_FILES['avatar']['name']);
$taille_maxi = 100000000;
$taille = filesize($_FILES['avatar']['tmp_name']);
$extensions = array('.png', '.jpg', '.jpeg');
$extension = strrchr($_FILES['avatar']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg, ';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['avatar']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
          echo 'Upload effectue avec succes !';
     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}


if(isset($_POST['id']) AND $_POST['id'] != 0){
    include("includes/connexion.inc.php");
		$query="UPDATE messages SET contenu = '".$_POST['message']."', fichier = '".$fichier."' WHERE id = '".$_POST['id']."'";
		$prep=$pdo->prepare($query);
		$prep->execute();
    header("Location:index.php");
	}
else{
    include("includes/connexion.inc.php");
		$query="INSERT INTO messages(contenu, date, fichier) VALUES(:contenu, :date, :fichier)";
		$prep=$pdo->prepare($query);
		$prep->bindValue(':contenu', $_POST['message']);
		$prep->bindValue(':date', time());
		$prep->bindValue(':fichier', $fichier);
		$prep->execute();
	header("Location:index.php");
}



//move_uploaded_file(($_FILES['image']['tmp_name']), dirname(__FILE__));


// A stoker dans data / images /123.jpg 
//chmod 777 // 

?>