<?php
$sql=$pdo->query("SELECT latitude,longitude FROM reservation ORDER BY created_at DESC");
$reservation=$sql->fetch();
if($reservation){
    echo json_encode([
        'lat'=>(float) $reservation['latitude'],
        'lng'=>(float) $reservation['longitude']
    ]);
}else{
    echo json_encode(['lat'=>48.8566,'lng'=> 2.3522]);
}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <style>
        #map{
            height: 500px;
            width: 100%;
        }
        </style>

</head>
<body>
    <div id="map"></div>
    <script>
        let map;
        let marker;
        function initMap(){
            //initialiser la carte
            map =new google.maps.Map(document.getElementById('map'),
            {
                zoom: 15,
                center: {lat: 48.8566,lng: 2.3522}
            });
            //creer un marqueur
            marker=new google.maps.marker({
                position: map.getCenter(),
                map: map
            });
            //mettre a jour la position du client tous les 5 secondes
            setInterval(updateLocation,5000);
            

        }
        function updateLocation(){
            fetch('get_location.php')
            .then(reponse=>
            reponse.json())
            .then(data=>
            if(data && data.lat && data.lng){
                const newPosition={lat: data.lat, lng:data.lng};
                marker.setPosition(newPosition);
                map.setCenter(newPosition);
            }
            })
            .catch(error =>
            console.error('Erreur:',error));
        }
        window.onlaod=initMap;
     </script>
</body>
</html>