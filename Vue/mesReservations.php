<?php
session_start();
require '../Modele/database.php';
$user_id=$_SESSION['utilisateur_id'];

$stmt=$pdo->prepare("SELECT * FROM reservation INNER JOIN trajets ON trajets.idtrajet=reservation.idtrajet WHERE reservation.idutilisateur=:user_id");

$stmt->execute(['user_id'=>$user_id]);
$reservations=$stmt->fetchAll();

// require '../Modele/securite.php';
// require '../Modele/ModifierProfil.php';
?>
    <!DOCTYPE html>
<html lang="en">
<?php
  include '../includes/head.php';
  ?>
<body>
<?php
include '../includes/navbar.php';
?>

<form method="POST" action="#">
  <input type="hidden" name="idreservation" value="<?php $reservation['idreservation'];?>">
</form>

 <?php 
include '../includes/foot.php';
?>

<script src="../assets/script.js">

</script> 
</body>
</html>