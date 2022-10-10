<?php 
    //On inclue la connexion à la BDD
    require_once 'config.php'; 
    
    // On vérifie que les champs Username et Password ne soient pas vides
     if(!empty($_POST['username']) && !empty($_POST['password'])) 

        // Et on sécurise en neutralisant la potentielle entrée de html
        $username = strip_tags($_POST['username']); 
        $password = strip_tags($_POST['password']);
        
        // On regarde si l'utilisateur est inscrit dans la table Account
        $check = $conn->prepare('SELECT username, password, id_user FROM Account WHERE username=?');
        $check->execute(array($username));
        $data = $check->fetch();
        $row = $check->rowCount();
        
       // Si > à 0 alors l'utilisateur existe
           if($row > 0) 
        {
                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                   // On ouvre la session, on crée les variables de session, et on redirige sur user-connected.php
                   session_name('SESSION1');
                   session_start ();
                   $_SESSION ['id_user'] = $data['id_user'];
                   header('location: user-connected.php');
                   die();
               }else{ echo "Mot de passe invalide"; }}
               else {echo "Utilisateur non reconnu";}
?>