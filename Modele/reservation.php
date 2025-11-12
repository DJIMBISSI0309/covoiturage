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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    //fonction pour afficher la liste des trajets
    <?php
function affiche_trajets(){
    $sql="SELECT * FROM trajets JOIN vehicule ON vehicule.idtaxi=trajets.idtaxi WHERE trajtes.nombre_places >0";
    $result=$pdo->query($sql);
    if($result->num_rows >0){
        echo "<h2> trajets disponibles</h2>"
        
       
        echo "Départ Arriveen Date/HeurePrix
        PlacesVehiculeDetails";
        
        while($row=$result->fetch_assoc()){
            echo "<tr>";
            echo "<td>" .$row["depart"]."</td>";
            echo  "<td>".$row["arrivee"]."</td>";
            echo "<td>".date('d/m/Y  H:i',strtotime($row["date_heure"]))."</td>";
            echo "<td>".$row["prix"]."fcfa</td>";
            echo "<td>".$row["nombre_places_disponibles"]."</td>";
            echo "<td>".$row["marque"]."   " . $row["modele"]."</td>";
            echo "<td><a href='detail_trajet.php?id="$row["idtrajet"]."'>Voir les details </a></td>";
             echo "</tr>";


        }
     

    }else{
        echo "Aucun trajet disponible pour le moment.";
    }
}
?>
</body>
</html>
