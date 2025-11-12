<?php
require '../Modele/database.php';
$sql="SELECT Depart,arrivee FROM trajets";
$result=$pdo->prepare($sql);
$result->execute();
$trajets=[];
if($result->rowCount() >0){
    while($row =$result->fetch()){

        $depart_coords=getCoordinates($row['Depart']);
        $arrivee_coords=getCoordinates($row['arrivee']);
        if($depart_coords &  $arrivee_coords){
            $trajets[]=[
              'ponit de depart' => $row['Depart'],
              'lat_depart' => $depart_coords['lat'],
              'lng_depart' => $depart_coords['lng'],
              'point arrivee' => $row['arrivee'],
              'lat_arrive' => $arrive_coords['lat'],
              'lng_arrive' => $depart_coords['lng'],
            ];
        }
    }
}
$pdo=null;

//fonction pour obtenir les coordonnees via L'API nominatim

function getCoordnates($address){
    $url ="https://nominatim.openstreetmap.org/search?format=json&q=".urlencode($address);
    $reponse =file_get_contents($url);
    $data =json_decode($reponse,true);

    if(!empty($data)){
        return[
        'lat'=>$data[0]['lat'],
        'lng'=>$data[0]['lon'],
        ];
        }
        return null; //si aucune coordonnee n'est trouvé
}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
    <style>
        #map{
            height: 600px;
        }
    </style>
</head>
<body>
<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    //creer une carte 
    var map =L.map('map').setView([46.603354,1.888334],5);//centrer sur la france
    

    //ajouter une couche de carte
    L.titleLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{
        maxZoom:19,
    }).addTo(map);

    //les donnees recuperes depuis PHP

    var trajets =<?php echo json_encode($trajets);?>;
    //Ajouter les points

    trajets.forEach(function(trajet){
        var startMarker=L.marker([trajet.lat_depart,trajet.lng_depart]).addTo(map)
        .bindPopup("Depart" + trajet.Depart)
        .opendPopup();
        

        var endMarker =L.marker([trajet.lat_arrive,trajet.lng_arrive]).addTo(map)
        .bindPopup("Depart" + trajet.arrivee)
        .opendPopup();

        //tracer une ligne entre le depart et l'arrivee
        var latLings =[
            [trajet.lat_depart,trajet.lng_depart],
            [trajet.lat_arrive,trajet.lat_arrive]
        ];

        var polyline = L.polyline(latLings,{color: "blue"}).addTo(map);
        
    });
</script>
</body>
</html>