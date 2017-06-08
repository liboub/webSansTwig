<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDS</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

<?php

if (isset($_GET['message'])){

  $message =$_GET['message'];
} else {

  $message = "";
}






?>

<div class="container">
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <div class="login-panel panel panel-default">
        <div class="panel-heading">
          <h3 align="center" class="panel-title">Identification</h3>
        </div>
        <div class="panel-body">
          <form role="form" method="Post" action="connection.php">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="Identifiant" name="login" type="login" autofocus>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Mot de passe" name="password" type="password" value="">
              </div>

              <button type="submit" value="valider" class="btn btn-lg btn-success btn-block">Se connecter</button>
              </br>
              </br>
              </br>
              </br>
              <?php
              echo $message;
              ?>



            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


</body>

</html>
