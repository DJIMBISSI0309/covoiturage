<?php

session_start();
require 'database.php';

$conducteur_id=$_SESSION['conducteur_id'];
$sql="SELECT * FROM  conducteur WHERE idconducteur= ?";
$req=$pdo->prepare($sql);
$req->execute([$conducteur_id]);
if($req->rowCount()==0){
  
    
    echo '<script> alert("vous devez être un conducteur pour proposer un trajet"); </script>';
    echo '<meta http-equiv="refresh" content="0; URL=../Vue/index.php">';
    exit();
    // header('Location: profil.php');
    // exit();

}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_SESSION['utilisateur_id'])){
        $user_id=$_SESSION['utilisateur_id'];
       }
    
    $conduteur_id=$_POST['id_conducteur'];
    $depart= checkInput($_POST['depart']);
    $arrivee =checkInput($_POST['arrivee']);
    $date=$_POST['date'];
    $date=str_replace('T',' ',$date);
    $typeVehicule =$_POST['optradio'];
    // $heure=$_POST['heure'];
    $nbre_places=$_POST['nb_place'];
    $prix=checkInput($_POST['prixDuTrajet']);
    //inserer le trajet dans la base de donnees 
$sql="INSERT INTO trajets (Depart,arrivee,date_heure,prix,nombres_places_disponibles,idutilisateur,type_vehicule) VALUES(:depart,:arrivee,:date,:prix,:nb_places,:conducteur_id,:vehicule)";
$req = $pdo->prepare($sql);
$req->execute(
    array(
     ':depart' =>$depart,
     ':arrivee' =>$arrivee,
     ':date' =>$date,
     ':prix'=>$prix,
     ':nb_places' =>$nbre_places,
     ':conducteur_id' =>$conducteur_id,
     ':vehicule' => $typeVehicule
    )
  
    );
   $user=$pdo->prepare("SELECT  idutilisateur FROM utilisateur WHERE idutilisateur != :user_id AND ToBeDriver = 0" );
   $user->execute(['user_id'=> $conducteur_id]);
   $interesse=$user->fetchAll();

    //notification pour chaque utilisateur

    foreach($interesse as $users){
        $notification_message="Un nouveau trajet a été proposé de {$depart} à {$arrivee}.";
        $stmt=$pdo->prepare("INSERT INTO notification(idutilisateur,idconducteur,messages,choix)VALUES(:user,:conducteur,:messages,0)");
        $stmt->execute(['user' => $users['idutilisateur'],'conducteur'=>$conducteur_id, 'messages'=>$notification_message]);
    }
   
    $_SESSION['success']= "trajet proposé avec succès !";
    header('Location: ../Vue/propTrajet.php');
    exit();

  
}
function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}   
?>