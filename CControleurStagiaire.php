<?php


class CControleurStagiaire {

    private $unStagiaire;
    private $listeStagiaire;

    function __construct() {

    }

    public function unStagiaire($idStagiaire){
       require_once 'CBdd.php';
        $cBdd= new CBdd();
        $bdd=$cBdd->getConnection();

       $q = $bdd->query('SELECT * FROM stagiaire WHERE id = '.$idStagiaire.'');
       $donnees = $q->fetch(PDO::FETCH_ASSOC);

       require_once 'CStagiaire.php';
       return new CStagiaire($donnees);
   }



   public function listeTuteur($idStagiaire,$selection){
       require_once 'CBdd.php';
        $cBdd= new CBdd();
        $bdd=$cBdd->getConnection();

       $donneesTab=array();
       $y=0;
       $q = $bdd->query('SELECT id, nom, prenom  FROM stagiaire WHERE idEntreprise = '.$idStagiaire.'');
       while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
           $i=0;
           $ligne=array();
           foreach ($selection as $Colonne){
             $ligne[$i]= $donnees[$selection[$i]];
             $i++;
           }
           $donneesTab[$y] = $ligne;
           $y++;
       }
       return $donneesTab;
   }


  public function authentification($login,$password){
      require_once 'CBdd.php';
        $cBdd= new CBdd();
        $bdd=$cBdd->getConnection();

      $q = $bdd->query('SELECT * FROM stagiaire WHERE login=("' . $login . '")');
      $donnees = $q->fetch(PDO::FETCH_ASSOC);

      if ($donnees['password'] != $password) {
        return  $id = NULL;
      }else{
          return $id = $donnees['id'];

      }
    }

      public function modifierStagiaire($donnees,$id){
              require_once 'CBdd.php';
              $cBdd= new CBdd();
              $bdd=$cBdd->getConnection();

              $req = $bdd->prepare('UPDATE stagiaire SET nom =:nom, prenom = :prenom , mail=:mail, tel=:tel WHERE id = '.$id.'');
              $req->execute(array(
                  'nom' => $donnees['nom'],
                  'prenom' => $donnees['prenom'],
                  'mail' => $donnees['mail'],
                  'tel' => $donnees['tel']
              ));


    }
}
