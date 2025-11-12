
<?php 
session_start();
require '../Modele/database.php';

// $utilisateur_name=$_SESSION['utilisateur_username'];
$utilisateur_id=$_SESSION['utilisateur_id'];
// var_dump($_GET['userId']);
$sql="SELECT * FROM utilisateur  WHERE idutilisateur= ?";
$req=$pdo->prepare($sql);
$req->execute([$utilisateur_id]);
$utilisateur=$req->fetch();

$user_id=$_SESSION['utilisateur_id'];
$stmt=$pdo->prepare("SELECT * FROM reservation INNER JOIN trajets ON trajets.idtrajet=reservation.idtrajet WHERE reservation.idutilisateur=:user_id");

$stmt->execute(['user_id'=>$user_id]);
$reservation=$stmt->fetchAll();

// if(isset($_SESSION['utilisateur_id'])){
    // $user_id = $_SESSION['utilisateur_id'];
    // $sql=$pdo->prepare("SELECT * FROM utilisateur WHERE idutilisateur= ?");
    // $sql->execute([$user_id]);
    //  $req=$sql->fetch(PDO::FETCH_ASSOC);
// }else{
//     return false;
// }
// require '../Modele/mparametre.php';
 $pdo=null;
?>
<!DOCTYPE html>
<html lang="en">

<?php
  include '../includes/head.php';
  ?>
  <title>Bootstrap 4 Website Example</title>

<body>


<?php
include '../includes/navbar.php';
?>
<div class="container-fluid">
<div class="row">
	<div class="col-md-6">
	

		<div class="card card-default">
			<div class="card-header bg-primary text-white">
				<div class="page-header"> <i class="fa  fa-look"></i> Paramétres</div>
			</div> 

			<div class="card-body">
            

				<form action="../Modele/mparametre.php" method="POST" class="form-horizontal" id="changeUsernameForm">
					<fieldset>
						<legend>Changer les coordonnées</legend>
						<?php
        
				if(isset($_SESSION['messages'])){
						echo '<div class="alert alert-success">'.$_SESSION['messages'].'</div>';
						unset($_SESSION['messages']);
				}
				?>
						<div class="changeUsenrameMessages"></div>			

						<div class="form-group">
					    <label for="username" class="col-sm-5 control-label">Nom</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="username" name="username" placeholder="" value="<?php echo $utilisateur['nom']; ?>">
					    </div>
                      </div>
                      <div class="form-group">
					    <label for="prenom" class="col-sm-5 control-label">Prenom</label>
					    <div class="col-sm-7">
					      <input type="text" class="form-control" id="prenom" name="prenom" placeholder="" value="<?php echo $utilisateur['prenom']; ?>">
					    </div>
                      </div>
                      <div class="form-group">
					    <label for="mail" class="col-sm-5 control-label">Adresse email</label>
					    <div class="col-sm-7">
					      <input type="email" class="form-control" id="email" name="email" placeholder="" value="<?php echo $utilisateur['email']; ?>"/>
					    </div>
						</div>
						<div class="form-group">
					    <label for="mail" class="col-sm-5 control-label">numero de telephone</label>
					    <div class="col-sm-7">
					      <input type="number" class="form-control" id="numero" name="numero" placeholder="" value="<?php echo $utilisateur['tel']; ?>"/>
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $utilisateur['idutilisateur']?>" /> 
					      <button type="submit" class="btn btn-primary"  id="changeUsernameBtn"> <i class="fa fa-ok-sign"></i> Enregistrer le changement </button>
					    </div>
					  </div>
					</fieldset>
				</form>

				<form action="../Modele/changer_mot_passe.php" method="POST" class="form-horizontal" id="changePasswordForm">
					<fieldset>
						<legend>Changer le mot de passe</legend>
						<?php
						if(isset($_SESSION['mesg'])){
						echo '<div class="alert alert-success">'.$_SESSION['mesg'].'</div>';
						unset($_SESSION['mesg']);
				}
				?>
						<div class="changePasswordMessages"></div>

						<div class="form-group">
					    <label for="password" class="col-sm-5 control-label">Mot de passe actuel</label>
					    <div class="col-sm-7">
					      <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe actuel">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="npassword" class="col-sm-5 control-label">Nouveau mot de passe</label>
					    <div class="col-sm-7">
					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <label for="cpassword" class="col-sm-5 control-label">Confirmation mot de passe</label>
					    <div class="col-sm-7">
					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
					    </div>
					  </div>

					  <div class="form-group">
					    <div class="col-sm-offset-2 col-sm-10">
					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $utilisateur['idutilisateur'] ?>" /> 
					      <button type="submit" class="btn btn-primary"> <i class="fa fa-ok-sign"></i> Enregistrer le changement </button>
					      
					    </div>
					  </div>


					</fieldset>
				</form>

			</div> 		

		</div> 		
	</div> 	
<div class="col-md-6">
<div class="container mt-5">
        <h2>Mes Réservations</h2>
        <div id="bookings-list">

        </div>
    </div>
    <script>
        //charger les reservations
        function loadBookings(){
            fetch('../Modele/get_reserve.php')
            .then(reponse => reponse.json())
            .then(reservation => {
                const list = document.getElementById('bookings-list');
                list.innerHTML='';

                reservation.forEach(reservations => {
                    const reservationItem=document.createElement('div');
                    reservationItem.className='card mb-3';
                    reservationItem.innerHTML= `
                    <div class="card-body">
                    <h5>De ${reservations.Depart} a ${reservations.arrivee}</h5>
                    <p> Date & heure:  ${new Date(reservations.date_heure).toLocaleString()}</p>
                    <p>nombres de Places reservées: ${reservations.place_reserves}</p>
                    <p>Prix: ${reservations.prix}</p>
                    <button class="btn btn-danger cancel-btn"
                    data-booking-id="${reservations.idreservation}"
                    ${reservations.status === 'cancelled' ? 'disabled' : ''}
                      >
                      Annuler
                </button>
								
                </div>
                `;
                list.appendChild(reservationItem);
                });
            });
        }
       // Gerer l'annulation
        document.addEventListener('click',function(e){
            if(e.target.classList.contains('cancel-btn')){
                const idreserve = e.target.getAttribute('data-booking-id');
                fetch('../Modele/annule_reservation.php',{
                    method: 'POST',
                    headers: {'content-Type' : 'application/x-www-form-urlencoded'},
                    body: `idreservation=${idreserve}`
                })
                .then(reponse => reponse.json())
                .then(data => {
                    if(data.success){
                        alert(data.message);
                        loadBookings();//recharger la liste
                    }else{
                        alert(data.message);
                    }
                });
            }
        });
        // //charger au demarrage
         document.addEventListener('DOMContentLoaded',loadBookings);
    </script>
			</div>
</div> 
</div>


<?php 
include '../includes/foot.php';
?>

<script src="../assets/setting.js">

</script>
  <script src="../assets/script.js">

</script>
</body>

</html>