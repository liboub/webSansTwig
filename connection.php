<?php
session_start();
require_once 'CControleurStagiaire.php';
$ccontroleurStagiaire = new CControleurStagiaire;

$login = $_POST['login'];
$password = $_POST['password'];

$id = $ccontroleurStagiaire-> authentification($login,$password);

if ($id == NULL ) {

    header('Location: index.php?message=Mauvais login / password. Merci de recommencer');

}else{

    $_SESSION['idStagiaire'] = $id;
    header('Location: ihmAccueil.php');
}
