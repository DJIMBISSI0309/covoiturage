
<?php
session_start(); // Démarrer la session pour récupérer l'ID du conducteur connecté
$driver_id = $_SESSION['driver_id']; // Supposons que l'ID du conducteur est stocké dans la session

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

// Récupérer les réservations attribuées au conducteur
$sql = "SELECT r.id, r.name AS client_name, r.phone, r.latitude, r.longitude 
        FROM reservations r 
        WHERE r.conducteur_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $driver_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservations du Conducteur</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h1>Mes Réservations</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Client</th>
        <th>Téléphone</th>
        <th>Latitude</th>
        <th>Longitude</th>
        <th>Carte</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['client_name']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['latitude']; ?></td>
                <td><?php echo $row['longitude']; ?></td>
                <td>
                    <a href="view_client_location.php?id=<?php echo $row['id']; ?>">Voir sur la carte</a>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="6">Aucune réservation.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php
$stmt->close();
$conn->close();
?>