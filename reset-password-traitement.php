<link href="css/formulaire.css" rel="stylesheet">

<?php
//On inclue la connexion à la BDD
require_once 'config.php'; 
    
//On vérifie que les champs Username, Reponse et Password ne soient pas vides
if (!empty($_POST['username']) && !empty($_POST['reponse']) && !empty($_POST['password'])) {
   
   // Et on sécurise en neutralisant la potentielle entrée de html, en créant les variables
   $username = strip_tags($_POST['username']); 
   $reponse = strip_tags($_POST['reponse']);
   $password = strip_tags($_POST['password']);
   
   //On convertit la liste déroulante d'array à string, pour intégrer le choix de l'utilisateur dans la BDD
   $question = implode([$_POST['question']]);
      
   // On regarde si l'utilisateur est inscrit dans la table Account
   $check = $conn->prepare('SELECT username, reponse, question FROM Account WHERE username=?');
   $check->execute(array($username));
   $data = $check->fetch();
   $row = $check->rowCount(); 
      
   // Si > à 0 alors l'utilisateur est présent dans la table account
   if($row > 0) {

      //On vérifie que la question sélectionnée soit la même que lors de l'inscription
      if($question === $data['question']){

         // On vérifie que la réponse soit la bonne
         if($reponse === $data['reponse']) {

             // On autorise la modification du mot de passe dans la BDD en le sécurisant
            $passwordhash = password_hash ($_POST['password'], PASSWORD_DEFAULT);
            // Puis on met à jour la BDD en insérant le nouveau mot de passe
            $update = "UPDATE Account SET password='$passwordhash'WHERE username='$username'";
            $conn->exec($update);
            //On envoie un message de réussite à l'utilisateur
            echo "Votre mot de passe est modifié ! <br> Vous pouvez vous rendre sur la <a href='home.php'> page d'accueil </a> pour vous connecter";

         //Si la réponse n'est pas la bonne : envoi d'un message d'erreur
         } else {
            echo "Vous n'avez pas répondu correctement à la question secrète<br><a href='reset-password.php'> Essayez à nouveau </a>"; 
                }
      //Si la question ne correspond pas : envoi d'un message d'erreur
      } else { 
         echo "Vous aviez choisi une autre question secrète lors de votre inscription<br><a href='reset-password.php'> Essayez à nouveau </a>";
             }
   //Si < 0, alors l'utilisateur n'est pas présent dans la BDD : envoi d'un message d'erreur
   } else { 
      echo "Utilisateur non reconnu <br><a href='reset-password.php'> Essayez à nouveau </a>";
          }
  }
 ?>