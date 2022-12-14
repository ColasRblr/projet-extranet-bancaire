<link href="css/formulaire.css" rel="stylesheet">

<?php 
//On inclue la connexion à la BDD
require_once 'config.php'; 

//On vérifie que les champs Username et Password ne soient pas vides
if (!empty($_POST['username']) && !empty($_POST['password'])) {
  
   // On regarde si l'utilisateur est inscrit dans la table Account
   $check = $conn->prepare('SELECT * FROM Account WHERE username =?');
   $check->execute(array(strip_tags($_POST['username'])));
   $data = $check->fetch();
   $row = $check->rowCount();
        
   // Si > à 0 alors l'utilisateur existe
   if($row > 0) {
      // On vérifie ensuite que le mot de passe est le bon
      if(password_verify(strip_tags($_POST['password']), $data['password'])) {
         //Si c'est bon, on ouvre la session et on crée les variables de session
         session_start();
         $_SESSION['id_user'] = $data['id_user'];
         $_SESSION['username'] = $data['username'];
         $_SESSION['nom'] = $data['nom'];
         $_SESSION['prenom'] = $data['prenom'];
         //Puis on redirige vers user-connected.php
         header('location: user-connected.php');
         die();
      //Si mauvais mot de passe : message à l'utilisateur
      } else { 
         echo "Mot de passe invalide <br/> <a href='login.php'>Retour au formulaire de connexion</a>"; 
            }
   //Si < 0 : alors l'utilisateur n'est pas présent dans la BDD
   } else {
      echo "Utilisateur non reconnu <br/> <a href='login.php'>Retour au formulaire de connexion</a>";
         }
 }
?>