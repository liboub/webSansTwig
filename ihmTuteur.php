<?php
require 'CControleurEntreprise.php';
$entreprise = new CControleurEntreprise;
    $donnees = array(
        "nom"=>$_POST['nom'],
        "adnum"=>$_POST['adnum'],
        "adrue"=>$_POST['adrue'],
        "adville"=>$_POST['adville'],
        "adcp"=>$_POST['adcp'],
        "tel"=>$_POST['tel'],
        "mail"=>$_POST['mail'],
        "siret"=>$_POST['siret'],
        "ape"=>$_POST['ape']);


$idEntreprise = $entreprise->ajouterEntreprise($donnees);
setcookie("idEntreprise",$idEntreprise,time()+3600);
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>connection</title>

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
    <div >
  

    <div class = "container" >
      <div class = "row">
        <div class="col-md-8">
        <h3> tuteur </h3>
        <form  method="Post" action="ihmRecap.php">

     <div class="form-group">
       <label for="dateDebut">nom du tuteur :</label>
       <input type="text" class="form-control"  name="nom" id="nom">
     </div>
     <div class="form-group">
       <label for="dateFin">prenom du tuteur :</label>
       <input type="text" class="form-control" name="prenom" id="prenom">
     </div>
     <div class="form-group">
       <label for="dateFin">email du tuteur :</label>
       <input type="text" class="form-control" name="mail" id="mail">
     </div>
     <div class="form-group">
       <label for="dateFin">telephone tuteur :</label>
       <input type="text" class="form-control" name="tel" id="tel">
     </div>
       <button type="submit" class="btn btn-default">envoyer</button>
         </form>
    </div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
