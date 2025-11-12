
<?php
// Supposons que vous avez l'ID de la réservation que le conducteur souhaite voir.
$reservation_id = $_GET['id'];

$servername = "localhost"; // ou votre serveur MySQL
$username = "root"; // votre nom d'utilisateur MySQL
$password = ""; // votre mot de passe MySQL
$dbname = "taxi_reservation";

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Récupérer les informations de réservation
$sql = "SELECT latitude, longitude FROM reservations WHERE id = ?";









$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $reservation_id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$latitude = $row['latitude'];
$longitude = $row['longitude'];

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Position du Client</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h1>Position du Client</h1>

<div id="map"></div>

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '© OpenStreetMap'
    }).addTo(map);

    L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).addTo(map)
        .bindPopup('Client ici!')
        .openPopup();
</script>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>