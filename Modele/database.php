<?php
try{
  $dbHost = "localhost";
  $dbName = "covoiturage";
  $dbUsername = "root";
  $dbUserpassword = "";

//initialiser la connexion PDO
$pdo=new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8",$dbUsername,$dbUserpassword);
//definir le mode d'erreur
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    //en cas d'erreur ,afficher le message d'erreur 
    die("Erreur de connexion à la base de données :".$e->getMessage());
}
?>