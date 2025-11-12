<?php
session_start();
$showToast= false;
$message= '';
if(isset($_SESSION['success'])){
  $showToast= true;
  $message = $_SESSION['success'];
  unset($_SESSION['success']);
}

require '../Modele/database.php';

// require '';
if( !isset($_SESSION['conducteur_id'])){
  header("Location: ../Vue/index.php");
  exit();
}

$id = $_SESSION['conducteur_id'];

$res=$pdo->prepare("SELECT vehicule_type FROM conducteur WHERE idconducteur= :id");
$res->bindParam(":id",$id);
$res->execute();
$vehicule= $res->fetchColumn();
?>
<!DOCTYPE html>
<html lang="en">

<?php
  include '../includes/head.php';
  ?>
  
  <title>Bootstrap 4 Website Example</title>
  <style>
  .toast{
      display: none;
     right: 20px;
     min-width: 250px;

      background-color: #4CAF50;
      color: white;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
       box-shadow: 0 2px 10px rgba(0,0,0,0.1);
       bottom: 30px;
      
    }
   
    </style>
<body>


<?php
include '../includes/navbar.php';
?>

<div class="mt-3"></div>
<!-- <div class="container-fluid"> 
<div class="row  ">
        <div class="col-12 bot">
          <span> 
           <h2 class="text-center text-white mt-5">Proposer un trajet</h2>
          </span>
        </div>
   </div>     
        
    </div> -->

        <div class="mt-2"></div>
<!--div class="col-lg-12">
  <div class="card">
      <div class="card-body">
         
          <div class="bootstrap-modal">
             
            
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Paiement</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form method="" action="">
                                      <div class="form-group">
                                              <label for="message-text" class="col-form-label">reservation</label>
                                              <input type="datetime" class="form-control boll" name="">
                                          </div>
                                  <div class="form-group">
                                      <label for="recipient-name" class="col-form-label">Methode de paiement:</label>
                                      <div>
                                          <select id="number"id="recipient-name"name="">
                                         
                                            <option value=""disabled class="text-white"></i>Mode de paiement</option>
                                            <option value="">Mobile money</option>
                                            <option value="">Orange money</option>
                                            <option value="">Paypal</option>
                                            <option value="">Paypal</option>
                                            <option value="">espece</option>
                                          </select>
                                        </div>
                                      
                                  </div>
                                  <div class="form-group ">
                                      <label for="message-text" class="col-form-label">Montant:</label>
                                      <input type="number" class="form-control  boll" name="">
                                  </div>
                                  <div class="form-group">
                                      <label for="message-text" class="col-form-label">date de paiement:</label>
                                      <input type="datetime" class="form-control boll" name="">
                                  </div>
                                  
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-warning">Soumettre</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>  -->
<div class=" container-fluid ">
<div id="toast" class="toast"><?php echo $message; ?></div>
  <h2 class="text-center" id="fleche">
    Ajouter un trajet
   </h2>

   <form action="../Modele/proposer_trajet.php" method="post" class="bg-white cadre shadow p-5" id="form">
   <div class="row">
  <div class="col-sm-6  info_section">
    <section class="contact_section">
    <input type="hidden" name="id_conducteur" value="<?php echo $_SESSION['conducteur_id'];?>">
        <div>
          <input type="text" class="form-control" placeholder="Ville de depart"  name="depart" id=""required/>
        </div>
        <div>
          <input type="datetime-local" class="form-control"  placeholder="date et heure du trajet" name="date" id="" required/>
        </div>
    
        <div class="tmRadio" required>
          <label class="radio-inline"><input type="radio" id="tmradio0" style="height: 25%;" name="optradio" value="classique" . <?php echo $vehicule == 'Classique' ? "checked" : "disabled";?>>Classique</label>
          <label class="radio-inline ms-3"><input type="radio" id="tmradio1" class="" style="height: 25%;" name="optradio" value="Vip". <?php echo $vehicule== 'vip' ? "checked" : "disabled";?>>Vip</label>
          <label class="radio-inline ms-3"><input type="radio" id="tmradio2" style="height: 25%;" name="optradio" value="Vip++" . <?php echo $vehicule== 'vip++' ? "checked" : "disabled";?>>Vip++</label>
        
        <label class="radio-inline ms-3"><input type="radio" id="tmradio2" style="height: 25%;" name="optradio" value="Lux". <?php echo $vehicule== 'Lux' ? "checked" : "disabled";?>>Lux</label>
      </div>
      

    
  
    </section>
  </div>
  <div class="col-sm-6  info_section ">
    <!-- contact section -->
    <section class="contact_section">
        
          <div>
            <input type="text" class="form-control" placeholder="Ville d'arrivee" name="arrivee" required/>
          </div>
          <div>
            <input type="number" class="form-control"  placeholder="prix du trajet"name="prixDuTrajet" required/>
          </div>
          <div class="">
              <select  class="" name="nb_place" id="" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints=""required>
                <option disabled>Nombre de places</option>
                
                   <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
              </select>
            </div>
           
              <button type="submit"  class="bg-primary text-white mb-3">
                Proposer un trajet
              </button>
        
      </section>
</div>
</div>
  </form>
  
</div>
<!-- </div> -->

<script>
  document.addEventListener("DOMContentLoaded",function(){
    var showToast = <?php echo json_encode($showToast); ?>;
    if(showToast){
      var toast= document.getElementById('toast');
      toast.style.display='block';
      setTimeout(function() {
      
       window.location.href="profilConducteur.php";
     },3000);
    }
  });

  
 /* $("#number").selectmenu()
  .selectmenu("menuWidget")
  .addClass("overflow");*/
</script>

<?php 
include '../includes/foot.php';
?>




</body>
</html>
