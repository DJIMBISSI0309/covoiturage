
  <!-- <div class="void slider_section " style="margin-bottom:0">
  <img src="../Vue/image/covoit.jpg" style="
   background-size: cover;
  background-position: center;
  width: 100%;
  height: 300px;
  "> -->

    <!-- Spinner Start -->
    <!--div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
          <span class="sr-only">Loading...</span>
      </div>
  </div-->
  <!-- Spinner End -->
  <!-- <h1 class=""><img src="image/lg.png"style="width:10%;height:5%"></h1>
  <p>Votre destination notre passion.Réservez votre taxi en ligne dès maintenant!</p>  -->
</div>

<nav class="navbar navbar-expand-sm long navbar-dark">
  <a class="navbar-brand" href="../Vue/index.php" id="logo">
  <div class="logo2"><b id="logo1">Co</b><b  class="text-danger text-bold">vo</b><b  class="text-warning text-bold">it</b>
     <b id="logo1">'Exp</b><b class="text-danger text-bold">re</b><b class="text-warning text-bold">ss</b>
    </div> 
  </a>
  <button class="navbar-toggler bg-primary" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php"id="boot">Accueil</a>
      </li>
     
      <!-- <li class="nav-item">
        <a class="nav-link" href="trybs_template1.htm#" id="boot">Services</a>
      </li>     -->
      <li class="nav-item">
        <a class="nav-link" href="trajetsProposer.php" id="boot">Trajets</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="propTrajet.php" id="boot">Publier un trajet</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="../Vue/profilConducteur.php" id="boot">Profil</a>
       </li> 
      <li class="nav-item">
        <a class="nav-link" href="contact.html" id="boot">Contact</a>
      </li>  
      <li class="nav-item">
        <a class="nav-link" href="prop.html" id="boot">A propos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inscription.php" id="boot" >S'inscrire</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="boot" >
         <span id="notification-count" class="badge badge-danger">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" id="notification-list">

    
          </div>
      </li> 
      
     
    <li class="dropdown">
  <span  class="dropdown-toggle text-white" data-toggle="dropdown">
   <i class="fa fa-arrow-circle-right fa-2x  mt-2" id="fleche"></i>
  </span>
  <div class="dropdown-menu me-md-5">
    <a class="dropdown-item text-primary" href="../Modele/deconnexion.php" >se deconnecter</a>
    <?php
     if(isset($_SESSION['utilisateur_id'])){
    echo "<a class='dropdown-item text-primary' href='../Vue/parametre.php'>Profil utilisateur</a>";
     
  }
  ?>

</div>
</li>
</nav>
<hr>
<!-- <div class="mt-5"></div> -->
