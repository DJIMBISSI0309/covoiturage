<?php
session_start();
?>
  <!DOCTYPE html>
<html lang="en">
  <?php
include '../includes/head.php';
  ?>


  <style>
/*   
    .icon-input{
     position: relative;
   } 
  
   .icon-input i{
     position: absolute;
  
      top: 50%; 
     transform: translateY(-50%);
     left: 5%;
     z-index: 2;
   }
   .icon-input input {
     padding-left: 30px;
   }
  
   .foot{
    background: url("../image/image10.jpg")  ;
    background-size: cover;
    background-position: center; */
    /* height: 150vh; */
    

    .icon{
  position: absolute;
  left:10px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
}
input{
  width: 110%;
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





<div class="container-fluid foota">
    
      <div class="row">
          <div class="col-md-6">

          </div>
     <div class="col-md-6 mt-3 w-auto  ms-7 mx-auto"id="set">
   
 
   <form  method="post" action="../Modele/connexion.php" class="bg-white cadre shadow w-100  p-5" >
   <?php
     if(isset( $_SESSION['erreur'])){
      echo '<div class="alert-danger">'.$_SESSION['erreur'].'</div>';
      unset($_SESSION['erreur']);
  }
   ?>
   <div class="text-center ">
     <div class="logo2"><b id="logo1">Co</b><b  class="text-danger text-bold">vo</b><b  class="text-warning text-bold">it</b>
     <b id="logo1">'Exp</b><b class="text-danger text-bold">re</b><b class="text-warning text-bold">ss</b>
    </div>   
      <div class="ms-3">Je n'ai pas de compte? <a href="inscription.php" class="text-decoration-none">S'inscrire</a></div>
   
      </div>
      <div class="mt-4"></div>
     
  <div class="mt-3"></div>
  <div class="container">
  <div class="input-container">
  

           <input type="email" placeholder="Email" name="email"  required>
        <span class="icon"><i class="fa fa-envelope"></i></span>
   
</div>
    <div class="input-container">
             <input type="password" placeholder="Mot de passe" name="password" required>
             <span class="icon"><i class="fa fa-lock"></i></span>
     </div>

     </div>
     <!-- <div class=""></div>
      <div class=""></div>
  <div class="form-inline">
      <div class="row">
          
          <div class="col-sm-12">
                  <span class="form-inline"><input type="password" name="password" size="47" id="passe"placeholder="      Mot de passe"class="ms-2 form-control" ></span>     
                  <i class="fa fa-lock text-warning  top-10" id="get"></i>
         </div>
      </div>
  </div> -->
  <div class="mt-3"></div>
  <div class="row">
  <div class="col-sm-6">
  <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox"> <b>Se souvenir de moi</b>
          </label>
        </div>
   </div>
      <div class="col-sm-6">
          <div class="row">
              <div class="col-sm-12">
          <span> <a href ="#" class="text-decoration-none  ms-1">Mot de passe oublié?</a></span>
      </div>
      <div clas="col-sm-0">
         <span></span> 
      </div>
      </div>
  </div>
</div>
      <div class="mt-4"></div>

      <button type="submit" class="btn btn-primary text-white"style="width:100%">Se connecter</button></span> 
  </form> 
  </div> 
  <!-- <div class="col-md-3">

  </div> -->
  <div class="mb-3"></div>   
  </div> 

  
</div>
<?php
    include '../includes/foot.php';
 ?>

<script>
  // const input=document.querySelector('.icon-input input');
  // const icon=document.querySelector('.icon-input i');
  // input.addEventListener('input',function(){
  //   const inputPadding=parseInt(window.getComputedStyle(input).getPropertyValue('padding-left'));
  //   icon.style.left=(5+inputPadding)+'px';
  // });
  document.querySelectorAll('.icon-input input').forEach(function(input)){
     input.addEventListener('focus',function(){
     this.previousElementSibling.style.color='#333';
  });
  input.addEventListener('blur',function(){
  if(this.value===''){
    this. this.previousElementSibling.style.color='#ccc';
  }
  });
  
  });
  </script>
</body>
</html>
