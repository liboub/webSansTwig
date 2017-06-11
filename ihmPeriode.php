<?php
session_start();
// si l'utilisateur n'est pas connecter , on le vire
if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}
$id = $_SESSION['idStagiaire'];
// les fichiers requis
require 'CControleurStagiaire.php';
// on istancie les objets
$ccontroleurStagiaire = new CControleurStagiaire;
// on recupere les donnees pour modifier la periode
if (isset($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'])) {
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $mail = $_POST['mail'];
  $tel = $_POST['tel'];
  $données = array("nom" => $nom,
      "prenom" => $prenom,
      "mail" => $mail,
      "tel" => $tel);
// on modifie la periode
$stagiaire = $ccontroleurStagiaire->modifierStagiaire($données, $id);
}



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
    <form  method="Post" action="ihmEntreprise.php">
      <p> les dates sont a ajouter au format 2015-12-13 </p>
 <div class="form-group">
   <label for="dateDebut" class="col-md-2 col-form-label">demarre le :</label>
   <input type="date" class="form-control"  name="dateDebut" id="dateDebut">
 </div>
 <div class="form-group">
   <label for="dateFin" class="col-md-2 col-form-label">finit le :</label>
   <input type="date" class="form-control" name="dateFin" id="dateFin">
 </div>
 <div class="form-group">
   <label for="dateFin" class="col-md-2 col-form-label">poste :</label>
   <input type="text" class="form-control" name="poste" id="poste">
 </div>
 <div class="form-group">
  <label for="activite" class="col-md-2 col-form-label">activitées:</label>
  <textarea class="form-control" rows="5" id="activite" name="activite"></textarea>
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
