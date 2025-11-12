<?php
//include 'connexion.php';
// session_start();
if(!isset($_SESSION['utilisateur_id']) || !isset($_SESSION['conducteur_id'])){
    header("Location: ../Vue/index.php");
    exit();
  
  
}