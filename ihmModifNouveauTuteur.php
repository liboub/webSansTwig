<?php
session_start();
if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}

 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>ajouter un nouveau tuteur</title>

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
    <div class="col-md-8">
    <h3> vous pouvez creer un tuteur ici </h3>
    <form  method="Post" action="ihmModifRecap.php?nouveau=oui">

 <div class="form-group">
   <label for="dateDebut">nom du tuteur :</label>
   <input type="text" class="form-control"  name="nom" id="nom" >
 </div>
 <div class="form-group">
   <label for="dateFin">prenom du tuteur :</label>
   <input type="text" class="form-control" name="prenom" id="prenom" >
 </div>
 <div class="form-group">
   <label for="dateFin">email du tuteur :</label>
   <input type="text" class="form-control" name="mail" id="mail" >
 </div>
 <div class="form-group">
   <label for="dateFin">telephone tuteur :</label>
   <input type="text" class="form-control" name="tel" id="tel" >
 </div>
   <button type="submit" class="btn btn-default">envoyer</button>
     </form>
</div>
</div>
</div>
