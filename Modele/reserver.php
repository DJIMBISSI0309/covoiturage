<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $idtrajet=$_POST['id_trajet'];
    $client=checkInput($_POST['clientName']);
    $reservation=checkInput($_POST['resevation']);
    $date=$_POST['date'];
    $date=str_replace('T',' ',$date);
$sql="SELECT * FROM reservation WHERE idtrajet= ? AND idutilisateur= ?";
$req=$pdo->prepare($sql);
$req->execute([$reservation,$client]);
if($req->rowCount()>0){
    $_SESSION['msg']= '<div class="alert alert-danger">Vous avez deja reservé une place pour ce trajet</div>';

}else{
    //reserver une place
    $sql2="INSERT INTO reservation(date_reservation,idutilisateur,idtrajet)VALUES(?,?,?)";
    $req2=$pdo->prepare($sql2);
    $req2->execute([$date,$client,$reservation]);
  //decrementer le nombre de places disponibles
  $req->$pdo->prepare("UPDATE trajets SET nombres_places_disponibles=nombres_places_disponibles-1 WHERE idtrajet = ?");
  $req->execute([$idtrajet]);
  $_SESSION['success']= '<div class="alert alert-success">Reservation effectuée avec succès .</div>';
  header('Location: trajet.php?id='.$trajet_id);
//   header('Location: trajet.php?id='.$trajet_id);
  exit();
  

}
}
// $idutilisateur=$_SESSION['utilisateur_id'];

// $sql2="SELECT * FROM utilisateur WHERE ToBeDriver = 0 AND idutilisateur = ? ";
// $res=$pdo->prepare($sql2);
// $res->execute([$idutilisateur]);

function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  
?>