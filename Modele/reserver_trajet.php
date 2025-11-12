<?php
session_start();
require 'database.php';
if(isset($_GET['id'])){
 $id = $_GET['id'];

$sql="SELECT utilisateur.idutilisateur as idutil,trajets.Depart,trajets.arrivee,trajets.date_heure,trajets.prix,
trajets.nombres_places_disponibles,conducteur.vehicule_type,trajets.idtrajet ,utilisateur.nom,utilisateur.prenom
 FROM conducteur,utilisateur,trajets  WHERE conducteur.idutilisateur=utilisateur.idutilisateur AND utilisateur.idutilisateur=trajets.idutilisateur
AND idtrajet = ? ";
$trajetPropose=$pdo->prepare($sql);
$trajetPropose->execute([$id]);
$trajet=$trajetPropose->fetch(PDO::FETCH_ASSOC);

 $idutilisateur=$_SESSION['utilisateur_id'];

$sql2="SELECT * FROM utilisateur WHERE  ToBeDriver= 0 AND idutilisateur= ? ";
$res=$pdo->prepare($sql2);
$res->execute([$idutilisateur]);
$ligne=0;
$row1=$res->fetch();

// if($res && isset($_SESSION['utilisateur_id'])){

// }
// function reserver_trajet($trajet_id){
// $idutilisateur= checkInput($_POST['']);
// $sql="SELECT* FROM trajets WHERE idtrajet= ?";
// $stmt=$pdo->prepare($sql);
// $res=$tmt->execute([$trajet_id]);
// if($res->nums_rows>0){
//     $row=$res->fetch();
    //   if($trajet["nombres_places_disponibles"]>0){
    //           //enregistrer la reservation
    //     $sql="INSERT INTO reservation (idtrajet,idutilisateur,date_heure_reservation) values('$id','$idutilisateur',NOW())";
    //     // $tmt=$pdo->prepare($sql);
    //        $pdo->exec($sql);
    //     //decrementer le nombres de places
    //     $sql=$pdo->prepare("UPDATE trajets SET nombres_places_disponibles=nombres_places_disponibles-1 WHERE idtrajet=?");
    //     $sql->execute([$id]);

    //     echo "Trajet reserve avec success";

    // }else{
    //   echo "il n ya plus de place disponible pour ce trajet ";
    // }
// }
// }
    }else{
      header('Location : ../Vue/trajetsProposer.php');
      exit();
    }


    if($_SERVER['REQUEST_METHOD']=='POST'){
      $idtrajet=$_POST['id_trajet'];
      $iduser=$_POST['id_user'];
      $client=checkInput($_POST['clientName']);
      $reservation=checkInput($_POST['reservation']);
      $places=checkInput($_POST['place']);
      $date=$_POST['date'];
      $date=str_replace('T',' ',$date);
     $sql1="SELECT * FROM reservation WHERE idtrajet= ? AND idutilisateur= ?";
    $req1=$pdo->prepare($sql1);
    $req1->execute([$reservation,$client]);
    //autre requete
    $sql3="SELECT * FROM trajets WHERE idtrajet=:trajet_id";
    $req3=$pdo->prepare($sql3);
    $req3->execute(['trajet_id'=>$idtrajet]);
    $rows=$req3->fetch();
     if($row=$req1->rowCount()>0){
      $_SESSION['msg']= '<div class="alert alert-danger">Vous avez deja reservé une place pour ce trajet</div>';
      header('Location : ../Vue/trajetsProposer.php');
      exit();
  }else{
    if($rows && $rows['nombres_places_disponibles']>=$places){
      //reserver une place
      $sql2="INSERT INTO reservation(date_heure_reservation,idutilisateur,idtrajet,place_reserves)VALUES(?,?,?,?)";
      $req2=$pdo->prepare($sql2);
      $req2->execute([$date,$client,$reservation,$places]);
    //decrementer le nombre de places disponibles
    $req=$pdo->prepare("UPDATE trajets SET nombres_places_disponibles= nombres_places_disponibles - :places WHERE idtrajet = :trajet_id");
    $req->execute(['places'=>$places,'trajet_id' => $idtrajet]);

    //Ajouter une notification
    $message="Nouvelle réservation de {$places} place(s) pour votre trajet.";
    $stmt=$pdo->prepare("INSERT INTO notification(idutilisateur,messages,idconducteur,choix)VALUES(:user_id,:message,:conducteur,1)");
    $stmt->execute([
      'user_id' =>$iduser , 'message'=>$message ,'conducteur'=>$rows['idutilisateur']
    ]);
    $_SESSION['success']= '<div class="alert alert-success">Reservation effectuée avec succès .</div>';
   
   
    header('Location: ../Vue/parametre.php');
  //   header('Location: trajet.php?id='.$trajet_id);
    exit();
    
  
  }else{
    echo "<div class='alert alert-danger'>Nombres de places non disponibles .</div>";
  }
}
  }
  // $idutilisateur=$_SESSION['utilisateur_id'];
  
  // $sql2="SELECT * FROM utilisateur WHERE ToBeDriver = 0 AND idutilisateur = ? ";
  // $res=$pdo->prepare($sql2);
  // $res->execute([$idutilisateur]);
  ///
  // function checkInput($data) 
  // {
  //   $data = trim($data);
  //   $data = stripslashes($data);
  //   $data = htmlspecialchars($data);
  //   return $data;
  // }  
function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// //traitement des requetes
// if(isset($_GET["page"]&& $_GET["page"])=="accueil" ){
//   afficher_trajets();
// }
///////////////////////////////////

// // afficher les details d un trajet
// if(isset($_GET["page"]&& $_GET["page"])=="datails_trajet" && isset($_GET["id"])){
//     afficher_details_trajet($_GET["id"]);
// }
// //reserver un trajet 
// if(isset($_POST["trajet_id"])){
//     reserver_trajet($_POST["trajet_id"]);
// }
?>