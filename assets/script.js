$(document).ready(function(){
    $('#becomeDriver').click(function(){
      $('#wantsToBeDriver').val(1);//definir un champ cache a 1 vrai
      $('#inscriptionForm').submit();
     //  $.ajax({
     //    url: 'iscription.php',
     //    type: 'POST',
     //    data: $('#inscriptionForm').serialize(),
     //    success: function(reponse){
     //      let data : JSON.parse(reponse);
     //      if(data.userId && data.wantsToBeDriver){
     //        window.location.href:'conducteur.php?userId='+data.userId;

     //      }else{
     //        alert(data.error || 'une erreur s est produite');
     //      }
     //    }
     //    error : function(){
     //      alert('une erreur est survenue');
     //    }
     //  });


    });

     $('#traitement_conducteur').submit(function(event){
        event.preventDefault();
        $.ajax({
          url: '../Modele/profil_conducteur.php?userId=' +$('#userId').val(),
          type: 'SESSION',
          success: function(response){
                 let data = JSON.parse(response);
                 if(data.error){
                   alert(data.error);
                 }else{
                   let html ='<h2>NOM:  ${data.nom}</h2>';
                   html +='<h2>PRENOM:  ${data.prenom}</h2>';
                   html+= '<h2>Email:  ${data.email}</h2>';
                   html+= '<h2>Numero de permis:  ${data.numero_permis}</h2>';
                  html+='<h2>plaque immatriculation:  ${data.plaque_immatriculation}</h2>';
                  $('#conducteurInfo').html(html);
                 }
                 },
                 error: function(){
                   alert('Erreur lors de la recuperation des informations du conducteur');
                 }
        });
      });
  
  }) ;
  
  //  function Reserver(){


  //  }
function loadNotification(){
  fetch('../Modele/notification.php')
  .then(reponse => reponse.json())
  .then(data => {
  const notificationList= document.getElementById('notification-list');
const notificationCount=document.getElementById('notification-count');
notificationList.innerHTML='';//vider la liste actuelle
if(data.length >0){
  data.forEach(notification => {
    const notificationItem=document.createElement('a');
    notificationItem.className='dropdown-item';
    notificationItem.href='#';
    notificationItem.textContent=notification.messages;
    notificationList.appendChild(notificationItem);

  });
  notificationCount.textContent=data.length;

}else{
  const noNotificationItem=document.createElement('a');
  noNotificationItem.className='dropdown-item';
  noNotificationItem.textContent='Aucune nouvelle notification';
  notificationList.appendChild(noNotificationItem);
  notificationCount.textContent='0';
}
  });
}

setInterval(loadNotification,5000);

document.addEventListener('DOMContentLoaded', loadNotification);

/////////////////////////////////////////Marquer les notifications comme lues lorsqu elles sont consultées/////////////////


function lueNotification(){
  fetch('../Modele/notificationLues.php')
  .then(reponse => reponse.json())
  .then(data=>{
    if (data.success){
      loadNotification(); //recharger les notifications
    }
  });
}
document.getElementById('notification-list').addEventListener('click',lueNotification);