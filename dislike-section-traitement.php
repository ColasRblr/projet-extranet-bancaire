<?php session_start();

include 'config.php';
$id_user=$_SESSION['id_user'];
$id_acteur=$_POST['id_acteur'];
$like=$_POST['dislike'];

        $check_like = $conn->prepare('SELECT vote FROM vote WHERE id_acteur= ? AND id_user=?');
        $check_like->execute(array($id_acteur,$id_user));
  
        if($check_like->rowCount() == 1) {  
        
            $up = "UPDATE Vote SET vote='-1' WHERE id_user='$id_user' and id_acteur='$id_acteur'";
            $conn->exec($up);
         } else{

        $new_vote="INSERT INTO Vote (id_user, id_acteur, vote) VALUES ('$id_user', '$id_acteur','-1')";
        $conn->exec($new_vote);
         }
         header("location: partners-details.php?id_acteur=".$id_acteur)

    ?>