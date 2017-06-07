<?php

// Appel auto des classes********************************************************************

class CControleurPeriodeStage {

   private $periodeStage;

   function __construct() {
   }

    public function nouvellePeriode($idStagiaire,$dateDebut,$dateFin,$poste,$activite){
        require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();

            $req = $bdd->prepare('INSERT INTO periode(dateDebut, dateFin, idStagiaire, poste , activite) VALUES(:dateDebut, :dateFin, :idStagiaire,:poste,:activite)');
                $req->execute(array(
                'dateDebut' => $dateDebut,
                'dateFin' => $dateFin,
                'idStagiaire' => $idStagiaire,
                'poste' => $poste,
                'activite' => $activite
                ));

               return $bdd->lastInsertId();
    }

    public function assignerEntreprise($idPeriode, $idEntreprise) {
        require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();
        $q = $bdd->prepare('UPDATE periode SET idEntreprise="'.$idEntreprise.'" WHERE id='.$idPeriode.' ');
        $q->execute();
    }

    public function assignerTuteur($idPeriode, $idTuteur) {
        require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();
        $q = $bdd->prepare('UPDATE periode SET idTuteur="'.$idTuteur.'" WHERE id='.$idPeriode.' ');
        $q->execute();
    }

    public function unePeriode($idPeriode){
       require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();

       $q = $bdd->query('SELECT * FROM periode WHERE id = '.$idPeriode.'');
       $donnees = $q->fetch(PDO::FETCH_ASSOC);

       require_once 'CPeriodeStage.php';
       return new CPeriodeStage($donnees);
    }
    public function listePeriodeStagiaire($idStagiaire){
       require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();


       $q = $bdd->query('SELECT periode.id,periode.dateDebut,periode.dateFin,,stagiaire.prenom,entreprise.nomEnt,entreprise,tuteur.nomTuteur
         FROM periode , entreprise , tuteur , stagiaire
         WHERE Periode.idEntreprise = entreprise.id and Periode.idStagiaire = stagiaire.id and Periode.idTuteur = tuteur.id and Periode.idStagiaire =  '.$idStagiaire.' ' );
        $donnees = $q->fetchALL(PDO::FETCH_OBJ);
        return $donnees  ;


    }
}
