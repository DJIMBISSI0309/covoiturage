<?php
session_start();
require 'database.php';
require 'function.php';

if($_SERVER['REQUEST_METHOD']=="POST"){
    $nom=checkInput($_POST['nom']);
    $prenom=checkInput($_POST['prenom']);
    $email=checkInput($_POST['email']);
    $tel=checkInput($_POST['tel']);
    $mot_de_passe=checkInput($_POST['password']);
    $confirmPasse=checkInput($_POST['confirm']);
    $wantsToBeDriver= checkInput($_POST['wantsToBeDriver']);//booleen
    if($mot_de_passe != $confirmPasse){
         echo '<script> alert("Les mots de passes sont differents "); </script>';
         echo '<meta http-equiv="refresh" content="0; URL=../Vue/utilisateur/inscription.php">';
    }
    $sql1="SELECT * FROM utilisateur WHERE email= ?";
      $res=$pdo->prepare($sql1);
       $res->execute([$email]);
       if($row=$res->rowCount()>0){
        // echo '<script> alert("L email existe deja "); </script>';
        // echo '<meta http-equiv="refresh" content="0; URL=../Vue/utilisateur/index.php">';
           $_SESSION['info']='<div class=" alert alert-danger">L email existe deja </div>';

       }else{
          //inscrire l'utilisateur
          if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($tel) && !empty($mot_de_passe)){  
          inscrireUtilisateur($nom,$prenom,$mot_de_passe,$email,$tel,$wantsToBeDriver);
        // $_SESSION['info']='<div class=" alert alert-success"> inscription reussie ! vous pouvez maintenant vous connecter</div>';
        $userId= $pdo->lastInsertId();
        // echo json_encode(['userId' => $userId,'wantsToBeDriver'=>$wantsToBeDriver]);
        if($wantsToBeDriver==1){
          
          header("Location: ../Vue/conducteur.php?userId=" .$userId);
          exit();
        
      }else{
          header('Location: ../Vue/connect.php');
          exit();
      
      }
    }else{
      $_SESSION['champ']="Veillez renseigner tous  les champs !";
      header('Location: ../Vue/inscription.php');
      exit();
    }
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