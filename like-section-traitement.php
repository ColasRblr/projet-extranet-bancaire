<?php session_start () ?>

    <?php

//variables à utiliser plus bas
$id_user=$_SESSION['id_user'];
$id_acteur=$_POST['id_acteur'];
$like=$_POST['like'];

//variable unique bouton radio : soit 1 soit -1
//$vote=$_POST['vote'];

include 'config.php';

//test envoi valeur like ou dislike avec bouton radio à la BDD
//if (isset($_POST['submit_vote'])) {
   // $vote=$_POST['vote'];
    //$new_vote="INSERT INTO Vote (id_user, id_acteur, vote) VALUES ('$id_user', '$id_acteur','$vote')";
    //$conn->exec($new_vote);
//}

//renvoi à la page sur laquelle est l'utilisateur (on renvoie un hidden value en Post sur l'id_acteur pour que la page se charge avec les infos de l'acteur)
//echo 'Votre vote a bien été pris en compte. <br/>';
//echo "<form id='back' method='post' action='partners-details.php'>
//<input type='hidden' value='$titre_article' name='titre-details'>
//<input type='hidden' value='$img_article'name='img-details'>
//<input type='hidden' value='$description_article' name='description-details'>
//<input type='hidden' value='$id_acteur' name='id_acteur'>
//<button type='submit' name='back'> Retour page précédente </button>
//</form>";


        $check_like = $conn->prepare('SELECT vote FROM vote WHERE id_acteur= ? AND id_user=?');
        $check_like->execute(array($id_acteur,$id_user));

  
        if($check_like->rowCount() == 1) {
           
            $up = "UPDATE Vote SET vote='1' WHERE id_user='$id_user' and id_acteur='$id_acteur'";
            $conn->exec($up);

        }else {
        $new_vote="INSERT INTO Vote (id_user, id_acteur, vote) VALUES ('$id_user', '$id_acteur','1')";
        $conn->exec($new_vote);
        }

        header("location: partners-details.php?id_acteur=".$id_acteur)
 

?>