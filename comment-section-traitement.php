<?php session_start () ;


require ('config.php');

//On empêche l'utilisation d'html
$commentaire = htmlspecialchars($_POST['commentaire']); 

//variables utiles
$id_acteur= $_POST['id_acteur'];
$id_user=$_SESSION['id_user'];


 if (!empty($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']); 
    $new_com = "INSERT INTO Post (id_user, id_acteur, post) VALUES ('$id_user', '$id_acteur','$commentaire')";
  $conn->exec($new_com);
 }

//renvoi à la page sur laquelle est l'utilisateur 
header("location: partners-details.php?id_acteur=".$id_acteur)
?>
