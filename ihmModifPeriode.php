<?php
session_start();

if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}
$idPeriode = $_GET['idPeriode'];
// on cree le cookie id periode
setcookie("idPeriode",$idPeriode,time()+3600);
require 'CControleurPeriodeStage.php';
$CControleurPeriodeStage = new CControleurPeriodeStage;
$periode = $CControleurPeriodeStage->unePeriode($idPeriode);
$idStagiaire = $_SESSION['idStagiaire'];
?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>gestion des periodes de stage</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class = "container" >
    <div class = "row">
    <div class="col-md-10 col-md-offset-5">
    <h1>bienvenue</h1>
    <br>
    </div>
    <div class="col-md-10 col-md-offset-3">
    <p> pour vous rensigner votre stage veillez utiliser le formulaire ci-dessous</p>
  </div>
  </div>
  <div class = "row">
    <div class="col-md-8">
    <h3> periode </h3>
    <form  method="Post" action="ihmModifEntreprise.php?idEntreprise=<?php echo $periode->getIdEntreprise(); ?>">
      <p> les dates sont a ajouter au format 2015-12-13 </p>
 <div class="form-group">
   <label for="dateDebut" class="col-md-2 col-form-label">demarre le :</label>
   <input type="date" class="form-control"  name="dateDebut" id="dateDebut" value="<?php echo $periode->getDateDebut(); ?>">
 </div>
 <div class="form-group">
   <label for="dateFin" class="col-md-2 col-form-label">finit le :</label>
   <input type="date" class="form-control" name="dateFin" id="dateFin" value="<?php echo $periode->getDateFin(); ?>">
 </div>
 <div class="form-group">
   <label for="dateFin" class="col-md-2 col-form-label">poste :</label>
   <input type="text" class="form-control" name="poste" id="poste" value="<?php echo $periode->getPoste(); ?>">
 </div>
 <div class="form-group">
  <label for="activite" class="col-md-2 col-form-label">activitées:</label>
  <textarea class="form-control" rows="5" id="activite" name="activite"  ><?php echo $periode->getActivites(); ?></textarea>
</div>

   <button type="submit" class="btn btn-default">envoyer</button>
     </form>
</div>

</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
