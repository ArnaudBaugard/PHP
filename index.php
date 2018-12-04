<!DOCTYPE html>
<html lang="fr">

	<body id="page-top" class="index">

<?php 

include("includes/haut.inc.php");
if(isset($_GET['id'])){
    $identifiant = $_GET['id'];
}
 ?>
 
    <p>
    <?php

if (isset($_COOKIE['pseudo'])) {
	echo 'Bonjour '.$_COOKIE['pseudo'].' !';
}
else {
	echo 'Cookie non déclaré';
}
?>
    </p>

    <section>
        <div class="container">
            <div class="row">    
				<?php if(isset($_GET['id'])){ ?>
                <form action="message.php" method="POST">
                    <div class="col-sm-10">  
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Message"><?php 
                                include("includes/connexion.inc.php");
                                $query = "SELECT * FROM messages WHERE id = '$identifiant'";
                              $stmt = $pdo->query($query);
                              while ($donnees = $stmt->fetch()) {
                                echo $donnees['contenu'];
                              }		  
                            ?>               
                            </textarea>
                            <input type="hidden" id="id" name= "id" value=" <?php if(isset($_GET['id'])){ echo $_GET['id'];}else{echo 0;} ?> "></input>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </div>                        
                </form>
            </div>
			  <?php
                }
                else{
              ?>
                <form action="message.php" method="Post">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                    </div>
                </form>
            </div>
			
          <?php } ?>

            <div class="row">
            <?php 

                include("includes/connexion.inc.php");
                $query="SELECT * FROM messages ORDER BY date desc";
                $stmt=$pdo->query($query);
                while($donnees = $stmt->fetch()){
                          ?><blockquote>
                              <p><?php echo $donnees['contenu'];?></p>
                              <footer>
                                <?php echo date('Y-m-d H:i:s', $donnees['date']);?>
                              </footer>
							  <a href="index.php?id=<?php echo $donnees['id'] ?>" class="btn btn-success">Modifier</a> <a href="includes/supprimer.php?id=<?php echo $donnees['id'] ?>" class="btn btn-danger"> Supprimer </a>
                          </blockquote>
                    <?php
                      }
                    ?>


                </div>
            </div>
        </div>
    </section>

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
