<!DOCTYPE html>
<html lang="en">

  <?php
  session_start();
  include 'includes/head.php';
  ?>
  <title>Accueil</title>
  <style>
    .hero_section h1{
font-size: 3.5rem;
font-weight: bold;
color:#fff;
text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
.hero_section p {
  font-size: 1.25rem;
  font-weight: 500;
  margin-top: 20px;
  color:#fff;
  text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
}
.action-card{
  background:rgba(255,255,255,0.95);
  padding: 30px;
  border-radius: 10px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  max-width: 600px;
  margin: 0 auto;
  text-align: center;
}
/* .search-card .form-group{
  position: relative;
  margin-bottom: 20px;
} */
.action-card h3{
font-size: 2rem;
 margin-bottom: 20px;
 color: #333;
}
.action-card p{

 color: #555;
}
.hero_section{
  background:url('image/img.jpg') no-repeat center/cover;
  height: 100vh;
  /* background-size: cover;
  background-position: center; */
  display: flex;
  align-items: center;
  justify-content: center;

  text-align: center;
}

/* .search-card .input-con{
  position: absolute;
  left: 10px;
  top: 50%;
  transform:translateY(-50%);
  color: #007bff;
} */
 .action-card .btn{
 
  border-radius: 5px;
  font-size: 1.1rem;

  padding: 15px 30px;
  margin: 10px;
  transition: background 0.3s ease;
} 
/* .search-card .btn:hover{
  background:#0056b3;
}  */
    </style>


<body>
  

<?php
include 'includes/navbar.php';
?>



  
<!-- <div class="container-fluid"> -->







  <!-- Indicators -->
  <!-- <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul> -->

  <!-- The slideshow -->
   <!-- <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/img7.jpg" alt="Los Angeles" class="img-fluid">
    </div>
    <div class="carousel-item">
      <img src="image/img7.jpg" alt="Chicago">
    </div> 
    <div class="carousel-item">
    <img src="image/img7.jpg" alt="Los Angeles">
  <div class="carousel-caption">
    <h3>Los Angeles</h3>
    <p>We had such a great time in LA!</p>
  </div>
</div>
    <div class="carousel-item">
      <img src="image/img7.jpg" alt="New York"class="img-fluid">
    </div>
  </div>  -->

  <!-- Left and right controls -->
  <!-- <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div> -->
  <!-- <div class="row">
  <div class="col-md-5">
    <h5><b>Faites de vos trajest des  moments inoubliables de plaisir et d'exploration !</b></h5>
  <p>
  Covoit'Express
   vous invite à plonger dans une communauté chaleureuse de voyageurs enthousiastes ,où chaque
   trajet devient l'occassion de tisser de nouveaux liens. Embarquez avec nous et laissez-vous
   porter par l'esprit d'aventure et la chaleur de l'amitié !
</p>
<div class="row">
  <div class="col-sm-9">

</div>
<div class="col-sm-3 mt-3 mb-3">
<button type="submit" class="btn btn-primary"><a href="connect.php"class="text-decoration-none text-white">Connexion</a></button>
</div>
</div>
</div> 
    <div class="col-md-7">
  <img src="image/cvoit.jpg" class="float-left img-fluid">
 </div>

</div> -->
  <!-- <div class="row mt-3">         
 <div class="container-xxl py-5">
  <div class="container">
      <div class="row g-0 gx-5 align-items-end">
          <div class="col-lg-6">
              <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                  <h1 class="mb-3">Recommandations</h1>
                  <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit diam justo sed rebum.</p>
              </div>
          </div>
          <div class="col-lg-6 text-start text-lg-end wow slideInRight" data-wow-delay="0.1s">
              <ul class="nav nav-pills d-inline-flex justify-content-end mb-5">
                  <li class="nav-item me-2">
                      <a class="btn btn-outline-primary active" data-bs-toggle="pill" href="#tab-1">CLassique</a>
                  </li>
                  <li class="nav-item me-2">
                      <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-2">Vip</a>
                  </li>
               
                  <li class="nav-item me-0">
                      <a class="btn btn-outline-primary" data-bs-toggle="pill" href="#tab-3">Lux</a>
                  </li>
              </ul>
          </div>


 
</div>
 
</div>
</div>
</div> -->

<!-- 
<div class="tab-content">
  <div id="tab-1" class="tab-pane fade show p-0 active">
      <div class="row g-4">
          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
              <div class="property-item rounded overflow-hidden">
                  <div class="position-relative overflow-hidden">
                      <a href=""><img class="img-fluid" src="image/page3.jpg" alt=""></a>
                      <div class="bg-primary rounded  position-absolute start-0 top-0 m-4 py-1 px-3"><a href="resert.html"class="text-decoration-none text-white">Reserver</a></div>
                      <div class="bg-white rounded-top text-dark position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Classique</div>
                  </div>
                  <div class="p-4 pb-0">
                    
                      <p><i class=" text-primary me-2"></i>
                        notre confort Classique est conçu pour vous offrir une experience 
                        de voyage confortable 
                      </p>
                  </div>
                  <div class="border-top">
                   
                      <div class="flex-fill text-center p-2"><a href="#" data-toggle="collapse" data-target="#dem1"class="text-decoration-none text-white bg-primary p-1 rounded">Lire la suite</a></div>
                 
                  <div id="dem1" class="collapse mt-4">
              
                  <p>Et  relaxante un systeme audio de qualié et un espace généreux vous permettent de vous detendre 
                    et de profiter du trajet en toute tranquilité.</p>
                    
                </div> 
              </div>
              </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="property-item rounded overflow-hidden">
                <div class="position-relative overflow-hidden">
                    <a href=""><img class="img-fluid" src="image/big7.jpg" alt=""></a>
                    <div class="bg-primary rounded  position-absolute start-0 top-0 m-4 py-1 px-3"><a href="resert.html"class="text-decoration-none text-white">Reserver</a></div>
                    <div class="bg-white rounded-top text-dark position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Vip</div>
                </div>
                <div class="p-4 pb-0">
                  
                    <p><i class=" text-primary me-2"></i>
                      Embarquez dans notre Classique plus et laissez vous envelopper par une atmosphere 
                      de sérénité.
                    </p>
                </div>
                <div class="border-top">
   
                    <div class="flex-fill text-center p-2"><a href="#" data-toggle="collapse" data-target="#dem2"class="text-decoration-none text-white bg-primary p-1 rounded">Lire la suite</a></div>
               
                <div id="dem2" class="collapse mt-4">
            
                <p>
                  .Avec des sièges inclinables ,une musique apaisante et une ambiance feutrée
                ,chaque trajet devient une paranthése de confort et de bien-être.</p>
                  
              </div> 
            </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
          <div class="property-item rounded overflow-hidden">
              <div class="position-relative overflow-hidden">
                  <a href=""><img class="img-fluid" src="image/page4.jpg" alt=""></a>
                  <div class="bg-primary rounded  position-absolute start-0 top-0 m-4 py-1 px-3"><a href="resert.html"class="text-decoration-none text-white">Reserver</a></div>
                  <div class="bg-white rounded-top text-dark position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Vip plus</div>
              </div>
              <div class="p-4 pb-0">
                
                  <p><i class=" text-primary me-2"></i>
                    notre taxi est spécialement conçu pour offrir un confort optimal à nos passagers.
                  </p>
              </div>
              <div class="border-top">
                  
                  <div class="flex-fill text-center p-2"><a href="#" data-toggle="collapse" data-target="#dem3"class="text-decoration-none text-white bg-primary p-1 rounded">Lire la suite</a></div>
             
              <div id="dem3" class="collapse mt-4">
          
              <p>
                Avec des sièges spacieux et moelleux,une climatisation réglable et une ambiance calme,vous apprécierez chaque trajet 
                dans notre taxi Vip plus plus .</p>
                
            </div> 
          </div>
          </div>
      </div>

      
      <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="property-item rounded overflow-hidden">
            <div class="position-relative overflow-hidden">
                <a href=""><img class="img-fluid" src="image/page4.jpg" alt=""></a>
                <div class="bg-primary rounded  position-absolute start-0 top-0 m-4 py-1 px-3">
              <a href='#'class='text-decoration-none text-white' onclick="Reserver()">Reserver</a>
                  
                 
 
                   </div>
                <div class="bg-white rounded-top text-dark position-absolute start-0 bottom-0 mx-4 pt-1 px-3">Lux</div>
            </div>
            <div class="p-4 pb-0">
              
                <p><i class=" text-primary me-2"></i>
                  Montez à bord de notre lux et laissez vous envelopper par le luxe et le raffinement.
                </p>
            </div>
            <div class="border-top">
        
                <div class="flex-fill text-center p-2"><a href="#" data-toggle="collapse" data-target="#dem4"class="text-decoration-none text-white bg-primary p-1 rounded">Lire la suite</a></div>
           
            <div id="dem4" class="collapse mt-4">
        
            <p>
                un eclairage d'ambiance apaisant et une musique relaxante creent une atmosphere de confort absolu pour un voyage des plus 
                agreables</p>
              
          </div> 
        </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="mt-3"></div>
  





<div class="border-top border-warning mt-4"></div>
<div class="container" style="margin-top:30px">
  <div class="row">
    
    <div class="col-sm-4">
      <h2>Conducteurs</h2>
      <h5>"conducteurs de taxi,conduisez vers le succès avec nous!"</h5>
      <div class="fakeimg"><img src="image/img5.jpg"style="width:100%;height:200px"></div>
      <p>Rejoignez notre plateforme de taxi en ligne dès aujourd'hui et faites partie d'une communauté
          de conducteurs devoués,prêts à offrir un service de qualité superieure. Ensemble,nous pouvons 
          créer une experience de voyage exceptionnelle pour nos passagers et contribuer à la mobilité de notre entourage
        </p>
   
      <p></p>
      <ul class="nav nav-pills flex-column">
       
        <li class="nav-item">
            <button type="submit" class="btn btn-primary  mt-2"style="width:30%"><a href="inscription.php" class="text-decoration-none text-white">S'inscrire</a></button>

          
          </span>
        </li>
        <li class="nav-item mt-2">
         
            <button type="submit" class="btn btn-warning"><a href="connect.php"class="text-decoration-none text-white">Connexion</a></button>
           
          </span>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="trybs_template1.htm#">Disabled</a>
        </li>
      </ul>
 
    </div>
    <div class="col-sm-8">
      <h2>Covoit'Express</h2>
      <h5>"Votre solution pour des déplacements rapides et efficaces"</h5>
      <div class="fakeimg"><img src="image/img3.jpg"style="width:100%;height:200px"></div>
       <p>

       </p>
      <p>
        Nous mettons en avant les avantages de notre plateforme,tels que la simplicité d'utilisation
        ,la disponibilité 24h/24 et 7j/7,ainsi que notre engagement envers la securité et la satisfaction des clients
        </p> <br>
      <h2>Clientèle</h2>
      <h5>"Votre destination notre passion"</h5>
      <div class="fakeimg"><img src="image/img4.jpg"style="width:100%;height:200px"></div>
      <p>Some text..</p>
      <p>
      
       Reservez,Payez et Suivez vos courses en toute simplicité,offrant une experience de voyage sans tracas.
           Nous mettons le pouvoir entre vos mains,en vous connectant rapidement et facilement
            aux taxis les plus proches.Simplifiez votre vie avec notre systeme de Gestion de taxi en ligne
          ou la commodité et la fiabilité sont notre priorité</p>
    </div>
  </div>
 
 
   
   </div> -->

   <section class="hero_section">
     <div class="container">
       <h1> Reserver votre taxi en ligne</h1>
       <p class="bg-primary w-50 ms-3">Suivez vos courses en toute simplicité avec covoit'express</p>
       <div class="action-card">
        <h3>Authentification requise</h3>
        <p>Pour reserver un taxi ou publier un trajet ,veuillez vous connecter ou créer un compte</p>
        <a href="vue/connect.php" class="btn btn-primary">
          <i class="fas fa-sign-in-alt"></i> Se connecter
        </a>
        <a href="vue/inscription.php" class="btn btn-success text-white">
          <i class="fas fa-user-plus"></i> S'inscrire
          </a>  
      </div>
    </div>
   </section>
   <section class="features-section">
     <div class="container">
       <div class="row text-center mb-5">
         <div class="col">
           <h2>Pourquoi choisir Covoit'express ?</h2>
           <p class="lead">Découvrez nos avantages</p>
         </div> 
     </div>
     <div class="row">
       <div class="col-md-4 mb-4">
         <div class="feature-card">
           <i class="fas fa-clock"></i>
           <h4>Rapide et fiable</h4>
           <p>Des chauffeurs disponibles 24/7 pour vous emmener où vous voulez.</p>

         </div>
       </div>
       <div class="col-md-4 mb-4">
         <div class="feature-card">
           <i class="fas fa-dollar-sign"></i>
           <h4>Tarifs compétitifs</h4>
           <p>Des prix transparents et sans surprise.</p>
           
         </div>
       </div>
       <div class="col-md-4 mb-4">
         <div class="feature-card">
           <i class="fas fa-shield-alt"></i>
           <h4>Sécurité garantie</h4>
           <p>Des chauffeurs vérifiés et des trajets sécurisés.</p>
           
         </div>
       </div>
     </div>
     </div>
   </section>
<!-- </div> -->

<?php 
include 'includes/foot.php';
?>



<script>

  $("#tab").tabs();

</script>
  <script src="assets/script.js">

</script>

</body>
</html>
