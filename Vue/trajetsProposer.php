<?php

require '../Modele/rechercher_trajet.php';
if(!isset($_SESSION['utilisateur_id'])){
  header("Location: ../Vue/index.php");
  exit();


}
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



<div class="container mb-3">
<?php
if(isset($_SESSION['utilisateur_id'])){
 
  echo '<h2 class="text-center mt-3">Bienvenue<b class="text-primary"> '.($_SESSION['utilisateur_username']).'</b></h2>';
  } else {

      $_SESSION['info']='<div class=" alert alert-danger">connectez vous ou inscrivez-vous pour utiliser le site </div>';
      echo '<div class="alert alert-danger>'. $_SESSION['info'] .'</div>';

  }
?>
  <form method="GET" action="" class="mt-5">
    
  <?php
    
       
   if(isset($_SESSION['search'])){
  
    echo '<div class="alert alert-danger">'.$_SESSION['search'].'</div>';
      unset($_SESSION['search']);
        }
        ?>
   <div class="form-group row">
          <div class="col-sm-3">
              <input type="text" placeholder="Lieu de depart" class="form-control mt-2" name="depart" required>
          </div>
          <div class="col-sm-3">
          <input type="text" placeholder="Lieu d'arrivé" class="form-control mt-2" name="arrive" required>
          </div>
          <div class="col-sm-3">
          <input type="datetime-local" class="form-control mt-2"  name="date" required>  
          </div>
          <div class="col-sm-3">
              <button type="submit" class="btn btn-primary text-white mt-2">Rechercher</button> 
          </div>
</div>

</form>
<h3 class="text-center">Trajets</h3>
  <div class="row">
 
          
    <?php
    
    while($trajet=$trajetPropose->fetch(PDO::FETCH_ASSOC)):?>
  
           <div class="col-sm-4 mt-3">
       
        <div class="card" style="">
    
        <h5 class="card-header">
    
          Trajet proposé par
            <?= $trajet['nom']." ".$trajet['prenom'];?>
            <b><i class="fa fa-star text-warning"></i></b>
           
        </h5>
      
    <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
  <div class="card-body">
    <p class="card-title">Depart: <?= $trajet['Depart']; ?> </p>
    <p class="card-title"> Arrivée: <?= $trajet['arrivee']; ?> </p>
    <p class="card-title"> Date & Heure: <?= $trajet['date_heure']; ?> </p>
    <p class="card-title">Prix: <?= $trajet['prix']; ?> </p>
    <p class="card-title">  places disponibles: <?= $trajet['nombres_places_disponibles']; ?> </p>
     <div class="row">
     
       <div class="col-sm-10">

      </div>
     <div class="col-sm-2">
    <a href="../Vue/reservation.php?id=<?php echo $trajet['idtrajet'];?>" class="text-dark"><i class="fa fa-long-arrow-right" ></i></a>
    </div>
      </div>
  </div>
 
</div>

</div>

<?php endwhile  ?>

</div>

</div>

<?php 
include '../includes/foot.php';
?>

<script src="../assets/script.js">

</script>
</body>

</html>