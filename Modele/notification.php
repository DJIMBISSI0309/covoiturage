<?php
session_start();
require 'database.php';
if(isset($_SESSION['utilisateur_id'])){

$user_id=$_SESSION['utilisateur_id'];
$stmt=$pdo->prepare("SELECT * FROM notification,utilisateur WHERE utilisateur.idutilisateur=notification.idutilisateur AND notification.idutilisateur = :user_id AND is_read = 0 AND choix = 0 ORDER BY created_at DESC");
$stmt->execute(['user_id'=>$user_id]);
$notifications=$stmt->fetchAll();
echo json_encode($notifications);
} 
if(isset($_SESSION['conducteur_id'])){
    $conducteur_id=$_SESSION['conducteur_id'];
    $stmts=$pdo->prepare("SELECT * FROM notification WHERE  notification.idconducteur = :conducteur_id AND choix = 1 AND is_read = 0 ORDER BY created_at DESC");
    $stmts->execute(['conducteur_id' => $conducteur_id]);
    $notification=$stmts->fetchAll();
    echo json_encode($notification);
    }