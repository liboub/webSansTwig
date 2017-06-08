<?php
require 'CControleurPeriodeStage.php';
$periode = new CControleurPeriodeStage;
$idPeriode = $_COOKIE['idPeriode'];
$idEntreprise = $_GET['id'];
$assigner = $periode->assignerEntreprise($idPeriode,$idEntreprise);
setcookie("idEntreprise",$idEntreprise,time()+3600);
?>
