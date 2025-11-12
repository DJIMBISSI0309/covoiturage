<?php
session_start();
require 'database.php';
if(!isset($_SESSION['conducteur_id'])){
  header("Location: ../Vue/index.php");
  exit();
}
// require 'securite.php';
$utilisateur_id=$_SESSION['conducteur_id'];

// var_dump($_GET['userId']);
$sql="SELECT * FROM conducteur,utilisateur  WHERE conducteur.idutilisateur=utilisateur.idutilisateur AND utilisateur.idutilisateur=?";
$req=$pdo->prepare($sql);
$req->execute([$utilisateur_id]);
$conducteur=$req->fetch();

// header('Location: ../Vue/profilConducteur.php');
// exit();
// if(!$conducteur){
//     echo"conducteur non trouve";
// }

$sql2="SELECT * FROM trajets WHERE idutilisateur = ? ";
$req2=$pdo->prepare($sql2);
$req2->execute([$_SESSION['conducteur_id']]);
// $trajet=$req2->fetch(PDO::FETCH_ASSOC);
//recuperer les informations du conducteur

// if($trajet){
//     echo "";
//     echo "Depart: ".$trajet['depart'];
//     echo "Arrivee: ".$trajet['arrivee'];
//     echo "Date: ".$trajet['date'];
//     echo "heure: ".$trajet['heure'];
//     echo "Nombres de places: ".$trajet['nb_places'];
//     echo "Prix: ".$trajet['prix']."fcfa";
//     echo "conducteur:".$conducteur['nom']." ".$conducteur['prenom'];
// }

// NOM:
// Prenom:
// Email:
// vous êtes un conducteur.
// vous n êtes  pas encore conducteur


$id = $_SESSION['conducteur_id'];
$sql="SELECT * FROM utilisateur WHERE idutilisateur= ?";
$result= $pdo->prepare($sql);
$result->execute([$id]);
$row=$result->fetch();

   if($_SERVER["REQUEST_METHOD"]=="POST"){
      $nom =  checkInput($_POST['nom'] );
      $prenom = checkInput( $_POST['prenom'] );
       $email =  checkInput($_POST['email'] );
       $motPasse= password_hash($_POST['MotDePasse'],PASSWORD_DEFAULT);
       $password1= $_POST['MotDePasse'];
        $confirmpassword=$_POST['MotDePasse1'];
              if($password1 != $confirmpassword){
              $_SESSION['infos']='<div class="alert alert-danger">LES mots de passes sont differents!';
              $error = "Les Mots de passes sont différents !";
              echo '<script> alert("Les mots de passes sont differents"); </script>';
              echo '<meta http-equiv="refresh" content="0; URL=../Vue/profilConducteur.php">';
              exit();
           }

         $sqlUpdate="UPDATE utilisateur SET nom = :nom , prenom = :prenom,mot_de_passe=:motPasse,email = :email WHERE idutilisateur = :id";
         $update=$pdo->prepare($sqlUpdate);
           
    if($update->execute(array(
   ':nom'=>$nom,
   ':prenom'=>$prenom,
   ':motPasse'=>$motPasse,
   ':email'=>$email,
   ':id'=> $id
    )
    )){
          echo '<script> alert("modification reussie"); </script>';
          echo '<meta http-equiv="refresh" content="0; URL=../Vue/profilConducteur.php">';
      

      } else {
          echo "modification echouée" ;
      }
  }  

   function checkInput($data) 
   {
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
   }
?>