<?php
 session_start();
 // si l'utilisateur n'est pas connecter , on le vire
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
    <title>renseigner une entreprise</title>

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

    <h1>bienvenue</h1>

    <p> pour enregistrer une nouvelle entreprise veillez utiliser le formulaire ci-dessous</p>
  </div>
    <div class = "row">
      <div class="col-md-8">
    <h3> entreprise </h3>
    <form method="Post" action="ihmModifTuteur.php">
    <div class="form-group">
    <label for="nom">nom de l'entreprise</label>
    <input type="text" class="form-control" id="nom" name="nom">
    </div>
    <div class="form-group">
    <label for="adnum">numero de rue </label>
    <input type="text" class="form-control" id="adnum" name="adnum" >
    </div>
    <div class="form-group">
    <label for="adrue"> rue </label>
    <input type="text" class="form-control" id="adrue" name="adrue" >
    </div>
    <div class="form-group">
    <label for="adville"> ville </label>
    <input type="text" class="form-control" id="adville" name="adville" >
    </div>
    <div class="form-group">
    <label for="adcp"> code postal </label>
    <input type="text" class="form-control" id="adcp" name="adcp" >
    </div>
    <div class="form-group">
    <label for="tel"> telephone </label>
    <input type="text" class="form-control" id="tel" name="tel" >
    </div>
    <div class="form-group">
    <label for="mail"> email </label>
    <input type="email" class="form-control" id="mail" name="mail" >
    </div>
    <div class="form-group">
    <label for="siret"> siret </label>
    <input type="text" class="form-control" id="siret" name="siret" >
    </div>
    <div class="form-group">
    <label for="siret"> ape </label>
    <input type="text" class="form-control" id="ape" name="ape" >
    </div>
    <button type="submit" class="btn btn-default">envoyer</button>
    </form>
      </div>



        </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
    /* Tableau */
    $(document).ready(function () {
    $('#tableau').DataTable({"language": {"url":"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"}});
    });
    </script>
  </body>
</html>
