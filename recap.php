<?php

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

$idPeriode=1;//période recupérée en GET

$periode=$cControleurPeriodeStage->unePeriode($idPeriode);

$entreprise=$cControleurEntreprise->uneEntreprise($periode->getIdEntreprise());

$stagiaire=$cControleurStagiaire->unStagiaire($periode->getIdStagiaire());

$formateur=$cControleurFormateur->unFormateur($periode->getIdFormateur());

$tuteur=$cControleurTuteur->unTuteur($periode->getIdTuteur());


echo 'date debut '.$periode->getDateDebut().'<br>';
echo 'date fin '.$periode->getDateFin().'<br>';
echo 'poste  '.$periode->getPoste().'<br>';
echo 'Activites  '.$periode->getActivites().'<br>';
echo 'poste  '.$periode->getPoste().'<br>';

echo 'd$tuteur '.$tuteur->getId().'<br>';

echo '$tuteur '.$tuteur->getMail().'<br>';


echo 'nom stagiare '.$stagiaire->getNom().'<br>';




echo 'date debut'.$formateur->getNom().'<br>';

echo 'date debut'.$formateur->getPrenom().'<br>';
