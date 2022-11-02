<?php
//On maintient l'ouverture de session
session_start () ;

//On inclue la connexion à la BDD
require ('config.php');

//On crée la variable id_acteur pour la redirection
$id_acteur= $_POST['id_acteur'];

//On insère le commentaire de l'utilisateur dans la BDD
 if (!empty($_POST['commentaire'])) {
    $new_com = $conn->prepare("INSERT INTO Post (id_user, id_acteur, post) VALUES (?,?,?)");
    $new_com->execute(array($_SESSION['id_user'], $_POST['id_acteur']), htmlspecialchars($_POST['commentaire'])));
 }

//On renvoie à la page sur laquelle est l'utilisateur 
header("location: partners-details.php?id_acteur=".$id_acteur)
?>
