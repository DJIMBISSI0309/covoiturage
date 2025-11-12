<?php
session_start();
$showToast= false;
$message= '';
if(isset($_SESSION['success'])){
  $showToast= true;
  $message = $_SESSION['success'];
  unset($_SESSION['success']);
}
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    .toast{
      display: none;
     right: 20px;
     min-width: 250px;

      background-color: #4CAF50;
      color: white;
      border-radius: 2px;
      padding: 16px;
      position: fixed;
       box-shadow: 0 2px 10px rgba(0,0,0,0.1);
       bottom: 30px;
      
    }
   
    </style>
</head>
<body>
<div id="toast" class="toast"><?php echo $message; ?></div>
    

<script>
  document.addEventListener("DOMContentLoaded",function(){
    var showToast = <?php echo json_encode($showToast); ?>;
    if(showToast){
      var toast= document.getElementById('toast');
      toast.style.display='block';
      setTimeout(function() {
      
       window.location.href="profilConducteur.php";
     },3000);
    }
  });

  
 /* $("#number").selectmenu()
  .selectmenu("menuWidget")
  .addClass("overflow");*/
</script>
</body>
</html>