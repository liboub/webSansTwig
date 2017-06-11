<?php
require 'CControleurPeriodeStage.php';
$periode = new CControleurPeriodeStage;
$idPeriode = $_COOKIE['idPeriode'];
$idTuteur = $_GET['id'];
$assigner = $periode->assignerTuteur($idPeriode,$idTuteur);
setcookie("idTuteur",$idTuteur,time()+3600);
?>
