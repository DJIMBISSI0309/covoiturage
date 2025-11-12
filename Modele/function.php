<?php
//session_start();
require 'database.php';

    //fonction pour inscrire un nouvel utilisateur
    function inscrireUtilisateur($nom,$prenom,$mot_de_passe,$email,$tel,$wantsToBeDriver)
    {
        global $pdo;
        $sql="INSERT INTO utilisateur (nom,prenom,mot_de_passe,email,tel,ToBeDriver)VALUES(:nom,:prenom,:mot_de_passe,:email,:tel,:ToBeDriver)";

        $req=$pdo->prepare($sql);



        try{
            if($req->execute(
                array(':nom'=>$nom,':prenom'=>$prenom,':mot_de_passe'=>password_hash($mot_de_passe,PASSWORD_DEFAULT),':email'=>$email,':tel'=>$tel,':ToBeDriver'=>$wantsToBeDriver)
            ))
           
            {
               
             echo"inscription reussie";
                // header("Location: ../Vue/connect.php");
                // exit();
            }else{
                $error ='Erreur lors de l\'inscription.';
            }
        }catch(Exception $e){
            $error='Erreur lors de l\'inscription.' .$e->getMessage();
        }
      
        //d autres fonctions pour la connexion a la gestion des trajets
        

    }
    //fonction pour verifier si un utilisateur est connecte
    function estConnecte(){
   
        global $pdo;
        if(isset($_SESSION['utilisateur_id'])){
            $req=$pdo->prepare("SELECT * FROM utilisateur WHERE idutilisateur= ?");
            $req->execute([$_SESSION['utilisateur_id']]);
            return $req->fetch(PDO::FETCH_ASSOC);

        }else{
            return false;
        }
    }
    //fonction  pour la connexion d'un utilisateur

    function connexionUtilisateur($email,$mot_de_passe){
        
        global $pdo;
        $req= $pdo->prepare("SELECT * FROM utilisateur WHERE email = ? AND 	ToBeDriver= 0");
        $req->execute([$email]);
        $utilisateur=$req->fetch(PDO::FETCH_ASSOC);
        if( $utilisateur){
            //verifier le mot de passe
            if(password_verify($mot_de_passe,$utilisateur['mot_de_passe'])){
                //connecter l'utilisateur
                $_SESSION['utilisateur_id']= $utilisateur['idutilisateur'];
                $_SESSION['utilisateur_username']= $utilisateur['nom'];
               // echo "Connexion reussie";
               header('Location: ../Vue/trajetsProposer.php');
                exit();
        
            }else{
                $error='Email ou mot de passe incorrect';
            }
        }else{
            $error='aucun utilisateur trouvé avec cet email';
        }
        
    }
    function connexionConducteur($email,$mot_de_passe){
            
        global $pdo;
        $req= $pdo->prepare("SELECT * FROM utilisateur,conducteur WHERE conducteur.idutilisateur=utilisateur.idutilisateur AND utilisateur.email = ?");
        $req->execute([$email]);
        $conducteur=$req->fetch(PDO::FETCH_ASSOC);
        if($conducteur){
            //verifier le mot de passe
            if(password_verify($mot_de_passe,$conducteur['mot_de_passe'])){
                //connecter l'utilisateur
                $_SESSION['conducteur_id']= $conducteur['idconducteur'];
                $_SESSION['conducteur_username']= $conducteur['nom'];
               // echo "Connexion reussie";
                header('Location: ../Vue/profilConducteur.php');
                exit();
        
            }else{
                $error='Email ou mot de passe incorrect';
            }
        }

    }
//}



?>