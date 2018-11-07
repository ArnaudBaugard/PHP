<?php include ("includes/connexion.inc.php") ?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Micro blog</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">

  <?php
    include ("includes/haut.inc.php");
  ?>

    <!-- About Section -->
    <section>
        <div class="container">
            <div class="row">
              <?php if(isset($_GET['id'])){ ?>

                <form action="includes/update.php" method="Post">
                    <div class="col-sm-10">
                        <div class="form-group">
                            <textarea id="message" name="message" class="form-control" placeholder="Message"><?php
                              $identifiant = $_GET['id'];
                              $query = "SELECT * FROM messages WHERE id = '$identifiant'";
                              $stmt = $pdo->query($query);
                              while ($donnees = $stmt->fetch()) {
                                echo $donnees['contenu'];
                              }
                            ?>
                            </textarea>
							<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-success btn-lg">Modifier</button>
                    </div>
                </form>

              <?php
                }
                else{
              ?>

                <form action="includes/message.php" method="Post">
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
                <div class="col-md-12">

                    <?php
                      $query = "SELECT * FROM messages ORDER BY date desc";
                      $stmt = $pdo->query($query);
                      //var_dump($stmt->fetch());

                      while($donnees = $stmt->fetch()){
                          ?><blockquote>
                              <p><?php echo $donnees['contenu'];?></p>
                              <footer>
                                <?php echo date('Y-m-d H:i:s', $donnees['date']);?>
                              </footer>
							  <a href="index.php?id=<?php echo $donnees['id'] ?>" class="btn btn-success">Modifier</a> <a href="includes/delete.php?id=<?php echo $donnees['id'] ?>" class="btn btn-danger"> Supprimer </a>
                          </blockquote>
                    <?php
                      }
                    ?>


                </div>
            </div>
        </div>
    </section>

    <?php
      include ("includes/bas.inc.php");
    ?>
  </body>
</html>