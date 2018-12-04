<!DOCTYPE html>
<html lang="fr">


<body id="page-top" class="index">

<?php include("includes/haut.inc.php"); ?>

 <form action="includes/verif.php" method="POST">
<label class="btn btn-secondary">Pseudo: <input id="pseudo" type="text" name="pseudo"/></label><br/>
<label class="btn btn-secondary">Mot de passe: <input id="passe" type="text" name="passe"/></label><br/>
<button type="submit" class="btn btn-success btn-lg">connexion</button>
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
