<?php
session_start();
$sql="SELECT * FROM trajet WHERE idtrajet=?";
$req=$pdo->prepare($sql);
$req->execute([$trajet_id]);
$trajet=$req->fetch(PDO::FETCH_ASSOC);
//recuperer les informations du conducteur
$sql2="SELECT * FROM utilisateur WHERE idutilisateur=?";
$req2=$pdo->prepare($sql);
$req2->execute([$conducteur_id]);
$conducteur=$req2->fetch(PDO::FETCH_ASSOC);
if($trajet){
    echo "";
    echo "Depart: ".$trajet['depart'];
    echo "Arrivee: ".$trajet['arrivee'];
    echo "Date: ".$trajet['date'];
    echo "heure: ".$trajet['heure'];
    echo "Nombres de places: ".$trajet['nb_places'];
    echo "Prix: ".$trajet['prix']."fcfa";
    echo "conducteur:".$conducteur['nom']." ".$conducteur['prenom']."";
    //verifier si l utilisateur est connecte et peut reserver un trajet
    if(isset($_SESSION['utilisateur_id'])){
        //verifier si lutilisateur a deja reserver une place
        $sql="SELECT * FROM reservation WHERE trajet_id=? AND utilisateur_id=? ";
        $req=$pdo->prepare($sql);
        $req->execute([$trajet_id,$_SESSION['conducteur_id']]);
        if($req->rowCount()>0){
            echo "Vous avez deja reserve une place pour ce trajet";
        }else if($trajet['nb_places']>0){
            echo"";
            echo "";
            echo"Reserver une place";
            echo "";

        }else{
            echo "il n ya plus de places disponnibles pour ce projet";

        }
    }
}else{
    echo "trajet non trouvé";
}
?>