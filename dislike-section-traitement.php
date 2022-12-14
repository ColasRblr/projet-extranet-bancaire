<?php 
//On maintient l'ouverture de session
session_start();

//On inclue la connexion à la BDD
include 'config.php';

//On crée la variable id_acteur pour la redirection
$id_acteur=$_POST['id_acteur'];

//On vérifie dans la BDD si l'utilisateur a déjà voté à propos de cet acteur
$check_like = $conn->prepare('SELECT vote FROM vote WHERE id_acteur=? AND id_user=?');
$check_like->execute(array($_POST['id_acteur'],$_SESSION['id_user']));

//S'il a déjà voté : on remplace son vote -positif ou négatif- par son vote négatif
if($check_like->rowCount() == 1) {  
    $up = $conn->prepare("UPDATE Vote SET vote=? WHERE id_user=? and id_acteur=?");
    $up->execute(array($_POST['dislike'], $_SESSION['id_user'], $_POST['id_acteur']));

//S'il n'a pas déjà voté : on insère son vote négatif dans la BDD
} else {
    $new_vote = $conn->prepare("INSERT INTO Vote (id_user, id_acteur, vote) VALUES (?, ?, ?)");
    $new_vote->execute(array($_SESSION['id_user'], $_POST['id_acteur'], $_POST['dislike']));
}

//On redirige vers la page sur laquelle est l'utilisateur
header("location: partners-details.php?id_acteur=".$id_acteur)
    ?>