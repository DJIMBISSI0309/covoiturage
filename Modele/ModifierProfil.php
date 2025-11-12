<?php
// session_start();
require 'database.php';


// if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST['envoyer'])){
//     $id =  $_POST['Nutilisateur'] ;
//     $nom =  checkInput($_POST['nom'] );
//     $prenom = checkInput( $_POST['prenom'] );
//     $email =  checkInput($_POST['email'] );
//     $motPasse= password_hash($_POST['MotDePasse'],PASSWORD_DEFAULT);
//     $password1= $_POST['MotDePasse'];
//     $confirmpassword=$_POST['MotDePasse1'];
//    //     if($password1 != $confirmpassword){
//    //     // $_SESSION['infos']='<div class="alert alert-danger">LES mots de passes sont differents!';
//    //     // $error = "Les Mots de passes sont différents !";
//    //     // echo '<script> alert("Les mots de passes sont differents"); </script>';
//    //     // echo '<meta http-equiv="refresh" content="0; URL=../Vue/profilConducteur.php">';
//    //  }
   
//     $sqlUpdate="UPDATE utilisateur SET nom = :nom , prenom = :prenom,mot_de_passe=:motPasse,email = :email WHERE idutilisateur = :id";
//     $update=$pdo->prepare($sqlUpdate);
   
//     if($update->execute(array(
//    ':nom'=>$nom,
//    ':prenom'=>$prenom,
//    ':motPasse'=>$motPasse,
//    ':email'=>$email,
//    ':id'=> $id
//     )
//     )){
//    //    echo '<script> alert("modification reussie"); </script>';
//    //    echo '<meta http-equiv="refresh" content="0; URL=index.php">';
//         $_SESSION['update_message']='<div class="message alert-success">data updated successfully.</div>';
//          header("Location: ../Vue/index4.php");
//         exit();
//     }else{
//       $_SESSION['update_message']="Error updating data ."; 
//     }
//    }else{
//       $id=$_SESSION['conducteur_id'];
//       $sql="SELECT * FROM utilisateur WHERE idutilisateur= ?";
//       $result= $pdo->prepare($sql);
//       $result->execute([$id]);
//       $row=$result->fetch();
//    }





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

       $sqlUpdate="UPDATE utilisateur SET nom = :nom , prenom = :prenom,mot_de_passe=:motPasse,email = :email WHERE idutilisateur = :id";
       $update=$pdo->prepare($sqlUpdate);
      
    if($update->exute(array(
   ':nom'=>$nom,
   ':prenom'=>$prenom,
   ':motPasse'=>$motPasse,
   ':email'=>$email,
   ':id'=> $id
    )
    )){
          echo '<script> alert("modification reussie"); </script>';
          echo '<meta http-equiv="refresh" content="0; URL=../Vue/index.php">';
      

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