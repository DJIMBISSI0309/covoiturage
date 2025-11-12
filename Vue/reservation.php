
<?php
require '../Modele/reserver_trajet.php';
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


<div class="container-fluid footo">
<div class="row">
 
        
 
          <div class="col-sm-2">


       </div>  
        <div class="col-sm-4 mt-3 mb-3">
    
     <div class="card">
 
     <h5 class="card-header ">
 
           
         <?= $trajet['Depart']." - ".$trajet['arrivee'];?>
      
        
     </h5>
   
 <!-- <img class="card-img-top" src="img_avatar1.png" alt="Card image"> -->
<div class="card-body">
 <p class="card-title">conducteur : <?= $trajet['nom']. " ".$trajet['prenom']; ?> </p>
 <p class="card-title"> Date & Heure: <?= $trajet['date_heure']; ?> </p>
 <p class="card-title">Prix: <?= $trajet['prix']; ?> </p>
 <p class="card-title"> Type vehicule: <?= $trajet['vehicule_type']; ?> </p>
 <p class="card-title">  places disponibles: <?= $trajet['nombres_places_disponibles']; ?> </p>
  <div class="row">
  
    <div class="col-sm-6">

   </div>
  <div class="col-sm-6">
 <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Faire une reservation</button>
 </div>
   </div>
</div>

</div>

</div>
<div class="col-sm-6">


</div>


</div>
</div>
<div class="col-lg-12">

               
                <div class="bootstrap-modal">
                   
                  
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Reserver</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="#" id="reservationForm">
                                            <div class="form-group">
                                                    <label for="message-text" class="col-form-label">reservation</label>
                                                    <input type="hidden" name="id_user" value="<?= $_SESSION['utilisateur_id']; ?>">
                                                    <input type="hidden" name="id_trajet" value="<?= $trajet['idtrajet']?>">
                                                       <select class="form-control" name="reservation" readonly>
                                                           <option value="<?= $trajet['idtrajet'];?>">
                                                           <?= $trajet['Depart']." - ".$trajet['arrivee'];?>
                                                           </option>
                                                        </select>
                                                   
                                                </div>
                                                <div class="form-group ">
                                            <label for="message-text" class="col-form-label">client:</label>
                                            <select class="form-control" name="clientName" id="clientName" readonly>
                                                           <option value="<?= $_SESSION['utilisateur_id'];?>">
                                                           <?= $_SESSION['utilisateur_username'];?>
                                                           </option>
                                                </select>
                                          </div>
                                        <!-- <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Methode de paiement:</label>
                                            <div>
                                                <select id="number"id="recipient-name"name="payement">
                                               
                                                  <option value="MTN_Money">Mobile money
                                                 </option>
                                                  <option value="Orange_Money">Orange money</option>
                                                  <option value="paypal">Paypal</option>
                                               
                                                  <option value="espece">espece</option>
                                                </select>
                                              </div>
                                            
                                        </div> -->

                                        <!-- <div class="form-group ">
                                            <label for="message-text" class="col-form-label">Montant:</label>
                                            <input type="number" class="form-control  boll" name="Montant_paye" value="<?php echo  $trajet['prix'];?>" readonly>
                                        </div> -->
                                        
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Nombres de places:</label>
                                            <input type="number" class="form-control boll" name="place">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">date de reservation:</label>
                                            <input type="datetime-local" class="form-control boll" name="date">
                                        </div>
                                        
                                        <div class="modal-footer">
                                    
                                       <button type="submit" class="btn btn-primary text-white">Soumettre</button>
                                      </div>
                                    </form>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div id="location"></div>
            <script>
                document.getElementById('reservation').addEventListener('submit',function(event){
                    event.preventDefault();
                    if(navigator.geolocation){
                        navigator.geolocation.getCurrentPosition(showPosition,showError);
                    }else{
                        document.getElementById('location').innerText="La geolocalisation n est pas supportée par ce navigateur";
                    }
                });
                function showPosition(position){
                    const latitude=position.coords.latitude;
                    const longitude=position.coords.longitude;
                    //afficher la localisation
                    document.getElementById('location').innerText="Votre position : Laitude :"+ latitude + ", Longitude" + longitude;
                    //recuperer les donnees du formulaire
                    const  clientName=document.getElementById('clientName').value;
                     const driverId=document.getElementById('driverId').value;

                     //Envoyer les donnees au serveur
                     fetch('reserver_trajet.php',{
                         method: 'POST',
                         headers: {
                             'Content-type':'application/json';
                         },
                         body:
                         JSON.stringify({clientName,latitude,longitude,driverId})
                     })
                     .then(reponse=>reponse.json())
                     .then(data =>{
                         console.log('reservation reussie',data);
                         alert('Reservation reussie');
                     })
                     .catch(error =>
                     console.error('erreur',error));
                }
                function showError(error){
                    switch(error.code){
                    case 
                    error.PERMISSION_DENIED:
                    document.getElementById('location').innerText="permission de géolocalisation refusé";
                    break;
                    case
                    error.POSITION_UNAVAILABLE:
                    document.getElementById('location').innerText="Position non valide";
                    break;
                    case
                    error.TIMEOUT:
                    document.getElementById('location').innerText="La demande a expiré";
                    break;
                    case error.UNKNOWN_error:
                       document.getElementById('location').innerText="Une erreur inconnue s'est produite";
                       break;
                    }
                }
            </script> -->
        <!-- </div>
    </div> -->
<?php 
include '../includes/foot.php';
?>

<!-- <script src="../assets/script.js">

</script> -->
</body>
</html>