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

<div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Conducteur ou Client</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
        
              <!-- Modal body -->
              <div class="modal-body">
                <label class="radio-inline"><input type="radio" id=""  name="optradio"><b>       Conducteur</b></label>
                <label class="radio-inline ms-5"><input type="radio" id=""  name="optradio"> <b>  Client</b></label>
        
              </div>
        
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="submit"><a href="sign.html" class="text-decoration-none text-white">Envoyer</a></button>
              </div>
        
            </div>
          </div>
        </div>    
    </ul>
  </div>  
</nav>

<div class="container" style="margin-top:30px">
  <div class="row">
    <div class="col-sm-4">
      <h2>Bienvenue</h2>
     
      <div class="fakeimg"><img src="image/image10.jpg"style="width:100%;height:200px"></div>
      <p>
          notre plateforme de reservation en ligne vous offre une experience sans tracas.Il vous suffit
              de remplir le formulaire avec les détails de votre trajet,tels que votre lieu de depart
            votre destination et l'heure souhaitée.une fois une reservation confirmée vous recevez une notification
        avec les details de votre taxi,y compris le numero de la plaque d'immatriculation
    et les coordonnées du conducteur.  </p>
    
    <!-- <div class="row bg-warning"style="height: 800px;">
            
      <div class="col-sm-0">

      </div>
      <div class="col-sm-12  info_section ">
       

         <section class="contact_section">
              <h2>
               Reserver maintenant
            </h2>
            <form action="">
              <div>
                <input type="text" placeholder="DEpuis" />
              </div>
              <div>
                <input type="text" placeholder="A" />
              </div>
              <div>
                <input type="number" placeholder="numero de telephone" />
              </div>
              <div>
                <input type="text" placeholder="heure" />
              </div>
              <div>
                <input type="date" placeholder="heure" />
              </div>
              <div class="tmRadio">
                <label class="radio-inline"><input type="radio" id="tmradio0" style="height: 25%;" name="optradio">Classique</label>
                <label class="radio-inline ms-3"><input type="radio" id="tmradio1" class="" style="height: 25%;" name="optradio">Vip</label>
                <label class="radio-inline ms-3"><input type="radio" id="tmradio2" style="height: 25%;" name="optradio">Vip++</label>
              
              <label class="radio-inline ms-3"><input type="radio" id="tmradio2" style="height: 25%;" name="optradio">Lux</label>
            </div>
          
           
              <div class="d-flex">
                <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                  Envoyer
                </button>
              </div>

            </form>
         
          </section> -->
  <!-- </div>
      <div class="col-sm-0">

      </div>
   
  </div> -->
  
    </div>
    <div class="col-sm-8">
      <h2>Reservation</h2>
      <h5>Dans notre section de reservation en ligne</h5>
      <div class="fakeimg"><img src="image/image13.jpg"style="width:100%;height:200px"></div>
       <p>
       </p>

       </p>
        Nous mettons un point d'honneur à vous offrir un large choix de vehicules adaptés à vos besoins
        .Notre systeme de notation des conducteurs vous permet de choisir en toute confiance,en vous basant sur les commentaires
        et les évaluations des autres utilisateurs.
         <div class="mt-5"></div>
        <div class="fakeimg"><img src="image/image11.jpg"style="width:100%;height:200px"></div>
        <p>Some text..</p>
        <p>
            Nous sommes determinées à rendre votre resevation de taxi aussi agreable que possible.
            Faites-nous confiance pour vous offrir un service fiable,securisé et ponctuel.Réservez
            dès maintenant et laissez-nous vous accompagnez vers votre destination en toute sérénité.
          </p>
   
    </div>
  </div>

   
</div>

<div class="container-fluid">
       
   
     
      
     
        <div class="mt-4"></div>
        <div class="row">
          
        </div>
        <div class="row bg-warning ">
            <h2 class="text-center">
                Reserver maintenant
             </h2>
            <div class="col-sm-6  info_section">




                
                <form action="">
              <section class="contact_section">
               
                  <div>
                    <input type="text" class="form-control" placeholder="Nom" />
                  </div>
                 
                  <div>
                    <input type="text" class="form-control"  placeholder="Numéro de carte d'identité" />
                  </div>
               
                

              
            
              </section>
            </div>
            <div class="col-sm-6  info_section ">
           

              <section class="contact_section">
                  


               
              
               
               
                    <div>
                      <input type="text" class="form-control" placeholder="Prenom" />
                    </div>
                    <div>
                      <input type="number" class="form-control"  placeholder="Numero de telephone" />
                    </div>
                   
                  
               
                      <div class="">
                        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                          Envoyer
                        </button>
                      </div>
                </section>
               
            </form>
        </div>
           
        </div>
      </div>





      <div class="col-lg-12">
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
                                            <input type="datetime-local" class="form-control boll" name="">
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
    </div>
  

        
  <div class="mt-4"></div>
  


  <?php 
include '../includes/foot.php';
?>

</body>
</html>
