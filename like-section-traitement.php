<?php 
//On maintient l'ouverture de session
session_start();

//On inclue la connexion à la BDD
include 'config.php';

//On crée la variable de session id_user
$id_user=$_SESSION['id_user'];

//On crée les variables envoyées en POST par le formulaire de vote 
$id_acteur=$_POST['id_acteur'];
$like=$_POST['like'];

//On vérifie dans la BDD si l'utilisateur a déjà voté à propos de cet acteur
$check_like = $conn->prepare('SELECT vote FROM vote WHERE id_acteur=? AND id_user=?');
$check_like->execute(array($id_acteur,$id_user));

//S'il a déjà voté : on remplace son vote -positif ou négatif- par son vote positif
if($check_like->rowCount() == 1) {  
    $up = "UPDATE Vote SET vote='1' WHERE id_user='$id_user' and id_acteur='$id_acteur'";
    $conn->exec($up);

//S'il n'a pas déjà voté : on insère son vote positif dans la BDD
} else {
    $new_vote="INSERT INTO Vote (id_user, id_acteur, vote) VALUES ('$id_user', '$id_acteur','1')";
    $conn->exec($new_vote);
}

//On redirige vers la page sur laquelle est l'utilisateur
header("location: partners-details.php?id_acteur=".$id_acteur) 
?>