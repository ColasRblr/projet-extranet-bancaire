<?php session_start () ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <body>
    
    <?php

require ('config.php');

//On empêche l'utilisation d'html
$commentaire = htmlspecialchars($_POST['commentaire']); 

//variables utiles
$id_acteur= $_POST['id_acteur'];
$id_user=$_SESSION['id_user'];
$partner_infos=$_POST['partner_infos'];


 if (!empty($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']); 
    $new_com="INSERT INTO Post (id_user, id_acteur, post) VALUES ('$id_user', '$id_acteur','$commentaire')";
  $conn->exec($new_com);}

//renvoi à la page sur laquelle est l'utilisateur (on renvoie un hidden value en Post sur l'id_acteur pour que la page se charge avec les infos de l'acteur)
echo 'Votre commentaire a bien été pris en compte. <br/>';
echo "<form id='back' method='post' action='partners-details.php'>
<input type='hidden' value='$partner_infos' name='partner_infos'>
<input type='hidden' value='$id_acteur' name='id_acteur'>
<button type='submit' name='back'> Retour page précédente </button>
</form>";
?>
</body>
</html>