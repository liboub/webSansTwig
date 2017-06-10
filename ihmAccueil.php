<?php

session_start();

if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}
//$id = $_SESSION['idStagiaire'];
$id = 6;
require 'CControleurStagiaire.php';
require 'CControleurPeriodeStage.php';
// on va chercher les infos personnelles du stagiaire
$ccontroleurStagiaire = new CControleurStagiaire;
$stagiaire = $ccontroleurStagiaire->unStagiaire($id);
// on va chercher la liste des periodes  de stage du stagiaire
$cControleurPeriodeStage = new CControleurPeriodeStage();
$periode=$cControleurPeriodeStage->listePeriodeStagiaire($id);

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

    </div>
    <div class = "row">
        <div class="col-md-8">
            <h3> Informatios personnelles </h3>
            <form  method="Post" action="ihmPeriode.php">

                <div class="form-group">
                    <label for="nom" class="col-md-2 col-form-label">Nom :</label>
                    <input type="text" class="form-control"  name="nom" id="nom" value="<?php echo $stagiaire->getNom(); ?>">
                </div>
                <div class="form-group">
                    <label for="prenom" class="col-md-2 col-form-label">Prénom :</label>
                    <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $stagiaire->getPrenom();?>">
                </div>
                <div class="form-group">
                    <label for="mail" class="col-md-2 col-form-label">E Mail :</label>
                    <input type="email" class="form-control" name="mail" id="mail"  value="<?php echo $stagiaire->getMail();?>" >
                </div>
                <div class="form-group">
                    <label for="tel" class="col-md-2 col-form-label">Telephonne :</label>
                    <input type="text" class="form-control" name="tel" id="tel" value="<?php echo $stagiaire->getTel();?>" >
                </div>

                <button type="submit" class="btn btn-default">envoyer</button>
            </form>
        </div>
        <div class="row">
        <div class="col-md-10">
        <h2>tableau recapitulatif des stages </h2>
        <table id="tableau" class="table table-striped table-bordered" width="100%" cellspacing="0">
           <thead>
               <tr>

                       <th>date debut</th>
                       <th>date de fin </th>
                       <th>nom entreprise</th>
                       <th>nom tuteur</th>
                       <th>modifier</th>


               </tr>
           </thead>

           <tbody>
    <?php
             foreach ($periode as  $value) {

               ?>
                   <tr>
                          <td><?php echo $value['1'] ;?></td>
                          <td><?php echo $value['2'];?></td>
                          <td><?php echo $value['6'] ;?></td>
                          <td><?php echo $value['7'];?></td>
                          <td><a href="ihmModifPeriode.php?idPeriode=<?php echo $value['0'];?>" class="col-lg-offset-5 glyphicon glyphicon-cog"></a></td>

                   </tr>
    <?php
    }
    ?>
           </tbody>
       </table>
       </div>
     </div>
    </div>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script>
    /* Tableau */
    $(document).ready(function () {
    $('#tableau').DataTable({"language": {"url":"//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"}});
    });
    </script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
