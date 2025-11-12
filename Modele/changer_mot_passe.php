<?php
session_start();
require 'database.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $PasswordActuelle = $_POST['password'];
    // password_hash($mot_de_passe,PASSWORD_DEFAULT);
    $PasswordNouveau = password_hash($_POST['npassword'],PASSWORD_DEFAULT);
    $passwordNouveau=$_POST['npassword'];
	$PasswordConfirm = $_POST['cpassword'];
    $userId = $_POST['user_id'];
    
    $sql ="SELECT * FROM utilisateur WHERE idutilisateur = ?";
    $query = $pdo->prepare($sql);
    $query->execute([$userId]);
	$result=$query->fetch();

	if(password_verify($PasswordActuelle,$result['mot_de_passe'])) {

		if($passwordNouveau == $PasswordConfirm) {

            $updateSql = "UPDATE utilisateur SET mot_de_passe = ? WHERE idutilisateur = ?";
            $res=$pdo->prepare($updateSql);
            $res->execute([$PasswordNouveau,$userId]);
			if($res) {
			
                $_SESSION['mesg'] = 'modification reussie</div>';
                		
			} else {
			
				$_SESSION['mesg'] = 'Erreur lors de la modification';	
			}

		} else {
		
			$_SESSION['mesg'] = 'Le nouveau mot de passe est different de la confrimation';
		}

	} else {
	
		$_SESSION['mesg'] = 'le mot de passe actuelle est incorrect';
	}

	$pdo=null;

	// echo json_encode($valid);

}
?>