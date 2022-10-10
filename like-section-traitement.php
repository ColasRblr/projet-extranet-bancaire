<?php session_start () ?>
    <?php
//variables à utiliser plus bas
$id_acteur=$_POST['id_acteur'];
$id_user=$_SESSION['id_user'];
$partner_infos=$_POST['partner_infos'];
//variable unique bouton radio : soit 1 soit -1
$vote=$_POST['vote'];

include 'config.php';

//test envoi valeur like ou dislike avec bouton radio à la BDD
if (isset($_POST['submit_vote'])){
    $vote=$_POST['vote'];
    $new_vote="INSERT INTO Vote (id_user, id_acteur, vote) VALUES ('$id_user', '$id_acteur','$vote')";
    $conn->exec($new_vote);}


//renvoi à la page sur laquelle est l'utilisateur (on renvoie un hidden value en Post sur l'id_acteur pour que la page se charge avec les infos de l'acteur)
echo 'Votre vote a bien été pris en compte. <br/>';
echo "<form id='back' method='post' action='partners-details.php'>
<input type='hidden' value='$partner_infos' name='partner_infos'>
<input type='hidden' value='$id_acteur' name='id_acteur'>
<button type='submit' name='back'> Retour page précédente </button>
</form>";
?>