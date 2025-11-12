<?php 
session_start();
?>
    <!DOCTYPE html>
<html lang="en">
<?php
  include '../includes/head.php';
  ?>
<body>
<?php
include '../includes/navbar.php';
?>
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
        //Gerer l'annulation
        // document.addEventListener('click',function(e){
        //     if(e.target.classList.contains('cancel-btn')){
        //         const idreserve = e.target.getAttribute('data-booking-id');
        //         fetch('../Modele/annule_reservation.php',{
        //             method: 'POST',
        //             headers: {'content-Type' : 'application/x-www-form-urlencoded'},
        //             body: `idreservation=${idreserve}`
        //         })
        //         .then(reponse => reponse.json())
        //         .then(data => {
        //             if(data.success){
        //                 alert(data.message);
        //                 loadBookings();//recharger la liste
        //             }else{
        //                 alert(data.message);
        //             }
        //         });
        //     }
        // });
        // //charger au demarrage
         document.addEventListener('DOMContentLoaded',loadBookings);
    </script>
    <?php
    include '../includes/foot.php';
     ?>

<script src="../assets/script.js"></script>
</body>
</html>