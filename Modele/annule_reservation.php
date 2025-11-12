<?php
require 'database.php';
// require '../Vue/reserve.php';
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){
    $iduser=$_SESSION['utilisateur_id'];
    $idtrajet = $_POST['idreservation'];
//recuperer la reservation et les details du trajets
$reserve=$pdo->prepare("SELECT * FROM reservation JOIN trajets ON reservation.idtrajet=trajets.idtrajet WHERE
reservation.idreservation=:id_reserve AND resevation.idutilisateur=:user_id");
$reserve->execute(['id_reserve'=>$idtrajet,'user_id'=>$iduser]);
$resert=$reserve->fetch();
if($resert){
  //calculer le temps avant le depart
$depart_time=new DateTime($resert['date_heure']);
$now =new DateTime('now',new DateTimeZone('UTC'));
$interval=now->diff($depart_time);
$minutes_left=($interval->days*1440) + ($interval->h*60) + $interval->i;
//verifier si l'annulation est possible
if($minutes_left > 30){
  //Annuler la reservation
  $stmt=$pdo->prepare("UPDATE reservation SET status='cancelled' WHERE idresevation=:id_reserve");
  $stmt->execute(['id_reserve'=>$idtrajet]);

//Remmettre a jour les places 
$stmt=$pdo->prepare("UPDATE trajets SET nombres_places_disponnibles=nombres_places_disponnibles + :places WHERE idtrajet=:trajet_id" );
$stmt->execute(['places'=>$resert['places_reserves'],'trajet_id'=>$resert['idtrajet']]);
echo json_encode(['success'=>true,'message'=>'Reservation annulée']);
$message ="Réservation annulée :{resert['places_reserves']} place(s)";
$sql=$pdo->prepare("INSERT INTO notification (idconducteur,messages,choix)VALUES(:user_id, :message,1)");
$sql->execute(['user_id'=>$resert['idconducteur'],'message'=>$message]);

}else{
    echo json_encode(['success'=>false,'message'=>'Annulation impossible moins de 30 min avant le départ']);

}
}else{
    echo json_encode(['success'=>false,'message'=>'Reservation non trouvée']);
}

}
?>