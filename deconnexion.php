<?php   
//On maintient l'ouverture de session (pour l'identifier)
session_start();

//On ferme la session
session_destroy();

//On redirige vers la page d'accueil du site
header ('location: home.php');
?>
