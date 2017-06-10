<?php
session_start();
if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}
require 'CControleurTuteur.php';
$tuteur = new CControleurTuteur;
if (isset($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'],$_COOKIE['idEntreprise'])) {
  $donnees = array(
      "nom"=>$_POST['nom'],
      "prenom"=>$_POST['prenom'],
      "mail"=>$_POST['mail'],
     "tel"=>$_POST['tel'],
     "idEntreprise"=>$_COOKIE['idEntreprise']);
  $idTuteur=$tuteur->ajouterTuteur($donnees);
}
$idPeriode = $_COOKIE['idPeriode'].
$idEntreprise = $_COOKIE['idEntreprise'];
        require_once 'CControleurPeriodeStage.php';
        $cControleurPeriodeStage = new CControleurPeriodeStage();

        require_once 'CControleurEntreprise.php';
        $cControleurEntreprise=new CControleurEntreprise;

        require_once 'CControleurStagiaire.php';
        $cControleurStagiaire=new CControleurStagiaire();

        require_once 'CControleurFormateur.php';
        $cControleurFormateur=new CControleurFormateur();

        require_once 'CControleurTuteur.php';
        $cControleurTuteur=new CControleurTuteur();



$periode=$cControleurPeriodeStage->unePeriode($idPeriode);

$entreprise=$cControleurEntreprise->uneEntreprise($periode->getIdEntreprise());

$stagiaire=$cControleurStagiaire->unStagiaire($periode->getIdStagiaire());

$formateur=$cControleurFormateur->unFormateur($periode->getIdFormateur());

$tuteur=$cControleurTuteur->unTuteur($periode->getIdTuteur());
 ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>récapitulatif</title>

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
  <div class="container">
    <h2>recapitulatif</h2>

    <section class="row">
        <div class="col-md-12 date">Date</div>
        <?php
        echo 'date de debut : '.$periode->getDateDebut().'<br>';
        echo 'date de debut : '.$periode->getDateFin().'<br>';


         ?>
    </section>
    <section class="row">
        <div class="col-md-5">
            <section class="row">
                <div class="col-md-12 cadre">Stagiaire</div>
                <div class="col-md-10 col-lg-offset-2">
                <?php
                echo 'nom : '.$stagiaire->getNom().'<br>';
                echo 'prenom : '.$stagiaire->getPrenom().'<br>';
                echo 'mail : '.$stagiaire->getMail().'<br>';
                echo 'telephone : '.$stagiaire->getTel().'<br>';

                 ?>
               </div>
            </section>
            <section class="row">
                <div class="col-md-12 cadre">Tuteur</div>
                <div class="col-md-10 col-lg-offset-2">
                <?php
                echo 'nom : '.$tuteur->getNom().'<br>';
                echo 'prenom : '.$tuteur->getPrenom().'<br>';
                echo 'mail : '.$tuteur->getMail().'<br>';
                echo 'telephone : '.$tuteur->getTel().'<br>';

                 ?>
               </div>
            </section>
        </div>


        <div class="col-md-7">
            <section class="row">
                <div class="col-md-12 cadre">Entreprise</div>
                <?php
                echo 'nom : '.$entreprise->getNom().'<br>';
                echo 'adresse  : '.$entreprise->getAdnum().'   '.$entreprise->getAdrue();
                echo 'ville : '.$entreprise->getAdville().'<br>';
                echo 'code postal : '.$entreprise->getAdcp().'<br>';
                echo 'telephone : '.$entreprise->getTel().'<br>';
                echo 'mail  : '.$entreprise->getMail().'   '.$entreprise->getAdrue().'<br>';
                echo 'siret : '.$entreprise->getSiret().'<br>';
                echo 'ape : '.$entreprise->getApe().'<br>';

                 ?>
            </section>
            <section class="row">
                <div class="col-md-12 cadre">Poste</div>
                <?php
                echo 'poste : '.$periode->getPoste().'<br>';


                 ?>
            </section>
        </div>
    </section>
    <section class="row">
        <div class="col-md-12 activite">Activité</div>
        <?php
        echo ' '.$periode->getActivites().'<br>';

         ?>
    </section>
</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
