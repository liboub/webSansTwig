<?php
require 'CControleurPeriodeStage.php';
$periode = new CControleurPeriodeStage;
//$idPeriode = $_COOKIE['idPeriode'];
$idTuteur = $_GET['id'];
$assigner = $periode->assignerTuteur(1,$idTuteur);
setcookie("idTuteur",$idTuteur,time()+3600);
?>
