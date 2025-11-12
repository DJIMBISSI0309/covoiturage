<?php
session_start();
require 'database.php';
require 'function.php';

if($_SERVER['REQUEST_METHOD']==="POST"){
    $email=checkInput($_POST['email']);
    $mot_de_passe=checkInput($_POST['password']);
    if(connexionConducteur($email,$mot_de_passe)){
        header('Location: ../Vue/profilConducteur.php');
        exit();

}elseif(connexionUtilisateur($email,$mot_de_passe)){
    header('Location: ../Vue/trajetsProposer.php');
    exit();
}else{
    $_SESSION['erreur']='<div class="alert alert-danger">Email ou mot de passe incorrect.</div>';
    header('Location: ../Vue/connect.php');
    exit();
    // echo '<script> alert("Email ou mot de passe incorrect"); </script>';
    // echo '<meta http-equiv="refresh" content="0; URL=../Vue/connect.php">';
    //  echo "<p> Email ou mot de passe incorrect </p>";
    // $error= ' Email ou mot de passe incorrect ';
    // header('Location: ../Vue/utilisateur/connect.php');
    // exit();
}

}
function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>