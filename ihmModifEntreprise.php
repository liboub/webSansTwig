<?php
 session_start();
if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}
// les fichiers requis
require 'CControleurPeriodeStage.php';
require_once 'CControleurEntreprise.php';
// on instancie les objets
$cControleurPeriodeStage = new CControleurPeriodeStage;
$cControleurEntreprise=new CControleurEntreprise;
// on cree le tableau de donnes de la periode
$données = array("dateDebut" => $_POST['dateDebut'],
    "dateFin" => $_POST['dateFin'],
    "poste" => $_POST['poste'],
    "activite" => $_POST['activite']);
// on recupere l'id de la periode
    $idPeriode =  $_COOKIE['idPeriode'];
// on recupere l'id du stagiaire
$idStagiaire = $_SESSION['idStagiaire'];
$idPeriode =  $_COOKIE['idPeriode'];
// on va chercher les donnees de la periode
$unPeriode=$cControleurPeriodeStage->unePeriode($idPeriode);
// on modifie la periode
$modifierPeriode = $cControleurPeriodeStage->modifierPeriode($données,$idPeriode);
// on va chercher les infos de l'entreprise
$unEntreprise=$cControleurEntreprise->uneEntreprise($unPeriode->getIdEntreprise());
// on va chercher la liste des entreprises
$entreprise = $cControleurEntreprise->listeEntreprise();
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

<h2> vous pouvez mofifier les donnees de l'entreprise ici
  </div>
    <div class = "row">
      <div class="col-md-8">
    <h3> entreprise </h3>
    <form method="Post" action="ihmModifTuteur.php?idEntreprise=<?php echo $unPeriode->getIdEntreprise() ?>">
    <div class="form-group">
    <label for="nom">nom de l'entreprise</label>
    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $unEntreprise->getNom(); ?>">
    </div>
    <div class="form-group">
    <label for="adnum">numero de rue </label>
    <input type="text" class="form-control" id="adnum" name="adnum" value="<?php echo $unEntreprise->getAdnum(); ?>">
    </div>
    <div class="form-group">
    <label for="adrue"> rue </label>
    <input type="text" class="form-control" id="adrue" name="adrue" value="<?php echo $unEntreprise->getAdrue(); ?>">
    </div>
    <div class="form-group">
    <label for="adville"> ville </label>
    <input type="text" class="form-control" id="adville" name="adville" value="<?php echo $unEntreprise->getAdville(); ?>">
    </div>
    <div class="form-group">
    <label for="adcp"> code postal </label>
    <input type="text" class="form-control" id="adcp" name="adcp" value="<?php echo $unEntreprise->getAdcp(); ?>">
    </div>
    <div class="form-group">
    <label for="tel"> telephone </label>
    <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $unEntreprise->getTel(); ?>">
    </div>
    <div class="form-group">
    <label for="mail"> email </label>
    <input type="email" class="form-control" id="mail" name="mail" value="<?php echo $unEntreprise->getMail(); ?>">
    </div>
    <div class="form-group">
    <label for="siret"> siret </label>
    <input type="text" class="form-control" id="siret" name="siret" value="<?php echo $unEntreprise->getSiret(); ?>">
    </div>
    <div class="form-group">
    <label for="siret"> ape </label>
    <input type="text" class="form-control" id="ape" name="ape" value="<?php echo $unEntreprise->getApe(); ?>">
    </div>
    <button type="submit" class="btn btn-default">envoyer</button>
    </form>
      </div>
        </div>
        <br>
        <br>
<div class="row">
  <h3> vous pouvez choisir une entreprise dans la liste </h3>
        <table id="tableau" class="table table-striped table-bordered" width="100%" cellspacing="0">
           <thead>
               <tr>

                       <th>nom</th>
                       <th>rue </th>
                       <th>ville</th>
                       <th>code postal</th>
                       <th>telephone</th>
                       <th>email</th>

               </tr>
           </thead>

           <tbody>
      <?php
             foreach ($entreprise as  $value) {
               ?>
                   <tr>
                          <td><a href="assignerEntreprise.php?id=<?php echo $value->getId();?>"><?php echo $value->getNom() ;?></a></td>
                          <td><a href="assignerEntreprise.php?id=<?php echo $value->getId();?>"><?php echo $value->getAdnum().'   '.$value->getAdrue()?></a></td>
                          <td><a href="assignerEntreprise.php?id=<?php echo $value->getId();?>"><?php echo $value->getAdville() ;?></a></td>
                          <td><a href="assignerEntreprise.php?id=<?php echo $value->getId();?>"><?php echo $value->getAdcp();?></a></td>
                          <td><a href="assignerEntreprise.php?id=<?php echo $value->getId();?>"><?php echo $value->getTel();?></a></td>
                          <td><a href="assignerEntreprise.php?id=<?php echo $value->getId();?>"><?php echo $value->getMail();?></a></td>
                   </tr>
      <?php
      }
      ?>
           </tbody>
       </table>
    </div>
    <br>
    <br>
    <div class="row">
      <a href="ihmModifNouvelleEntreprise.php">vous pouvez ajouter une nouvelle entreprise</a>
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
