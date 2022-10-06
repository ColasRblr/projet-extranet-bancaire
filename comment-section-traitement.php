<?php session_start () ?>
<?php

require ('config.php');

//On empêche l'utilisation d'html
$commentaire = htmlspecialchars($_POST['commentaire']); 
$id_acteur= $_POST['id_acteur'];
$id_user=$_SESSION['id_user'];


  if (!empty($_POST['commentaire'])) {
    $commentaire = htmlspecialchars($_POST['commentaire']); 
    $new_com="INSERT INTO Post (id_user, id_acteur, post) VALUES ((SELECT id_user from Account WHERE id_user=$id_user),(SELECT id_acteur FROM Acteur WHERE id_acteur=$id_acteur),'$commentaire')";
  $conn->exec($new_com);}

echo 'Votre commentaire a bien été ajouté';

?>
