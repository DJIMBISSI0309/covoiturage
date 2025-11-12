<?php
session_start();
require 'database.php';

function checkInput($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

        //fonction pour afficher la liste des trajets
    function affiche_detail_trajets(){
    $sql="SELECT * FROM trajets JOIN vehicule ON vehicule.idtaxi=trajets.idtaxi JOIN utilisateur 
     ON utilisateur.idutilisateur=trajets.idutilisateur WHERE idtrajet= ?";
      $res=$pdo->prepare($sql);
      $res->execute([$trajet_id]);

    //$result=$conn->query($sql);
    if($res->num_rows >0){
        $row=$res->fetch()
         echo "<h2> Details du trajet</h2>";
         echo "<p> Depart :" .$row["depart"]."</p>";
         echo "<p> Arrivee :" .$row["arrivee"]."</p>";
         echo "<p> Date/Heure :" .date('d/m/Y H:i',strtotime($row["date_heure"]))."</p>";
         echo "<p> prix :" .$row["prix"]." fcfa</p>";
         echo "<p> places disponibles :" .$row["nombres_places_disponibles"]."</p>";
  
         echo "<p> Vehicule :" .$row["marque"]." ".$row["modele"]."</p>";
         echo "<p> Conducteur :" .$row["nom"]."".$row["prenom"]."</p>";
         //ajouter un bouton pour reserver le  trajet si posssible
         if($row["nombre_places_disponibles"]>0){
            echo "<form action ='reserver_trajet.php' method='post'>";
            echo "<input type='hidden' name='trajet_id'value='".$row["idtrajet"]."'>";
            echo "<input type='submit' value='Reserver'>";
            echo "<form>";

         }else{
             echo "Trajet introuvable";
         }

        } 
}
?>

