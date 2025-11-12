<!DOCTYPE html>
<html lang="en">
<head>
<?php
  include '../includes/head.php';
  ?>
  <title>Bootstrap 4 Website Example</title>
  <link rel="stylesheet" href="../assets/style.css" />
     
  <style>
  /* .fakeimg {
      height: 200px;
      background: #aaa;
  }
      #boot {
text-decoration: none;
color: #000;
font-weight: bold;
padding: 10px 20px;
transition: 0.5s;
border-radius: 6px;
}
#boot:hover{
    background-color: #000;
    color: #fff;
}
#sel1{
    
    margin-left: 10%;
     
     transform:translateY(-2px);
  
   }
   #bot{
    
    margin-left: 90%;
     
     transform:translateY(50px);
  
   }
   #get{
    
    margin-left: 5%;
     
     transform:translateY(-30px);
  
   }
   .info_section .contact_section {
    position: relative;
  }
  
  .info_section .contact_section h2 {
    font-weight: bold;
  }
  
  .info_section .contact_section form {
    margin-top: 45px;
    padding-right: 35px;
    margin-bottom: 45px;
  }
  
  .info_section .contact_section input {
    width: 100%;
    border: none;
    height: 50px;
    margin-bottom: 25px;
    padding-left: 25px;
    background-color: #000;
    outline: none;
    color: #ffffff;
    border-radius: 45px;
  }
  textarea{
    width: 100%;
    border: none;
    height: 50px;
    margin-bottom: 25px;
    padding-left: 25px;
    background-color: #000;
    outline: none;
    color: #ffffff;
    border-radius: 45px;
  }
  
  .info_section .contact_section input::-webkit-input-placeholder {
    color: #737272;
  }
  
  .info_section .contact_section input:-ms-input-placeholder {
    color: #737272;
  }
  
  .info_section .contact_section input::-ms-input-placeholder {
    color: #737272;
  }
  
  .info_section .contact_section input::placeholder {
    color: #737272;
  }
  
  .info_section .contact_section textarea.message-box {
    height: 135px;
    border-radius: 25px;
  }
  
  .info_section .contact_section button {
    border: none;
    display: inline-block;
    padding: 12px 55px;
    background-color: #ffffff;
    border: 1px solid transparent;
    border-radius: 35px;
    color: #000000;
    margin-top: 35px;
  }
  
  .info_section .contact_section button:hover {
    background-color: #000000;
    color: #ffffff;
  }
  
  .info_section .contact_section .map_container {
    height: 100%;
    min-height: 325px;
  }
  
  .info_section .contact_section .map_container .map-responsive {
    height: 100%;
  }
  
   .foot{
    background: url("image/image10.jpg")  ;
    background-size: cover;
    background-position: center;
    
}
.bot{
    background: url("image/image12.jpg")  ;
    width: 100%;
    height: 200px;
    background-size: cover;
    background-position: center;
} */


  </style>
</head>
<body>


<?php
include '../includes/navbar.php';
?>
<div class="container-fluid">
       
        <div class="row ">
        <div class="col-sm-12 bot">
          <span>  <!--img src="image/image11.jpg"style="width:100%;height:200px"-->
           <h2 class="text-center text-white mt-5">Contacts</h2>
          </span>
        </div>
        </div>
        <div class="mt-4"></div>
        <div class="row  contact  icons-container  alert alert-warning">

    
          <div class="col-sm-4 icons border border-warning">
             <i class="fas fa-phone "></i>
             <h3>phone :</h3>
             <p>+237 679473414</p>
             <p>+237 687519590</p>
          </div>
    
          <div class="col-sm-4 icons border border-warning">
             <i class="fas fa-envelope"></i>
             <h3> email : </h3>
             <p>ervane@gmail.com</p>
             <p>ds@gmail.com</p>
          </div>
    
          <div class="col-sm-4 icons border border-warning">
             <i class="fas fa-map"></i>
             <h3>address :</h3>
             <p>Cameroun</p>
          </div>
        </div>
     
        <div class="mt-4"></div>
        <div class="row bg-warning ">
            
            <div class="col-sm-3">

            </div>
            <div class="col-sm-6  info_section ">
              <!-- contact section -->

              <section class="contact_section">
                    <h2>
                     Entrer en contact
                  </h2>


               
              
               
                  <form action="">
                    <div>
                      <input type="text" class="form-control" placeholder="Nom" />
                    </div>
                    <div>
                      <input type="text" class="form-control"  placeholder="Numero de telephone" />
                    </div>
                    <div>
                      <input type="email" class="form-control"  placeholder="Email" />
                    </div>
                    <div>
                      <textarea  class="message-box " placeholder="Message"></textarea>
                    </div>
                    <div class="d-flex">
                      <button class="">
                        Envoyer
                      </button>
                    </div>

                  </form>
              
                </section>
        </div>
            <div class="col-sm-3">

            </div>
        </div>
      </div>
  

        <!-- Testimonial Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                    <h1 class="mb-3">Our Clients Says!</h1>
                    <p>Eirmod sed ipsum dolor sit rebum labore magna erat. Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam justo sed rebum vero dolor duo.</p>
                </div>
                <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-1.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-2.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item bg-light rounded p-3">
                        <div class="bg-white border rounded p-4">
                            <p>Tempor stet labore dolor clita stet diam amet ipsum dolor duo ipsum rebum stet dolor amet diam stet. Est stet ea lorem amet est kasd kasd erat eos</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded" src="img/testimonial-3.jpg" style="width: 45px; height: 45px;">
                                <div class="ps-3">
                                    <h6 class="fw-bold mb-1">Client Name</h6>
                                    <small>Profession</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <!-- Testimonial End -->
  <div class="mt-4"></div>
  


  <?php 
include '../includes/foot.php';
?>

  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
</body>
</html>
