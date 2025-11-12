<?php
session_start();
require 'database.php';
$trajetId=$_GET['id'];
$sql=$pdo->prepare("SELECT * FROM trajets WHERE id=?");
$sql->execute($trajetId);
$trajets=$sql->fethAll(PDO::FETCH_ASSOC);
// recuperer les commentaires
$sql="SELECT evaluation.*,utilisateur.nom,utilisateur.prenom FROM evaluation JOIN utilisateur ON
evalaution.utilisateur_id=utilisateur.utilisateur_id WHERE evaluation.trajet_id=?";
$result=$pdo->prepare($sql);
$result->execute([$trajetId]);
$commentaire=$result->fetch_All();
//verifier si lutilisateur est connecte
$utilisateurConnecte=false;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details du trajets</title>
</head>
<body>
    <h1>Details du trajets</h1>
    <p>Depart: <?php $trajets['depart'];?></p>
    <p>Arrivee: <?php $trajets['arrivee'];?></p>
    <p> date et Heure : <?php $trajets['date_heure'];?></p>
    <h2> commentaires: </h2>
    <?php if(count($commentaire)>0):?>
    <?php foreach($commentaire as $commentaires): ?>
    <div class="comment">
    <p><strong><?php echo $commentaires['nom'];?><?php echo $commentaires ['prenom'];?></strong></p>
    <p class="date "><?php echo $commentaire['date'];?></p>
    <?php if($utilisateurConnecte && $commentaire['utilisateur_id']==$_SESSION['utilisateur_id']): ?>
    <form action="supprimer_commentaire.php" method="post">
    <input type="hidden" name="commentaire_id" value="<?php echo $commentaires['id'];?>">
    <button type="submit">Supprimer</button>
    </form>
<?php endif; ?>
<?php endforeach ;?>
<?php else: ?>
<p>Aucun commenatire pour ce trajet </p>
<?php endif;?>
<?php if ($utilisateurConnecte):?>
<h2>Ajouter un commentaire</h2>
<form action="Ajouter_commentaire.php" method="post">
<input type="hidden" name="trajet_id" value="<?php echo $trajet['id'];?>">
<div class="form-group">
<label for="contenu">Commentaire:</label>
<textarea name="contenu" id="contenu" class="form-control" rows="3"></textarea>
</div>

    <button type="submit" class="btn-btn-primary">Envoyer</button>

</form>
<?php endif ;?>

  
</body>
</html>
<?php 
$pdo->close();
?>



<?php
//.ajouter_commentaire.php

//connexion base de donnee

//recuperer les donnes du formulaire
$trajetId=$_POST['trajet_id'];
$contenu=$_POST['contenu'];
//verifier si lutilisateur set connecte
if(!isset($_SESSION['utilisateur_id'])){
    die("vous devez etre connecte pour ajouter un commentaire");
}
//insertion
$sql="INSERT INTO evaluation(trajet_id,utilisateur_id,contenu,date_evaluation)VALUES(?,?,?,?)";
$res=$pdo->prepare($sql);
$res->execute([$trajetId,$_SESSION['utilisateur_id'],$contenu,NOW()]);
if($res){
    echo "commenatire reussie";
}else{
    echo "commentaire echoue";

}

$pdo->close;
?>



<?php
//supprimer_commentaire.php
//connexion a la base de donnees
//recuperer l id dyu commenatire
$commenatiareId=$_POST['commentaireid'];
//verification de l' authentification
if(!isset($_SESSION['utilisateur_id'])){
    die("vous devez etre connecte pour ajouter un commentaire");
}
//supprimer un commentaire
$sql="DELETE FROM evaluation WHERE idevaluation=?";
$res=$pdo->prepare($sql);
$res->execute([$commenatiareId]);

$pdo->close();
?>