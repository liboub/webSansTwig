<?php
session_start();
if (empty($_SESSION['idStagiaire'])) {
    header('Location: index.php');
    exit;
}
// les fichier requis
require 'CControleurTuteur.php';
require_once 'CControleurPeriodeStage.php';
require_once 'CControleurEntreprise.php';
require_once 'CControleurStagiaire.php';
require_once 'CControleurTuteur.php';
// on istancie les objets
$tuteur = new CControleurTuteur;
$cControleurPeriodeStage = new CControleurPeriodeStage;
$cControleurEntreprise=new CControleurEntreprise;
$cControleurStagiaire=new CControleurStagiaire;
$cControleurTuteur=new CControleurTuteur;
// on recupere l'id de la periode
$idPeriode = $_COOKIE['idPeriode'];
// on recupere les donnees de la periode
$periode=$cControleurPeriodeStage->unePeriode($idPeriode);
// on recupere les donnees de l'entreprise
$entreprise=$cControleurEntreprise->uneEntreprise($periode->getIdEntreprise());
// on recupere les donnees du stagiaire
$stagiaire=$cControleurStagiaire->unStagiaire($periode->getIdStagiaire());

// on rasssemble les infos neccessaire a la modification dans un tableau
if (isset($_POST['nom'],$_POST['prenom'],$_POST['mail'],$_POST['tel'])) {
  $donnees = array(
      "nom"=>$_POST['nom'],
      "prenom"=>$_POST['prenom'],
      "mail"=>$_POST['mail'],
     "tel"=>$_POST['tel']);
     // si on recupere nouveau dans la variable alors on cree un nouveau tuteur
     if (isset($_GET['nouveau'])) {
       // on cree le nouveau tuteur et recupere l'id
       $idAjouterTuteur = $cControleurTuteur->ajouterTuteur($donnees);
       // on modifie l'id tuteur dans periode de stagiaire
      $assignerTuteur  = $cControleurPeriodeStage->assignerTuteurSansRedirection($idPeriode, $idAjouterTuteur);
     }
     // sinon on modifie le tuteur
     else {
       // on modifie les donnees du tuteur
    $modifierTuteur=$tuteur->modifierTuteur($donnees,$tuteur->getId);
     }
     // on recupere les donnees du tuteur
     $tuteur=$cControleurTuteur->unTuteur($periode->getIdTuteur());
}

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
        <div class="col-md-12 date"><h4>Date</h4></div>
        <?php
        echo 'date de debut : '.$periode->getDateDebut().'<br>';
        echo 'date de debut : '.$periode->getDateFin().'<br>';


         ?>
    </section>
    <section class="row">
        <div class="col-md-5">
            <section class="row">
                <div class="col-md-12 cadre"><h4>Stagiaire</h4></div>
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
                <div class="col-md-12 cadre"><h4>Tuteur</h4></div>
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
                <div class="col-md-12 cadre"><h4>Entreprise</h4></div>
                <?php
                echo 'nom : '.$entreprise->getNom().'<br>';
                echo 'adresse  : '.$entreprise->getAdnum().'   '.$entreprise->getAdrue().'<br>';
                echo 'ville : '.$entreprise->getAdville().'<br>';
                echo 'code postal : '.$entreprise->getAdcp().'<br>';
                echo 'telephone : '.$entreprise->getTel().'<br>';
                echo 'mail  : '.$entreprise->getMail().'   '.$entreprise->getAdrue().'<br>';
                echo 'siret : '.$entreprise->getSiret().'<br>';
                echo 'ape : '.$entreprise->getApe().'<br>';

                 ?>
            </section>
            <section class="row">
                <div class="col-md-12 cadre"><h4>Poste</h4></div>
                <?php
                echo 'poste : '.$periode->getPoste().'<br>';


                 ?>
            </section>
        </div>
    </section>
    <section class="row">
        <div class="col-md-12 activite"><h4>Activité</h4></div>
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
