<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<?php
  include '../includes/head.php';
  ?>
<title>Conducteur</title>

<style>
 
  
 
 .icon{
   position: absolute;
   left:10px;
   top: 50%;
   transform: translateY(-50%);
   font-size: 20px;
 }
 input{
   width: 100%;
   padding :10px 10px 10px  40px;
   border: 1px solid #ccc;
   border-radius: 5px;
 }
 .input-container{
   position: relative;
   margin-bottom: 20px;
 }
   </style>
<body>
<?php
include '../includes/navbar.php';
?>


<div class="container-fluid foot" >
    

        <div class="row ">
                <div class="col-sm-4 ">
      
                </div>
                <div class="col-sm-8 mt-4">
      
                </div>
      
            </div>
              <div class="row">
                  <!-- <div class="col-md-1">
      
                  </div> -->
             <div class="col-md-6  w-auto  ms-7 mx-auto"id="set">
           <form class=" bg-white  cadre shadow p-5 w-100" id="traitement_conducteur" method="post" action="../Modele/devenir_conducteur.php">
      
          <div class="text-center ">
          <div class="logo2"><b id="logo1">Co</b><b  class="text-danger text-bold">vo</b><b  class="text-warning text-bold">it</b>
           <b id="logo1">'Exp</b><b class="text-danger text-bold">re</b><b class="text-warning text-bold">ss</b>
          </div> 
             <div><b class="text-dark  p-3 "style="font-size:25px;font-family:time rowman">Devenir conducteur</b>
           
            </div >
              </div>
              <div class="mt-4"></div>
             
             <input type="hidden" name="userId" id="userId" value="<?php echo $_GET['userId'];?>">
             <input type="hidden" name="utilisateur_id" id="" value="<?php echo $_GET['userId'];?>">
             
             <div class="input-container">
             <input type="text" placeholder="Permis de conduire" name="permis_conduire" required>
             <span class="icon"><i class="fa fa-book"></i></span>
            </div> 
                  
                  <select class="form-select" name="modeleVehicule">
                    
                      <option value="classique">Classique</option>
                      <option value="Vip">vip</option>
                      <option value="Vip++">vip++</option>
                      <option value="Lux">Lux</option>
                    </select>
             
                    <div class="input-container">
                     <input type="text" placeholder="Plaque d'immatriculation" name="plaque" required>
                    <span class="icon"><i class="fa fa-id-card"></i></span>
                   </div>
               
    
              <div class="mt-3"></div>
      
              <span class="ms-5">
                  <button type="submit"name="devenir_conducteur" class="btn btn-primary text-white">Soumettre</button></span> 
              </form>  
          </div> 
          <div class="col-md-6">
      
          </div> 
          <div class="mb-3"></div>  
          </div> 
        </div>




<?php 
include '../includes/foot.php';
?>
</body>
</html>