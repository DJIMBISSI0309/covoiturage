<?php
session_start();
require 'database.php';


if($_SERVER['REQUEST_METHOD']==="POST"){
    // $utilisateur_id=checkInput($_POST['utilisateur_id']);
    // $utilisateur_id = $userId;
    $utilisateur_id = checkInput($_POST['userId']);
   
    $user_id=checkInput($_POST['utilisateur_id']);
    $permis_de_conduire=checkInput($_POST['permis_conduire']);
    $type_vehicule=checkInput($_POST['modeleVehicule']);
    $plaque_immatriculation=checkInput($_POST['plaque']);
   
$sql="SELECT * FROM conducteur WHERE idconducteur= ?";
$req=$pdo->prepare($sql);
$req->execute([$utilisateur_id]);
if($row=$req->rowCount()>0){
    $_SESSION['conducteur']='<div class=" alert alert-danger">Vous êtes deja un conducteur </div>';
    echo "<div>".$_SESSION['conducteur']."</div>";
}else{
    //inscrire l utilisateur comme un conducteur
    $sql="INSERT INTO  conducteur (idconducteur,numero_permis,idutilisateur,vehicule_type,plaque_immatriculation) VALUES(?,?,?,?,?)";

    $req=$pdo->prepare($sql);
    $req->execute([$utilisateur_id,$permis_de_conduire,$user_id,$type_vehicule,$plaque_immatriculation]);
    // echo "Vous etes maintenant conducteur";
    $_SESSION['conducteur_id']= $utilisateur_id;
    $_SESSION['conducteur_username']= $user_id;
    header('Location: ../Vue/profilConducteur.php?userId='.$_SESSION['conducteur_id']);
    exit();
    // header('Location: profil.php');
    // exit();
}
}else{
    // http_reponse_code(500);
    echo "";
}
function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
