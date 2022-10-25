<?php
//On maintient l'ouverture de session
session_start () ;

//On inclue la connexion à la BDD
require ('config.php');

//On neutralise l'utilisation d'html dans le commentaire et on crée la variable commentaire
$commentaire = htmlspecialchars($_POST['commentaire']); 

//On crée les variables nécessaires au traitement des données : id_user et id_acteur
$id_acteur= $_POST['id_acteur'];
$id_user=$_SESSION['id_user'];

//On insère le commentaire de l'utilisateur dans la BDD
 if (!empty($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']); 
    $new_com = "INSERT INTO Post (id_user, id_acteur, post) VALUES ('$id_user', '$id_acteur','$commentaire')";
    $conn->exec($new_com);
 }

//On renvoie à la page sur laquelle est l'utilisateur 
header("location: partners-details.php?id_acteur=".$id_acteur)
?>
