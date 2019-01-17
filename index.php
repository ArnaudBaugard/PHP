<!DOCTYPE html>
<html lang="fr">

<!-- Auteur : Arnaud Baugard -->
<!-- Version : 2.0 -->
<!-- Projet : micro_blog -->

<!-- Page Index -->


	<body id="page-top" class="index">

	<?php 

		include("includes/haut.inc.php");		// Include du header //
		if(isset($_GET['id'])){
			$identifiant = $_GET['id'];			// On récupére l'identifiant //
		}
	?>
	
    <p>
	
    <?php				
			// Savoir si un cookie est déclaré, si oui on met le nom de l'utilisateur //
	if (isset($_COOKIE['pseudo'])) {
		echo 'Bonjour '.$_COOKIE['pseudo'].' !';
	}
	else { ?>	
	<a href="connection.php" class="btn btn-primary" style="margin-left : 45%; margin-top : 20px;"> Connectez-vous ! </a>
	<?php 
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
								while ($donnees = $stmt->fetch()) {				// Zone permettant d'envoyer un message //
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
						$limite = 5;
                        $nbr_Max_Articles = $pdo->query('SELECT id FROM messages');
                        $nbr_Articles = $nbr_Max_Articles->rowCount();
                        $nbr_Pages = ceil($nbr_Articles/$limite);
                        if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0){
                                $_GET['page'] = intval($_GET['page']);
                                $page_Actuelle = $_GET['page'];
                        }else{
                                $page_Actuelle = 1;
                        }
                        $page_Demarrage = ($page_Actuelle-1)*$limite;
				
				
                $query='SELECT * FROM messages ORDER BY date desc  LIMIT '.$page_Demarrage.','.$limite;		// LIMITATION DE 5 + Affichage des messages dans l'ordre décroissant //
                $stmt=$pdo->query($query);
                while($donnees = $stmt->fetch()){
                          ?><blockquote>
                              <p><?php echo $donnees['contenu'];?></p>
                              <footer>
                                <?php echo date('Y-m-d H:i:s', $donnees['date']);//Affichage de la date//?>			
                              </footer> <!-- Bouton modifier / supprimer et Vote -->
							  <a href="index.php?id=<?php echo $donnees['id'] ?>" class="btn btn-success">Modifier</a> <a href="includes/supprimer.php?id=<?php echo $donnees['id'] ?>" class="btn btn-danger"> Supprimer </a>
							  <a href="ajax_vote.php?id=<?php echo $donnees['id'] ?>" class="btn btn-primary buttonVote">Vote</a><p class="text-muted nbreVote"> Nombre de vote : <?php echo $donnees['vote'] ?></p>
						  </blockquote>
			<?php
                }
            ?>
        </div>
    </section>
	
			<?php
                for($i = 1;$i <= $nbr_Pages; $i++ ){
					echo("<li style='list-style-type: none;'><a style=' margin-left : 50%;color : red; font-weight :bold; text-decoration : underline; font-size : 24px;' href=\"index.php?page=".$i."\"> Page ".$i." </a>");
				}
            ?>


<?php include("includes/bas.inc.php"); //Include du footer// ?>
    
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
