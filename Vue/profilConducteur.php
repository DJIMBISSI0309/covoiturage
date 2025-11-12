<?php

require '../Modele/profil_conducteur.php';

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


<div class="container mb-3 mt-4">
 <h5><b>Configuration</b></h5>
  <h5 class="">Annonces récente postées</h5>
  <div class="row">   

 
  <div class="col-md-7 mt-3">  
    <div class="row">   
    <?php
    
    while($trajet=$req2->fetch(PDO::FETCH_ASSOC)):?>
   <div class="col-md-6">  
        <div class="card mt-3">
        <h6 class="card-header">
          Trajet proposé par
            <?= $conducteur['nom']." ".$conducteur['prenom'];?>
            <b><i class="fa fa-star text-warning"></i></b>
        </h6>
    <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
  <div class="card-body">
    <p class="card-title">Depart: <?= $trajet['Depart']; ?> </p>
    <p class="card-title"> arrivée: <?= $trajet['arrivee']; ?> </p>
    <p class="card-title"> date: <?= $trajet['date_heure']; ?> </p>
    <p class="card-title">prix: <?= $trajet['prix']; ?> </p>
    <p class="card-title"> nbre de places: <?= $trajet['nombres_places_disponibles']; ?> </p>
    <p class="card-text ">type vehicule: <?= $trajet['type_vehicule'] ;?></p>
       <div class="row">
         <div class="col-sm-8">

           </div>
           <div class="col-sm-4">
    <a href="#" class=" text-primary"><i class="fa fa-pencil"></i></a>
    <a href="#" class=" text-dark"><i class="fa fa-trash"></i></a>
    <a href="../Vue/reservation.php?id=<?php echo $trajet['idtrajet'];?>" class=" text-dark ms-1"><i class="fa fa-long-arrow-right"></i></a>
      </div>   
  </div>
  </div>
 
</div>
</div>
<!-- </div> -->
<?php endwhile  ?>
</div>
</div>
<!-- <div class="col-sm-3">
  
 </div> -->
<div class="col-md-5">
<h5 class="text-center"> Mettre a jour les données de
  <?php
if(isset($_SESSION['conducteur_username'])){
  echo $_SESSION['conducteur_username'];
}else{
  echo $row['nom'];
}
   ?> 
</h5>
   
   <form class=" bg-white  m-4  pb-2 pt-3  px-2 "id="inscriptionForm" method="POST">
     
          <div class="mt-4"></div>
         <?php
                if(isset($_SESSION['info'])){
                  echo '<div class=" alert-success">'.$_SESSION['info']. '</div>';
                  unset($_SESSION['info']);
              }
         ?>
         <input type="hidden" name="Nutilisateur" value="<?php echo htmlspecialchars($row['idutilisateur']);?>">
           <div class="input-container">
             <label><b>Nouveau nom </b></label>
             <input type="text"  name="nom" class="form-control" required value="<?php echo htmlspecialchars($row['nom']);?>">
       
            </div>
            <div class="input-container">
             <label><b>Nouveau prenom </b></label>
             <input type="text"  name="prenom" class="form-control" required value="<?php echo htmlspecialchars($row['prenom']);?>">
            </div>
            <div class="input-container">
             <label><b>Nouvelle Adresse e-mail </b></label>
             <input type="email"  name="email" class="form-control" required value="<?php echo htmlspecialchars($row['email']);?>">
       
            </div>
            
            <div class="input-container">
             <label><b>  Nouveau mot de passe </b></label>
             <input type="password"  name="MotDePasse" class="form-control" required>
            </div>
            <div class="input-container">
             <label><b> Repeter le Nouveau mot de passe </b></label>
             <input type="password"  name="MotDePasse1" class="form-control" required>
            </div>
            <button type="submit"  class="btn btn-primary text-white mt-2 text-center">Mettre a jour </button>

  </form>
</div>

</div>

</div>

<?php 
include '../includes/foot.php';
?>

<script src="../assets/script.js">

</script>
</body>

</html>