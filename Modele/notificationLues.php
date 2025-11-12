<?php
session_start();
require 'database.php';
if(isset($_SESSION['utilisateur_id'])){
$user_id=$_SESSION['utilisateur_id'];
$stmt=$pdo->prepare("UPDATE notification SET is_read=1 WHERE idutilisateur= :user_id");
$stmt->execute(['user_id'=>$user_id]);
echo json_encode(['success'=> true]);
}

if(isset($_SESSION['conducteur_id'])){
    $conducteur_id=$_SESSION['conducteur_id'];
    $stmts=$pdo->prepare("UPDATE notification SET is_read = 1 WHERE idconducteur = :conducteur_id");
    $stmts->execute(['conducteur_id'=> $conducteur_id]);
    echo json_encode(['success'=> true]);  
}