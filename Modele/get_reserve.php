<?php
session_start();
header('Content-Type: application/json');
require 'database.php';
$user_id=$_SESSION['utilisateur_id'];

if(!isset($_SESSION['utilisateur_id'])){
    echo json_encode(['error'=>'Utilisateur non conneté']);
    exit;
}
try{
    $stmt=$pdo->prepare("SELECT * FROM reservation INNER JOIN trajets ON trajets.idtrajet=reservation.idtrajet WHERE reservation.idutilisateur=:user_id");
    
    $stmt->execute(['user_id'=>$user_id]);
    $reservations=$stmt->fetchAll();
    
    //formater les dates et calculer le temps restant
    foreach($reservations as &$reservation){
      $departure_time=new DateTime($reservation['date_heure']);
      $now= new DateTime();
      $interval =$now->diff($departure_time);
      $reservation['time_left']=[
        'days'=>$interval->d,
        'hours' =>$interval->h,
        'minutes' =>$interval->i
      ];
      $reservation['can_cancel']= ($interval->d * 1440 + $interval->h * 60 + $interval->i) > 30;
    }
    echo json_encode($reservations);
    }catch(PDOException $e){
      http_response_code(500);
      echo json_encode([
        'error'=>'Erreur de base de données',
        'details' => $e->getMessage()
      ]);
    }
?>