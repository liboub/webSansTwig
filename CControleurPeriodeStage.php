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
    public function modifierPeriode($donnees,$idPeriode)
    {
      require_once 'CBdd.php';
          $cBdd= new CBdd();
          $bdd=$cBdd->getConnection();
          $req = $bdd->prepare('UPDATE periode SET dateDebut =:dateDebut, dateFin = :dateFin , poste=:poste, activite=:activite WHERE id = '.$idPeriode.'');
          $req->execute(array(
              'dateDebut' => $donnees['dateDebut'],
              'dateFin' => $donnees['dateFin'],
              'poste' => $donnees['poste'],
              'activite' => $donnees['activite'] ));
    }

    public function assignerEntreprise($idPeriode, $idEntreprise) {
        require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();
        $q = $bdd->prepare('UPDATE periode SET idEntreprise="'.$idEntreprise.'" WHERE id='.$idPeriode.' ');
        $q->execute();
        header('location: ihmTuteur.php');
    }

    public function assignerTuteur($idPeriode, $idTuteur) {
        require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();
        $q = $bdd->prepare('UPDATE periode SET idTuteur="'.$idTuteur.'" WHERE id='.$idPeriode.' ');
        $q->execute();
        header('location: ihmRecap.php');
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
    // ON RECUPERE toutes les periodes de stage du stagiaire
    public function listePeriodeStagiaire($idStagiaire){
       require_once 'CBdd.php';
            $cBdd= new CBdd();
            $bdd=$cBdd->getConnection();

            // on recupere les periodes des stage du stagiaire
       $q = $bdd->query('SELECT id ,dateDebut , dateFin , idTuteur , idEntreprise , idStagiaire FROM periode WHERE Periode.idStagiaire = '.$idStagiaire.' ' );
        $donneesPeriode = $q->fetchALL(PDO::FETCH_NUM);
        // on recupere les entreprises du stagiaire
      foreach ($donneesPeriode as  $value) {
        $qEntreprise = $bdd->query('SELECT nom FROM entreprise WHERE id = '.$value[4].'' );
       $donneesEntreprise[] = $qEntreprise->fetch(PDO::FETCH_NUM);
      }
      // on recupere les tuteur du stagiaire
      foreach ($donneesPeriode as  $value) {
        $qTuteur = $bdd->query('SELECT nom FROM tuteur WHERE id = '.$value[3].'' );
       $donneesTuteur[] = $qTuteur->fetch(PDO::FETCH_NUM);

      }

// on fusionne les trois tableaux le nom de l'entreprise est 5 et le tuteur est 6
$tailleDonneesPeriode = count($donneesPeriode);
for ($i=0; $i <$tailleDonneesPeriode ; $i++) {
  array_push($donneesPeriode[$i], $donneesEntreprise[$i][0],$donneesTuteur[$i][0]);
}
          return $donneesPeriode;

    }
}
