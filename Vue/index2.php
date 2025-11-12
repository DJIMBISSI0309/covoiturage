<?php
session_start();
// require '../Modele/database.php';
// require ' ../Modele/function.php';
require 'scripts.php';
if(isset($_SESSION['utilisateur_id'])){
// Bienvenue  $utilisateur['nom']." ".$utilisateur['prenom'].
echo '<h2 class="text-center mt-3">Bienvenue<b class="text-warning"> '.($_SESSION['utilisateur_username']).'</b></h2>';
} else {
    //afficher le contenu pour les visiteurs
    $_SESSION['info']='<div class=" alert alert-danger">connectez vous ou inscrivez-vous pour utiliser le site </div>';
    echo '<div class="alert alert-danger>'. $_SESSION['info'] .'</div>';
    //profil
    //deconnexion
    //inscription
    //connexion
}
//rechercher un trajet
//proposer un trajet
// connectez vous pour proposer un trajet
 

?>

