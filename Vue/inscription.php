<?php
session_start();
?>
  <!DOCTYPE html>
<html lang="en">

 
  <?php

 include '../includes/head.php';
  ?>
  
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


<!-- <div class=" slider_section " style="margin-bottom:0">
  <img src="../image/covoit.jpg" style="
   background-size: cover;
  background-position: center;
  width: 100%;
  height: 300px;
  "> -->
  
</div>
<?php
include '../includes/navbar.php';
?>

<div class="container-fluid foot ">
        <!-- <div class="row ">
                <div class="col-md-4 ">
      
                </div>
                <div class="col-md-8 mt-4">
      
                </div>
      
            </div> -->
              <div class="row">
                  <!-- <div class="col-md-6 ">
      
                  </div> -->
             <div class="col-md-6 w-auto ms-7 mx-auto"id="set">
             <form class=" bg-white cadre shadow w-100   p-5"id="inscriptionForm" method="POST" action="../Modele/inscription.php">
      
      <div class="text-center ">
      <div class="logo2"><b id="logo1">Co</b><b  class="text-danger text-bold">vo</b><b  class="text-warning text-bold">it</b>
     <b id="logo1">'Exp</b><b class="text-danger text-bold">re</b><b class="text-warning text-bold">ss</b>
      </div> 
         <span><b class="text-dark  p-3 "style="font-size:25px;font-family:time rowman">Creer un compte utilisateur</b>
         <div class="ms-3">Deja un compte? <a href="connect.php" class="text-decoration-none">Se connecter</a></div>
       
      </span>
          </div>
          <div class="mt-4"></div>
         <?php
                if(isset($_SESSION['champ'])){
                  echo '<div class="alert alert-success">'.$_SESSION['champ']. '</div>';
                  unset($_SESSION['champ']);
              }
              if(isset($_SESSION['info'])){
                echo '<div class="alert alert-success">'.$_SESSION['info'].'</div>';
                unset($_SESSION['info']);
            }
         ?>
           <div class="input-container">
             <input type="text" placeholder="Nom*" name="nom" required>
             <span class="icon"><i class="fa fa-user"></i></span>
            </div>

            <div class="input-container">
             <input type="text" placeholder="Prenom*" name="prenom" required>
             <span class="icon"><i class="fa fa-user"></i></span>
            </div>

            <div class="input-container">
             <input type="email" placeholder="Email*" name="email" required>
             <span class="icon"><i class="fa fa-envelope"></i></span>
            </div>

            <div class="input-container">
             <input type="password" placeholder="Mot de passe*" name="password" required>
             <span class="icon"><i class="fa fa-lock"></i></span>
            </div>
            
            <div class="input-container">
             <input type="password" placeholder=" confirmation Mot de passe*" name="confirm" required>
             <span class="icon"><i class="fa fa-lock"></i></span>
            </div>

            <div class="input-container">
             <input type="tel" placeholder=" Numero de telephone*" name="tel" required>
             <span class="icon"><i class="fa fa-phone"></i></span>
            </div>
      
         
      
          <div class="mt-3"></div>
         
           <div class="modal" id="myModal">
             <div class="modal-dialog">
               <div class="modal-content">
           
                 
                 <div class="modal-header">
                   <h4 class="modal-title">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </h4>
                 
                 </div>
           
                 
                 <div class="modal-body">
                   <p>voulez-vous devenir conducteur ?</p>
                 </div>
           
                 
                 <div class="modal-footer">
                   <button type="button" class="btn btn-primary text-decoration-none text-white"  id="becomeDriver">
                     Oui</button>
                   <button type="submit" class="btn btn-danger text-decoration-none text-white">Non</button>
                  </div>
           
               </div>
             </div>
           </div>
  
           
              <button type="button" class="btn btn-primary text-white" name="Envoyer"  data-toggle="modal" data-target="#myModal">Soumettre</button>
              <input type="hidden" id="wantsToBeDriver" name="wantsToBeDriver" value="0">      
            </form > 
          
            <div class="modal" id="myModal">
             <div class="modal-dialog">
               <div class="modal-content">
           
                
                 <div class="modal-header">
                   <h4 class="modal-title">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </h4>
                 
                 </div>
              
                
                 <div class="modal-body">
                   <p>voulez-vous devenir conducteur ?</p>
                 </div>
           
                 
                 <div class="modal-footer">
                   <button type="button" class="btn btn-primary text-decoration-none text-white"  id="becomeDriver">
                     Oui</button>
                   <button type="submit" class="btn btn-danger text-decoration-none text-white">Non</button>
                  </div>
           
               </div>
             </div>
           </div>  
           
          </div> 
          
          <div class="col-md-6">
      
          </div> 
          <div class="mb-3"></div>   
          </div> 
        </div>
        
         <!-- <div class="mt-2"></div> -->
         <?php
        include '../includes/foot.php';
         ?>

<script src="../assets/script.js">
  
</script>

</body>
</html>
