<?php
session_start();
require 'database.php';


// if(isset($_SESSION['utilisateur_id'])){
//     $user_id = $_SESSION['utilisateur_id'];
//     $sql=$pdo->prepare("SELECT * FROM utilisateur WHERE idutilisateur= ?");
//     $sql->execute([$_SESSION['utilisateur_id']]);
//     return $req=$sql->fetch(PDO::FETCH_ASSOC);
// }else{
//     return false;
// }

if($_SERVER['REQUEST_METHOD']=='POST'){

    $nom = checkInput($_POST['username']);
    $prenom = checkInput($_POST['prenom']);
    $email = checkInput($_POST['email']);
    $numero = checkInput($_POST['numero']);
	$userId = checkInput($_POST['user_id']);

	$sql = "UPDATE utilisateur SET nom = ?, prenom= ? , email = ? ,tel= ? WHERE idutilisateur = ?";
       $res=$pdo->prepare($sql);
       $res->execute([$nom,$prenom,$email,$numero,$userId]);
    if($res) {
	
		$_SESSION['messages'] = "Modification redussie";	
	} else {
	
		$_SESSION['messages'] = "Erreur lors de la modification";
	}

	$pdo=null;

	// echo json_encode($valid);

}










function checkInput($data) 
   {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }

// if(isset($_SESSION['utilisateur_id'])){
// $user_id = $_SESSION['utilisateur_id'];

// $sql = "SELECT * FROM utilisateur WHERE idutilisateur = 2 ";

// $query=$pdo->prepare($sql);
// $query->execute();
// $result = $query->fetch(PDO::FETCH_ASSOC);
// }
