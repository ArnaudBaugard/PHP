<?php include 'includes/verif.php' ?>
<!DOCTYPE html>
<html lang="fr">


<!-- Auteur : Arnaud Baugard -->
<!-- Version : 2.0 -->
<!-- Projet : micro_blog -->

<!-- Page Inscription -->


<body id="page-top" class="index">

<?php include("includes/haut.inc.php"); ?>

   



<form method="post">
<label>Pseudo: <input type="text" name="pseudo"/></label><br/>
<label>Mot de passe: <input type="passwortd" name="passe"/></label><br/>
<label>Confirmation du mot de passe: <input type="password" name="passe2"/></label><br/>
<label>Adresse e-mail: <input type="text" name="email"/></label><br/>
<input type="submit" value="M'inscrire"/>
</form>








<?php include("includes/bas.inc.php"); ?>
    

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
