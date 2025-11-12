<?php
session_start();
require 'database.php';

$sql="SELECT * FROM conducteur,utilisateur,trajets  WHERE conducteur.idutilisateur=utilisateur.idutilisateur AND utilisateur.idutilisateur=trajets.idutilisateur
ORDER BY idtrajet DESC LIMIT 0,6";
$trajetPropose=$pdo->query($sql);

// if($_SERVER['REQUEST_METHOD']=="GET"){
   //  $depart=checkInput($_GET['depart']);
   //  $arrivee=checkInput($_GET['arrive']);
    // $date=checkInput($_GET['date']); 
    if(!empty($_GET['depart']) && !empty($_GET['arrive'])){
   
        $depart=checkInput($_GET['depart']);
        $arrivee=checkInput($_GET['arrive']);
   $trajetPropose=$pdo->query('SELECT * FROM conducteur,utilisateur,trajets WHERE Depart LIKE "%'.$depart. '%" AND arrivee LIKE "%'.$arrivee.'%" 
AND  conducteur.idutilisateur=utilisateur.idutilisateur AND utilisateur.idutilisateur=trajets.idutilisateur
   ORDER BY idtrajet DESC');
 
// $req=$pdo->prepare($sql);
// $req->execute(
//     array(':depart'=>'%'.$depart. '%',':arrivee'=>'%'.$arrivee.'%',':date_heure'=>$date)
// );
   // $trajets=$trajetPropose;
   $req=$pdo->query(
      'SELECT * FROM conducteur,utilisateur,trajets WHERE Depart LIKE "%'.$depart. '%" AND arrivee LIKE "%'.$arrivee.'%" 
AND  conducteur.idutilisateur=utilisateur.idutilisateur AND utilisateur.idutilisateur=trajets.idutilisateur
   ORDER BY idtrajet DESC');
   $res=$req->fetchAll(PDO::FETCH_ASSOC);

   if(count($res)<1)
   {
      $_SESSION['search'] = "aucune Trajet  trouvé";
  
    }
   }
   //  else{
      // $trajet=$trajets->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($trajet);
    
      // if(count($trajet)<1){
      //         $_SESSION['search'] = "aucune Trajet  trouvé";
      //     }
   //  } 
   // 
//  }


// $sql=$pdo->query('SELECT * trajets WHERE Depart LIKE "%'.$depart.'%",arrivee LIKE  ORDER BY idquestion DESC');
     
// $trajets=$req->fetchAll(PDO::FETCH_ASSOC);
//affivche les trajets trouvees 
// if(count($trajets)>0){
//     echo"";
//     echo "";
//     foreach($trajets as $trajet){
    
//         echo ".";
//         echo""; 
//         echo "Depart:" .$trajet['depart']."-Arrivee:".$trajet['arrivee']."-Date-heure:".$trajet['date_heure'];
 
//         echo"-";
//         echo"";
//         echo "";


//     }
// }
// else{
//         echo "Aucun trajet trouvé";
//     }
// }
function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>