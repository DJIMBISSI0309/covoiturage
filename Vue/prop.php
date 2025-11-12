<?php
session_start();
// require '';
// if( !isset($_SESSION['conducteur_id'])){
//   header("Location: ../Vue/index.php");
//   exit();


// }
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







<div class="container-fluid  " >
       
         <div class="row mt-4">
         <p >
             Chez nous le taxi n'est pas seulement un moyen de transport,c'est une véritable passion. Depuis notre creation,nous avons mis tout
             notre coeur  et notre expertise dans la création d'une plateforme de reservation de taxi en ligne qui repond
             aux besions et aux attentes de nos clients.Notre equipe est composée de profesionnels dévouées,passionnés par l'industrie
             du taxi et determinés à offrir une experience de voyage inégalée.Nous croyons fermement en la valeur du service personnalisé et 
             de la courtoisie .chaque membre de notre équipe est formé pour offrir un accueil chalereux et un service de qualité.

         </p>
         <p>
        Nous sommes fiers de notre engagement envers la securité de nos passagers.Tous nos conducteurs sont soigneseument
        sélectionnés,avec des des vérifications rigoureuses .De plus nos véhicules sont régulierement entretenus
        et respectent les normes de securité les plus strictes.
        
         </p>
         <p>
             Nous sommes reconnaissants de la confiance que vous nous accordez
             en choisissant notre service de taxi en ligne . nous nous engageons à continuer à innover ,à améliorer et à depasser vos attentes.
             Rejoignez-nous dans notre mission de rendre vos déplacements plus pratiques,plus sûrs et plus agréables.
         </p>
      
        </div>
    </div>
  
    

 <?php 
include '../includes/foot.php';
?>
</body>
</html>
