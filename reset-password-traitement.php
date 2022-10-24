
            <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Paramètres du compte</title>
  <link href="css/formulaire.css" rel="stylesheet">
  <body>
  
  <?php

  //On inclue la connexion à la BDD
  require_once 'config.php'; 
    
  // On vérifie que les champs Username, Reponse et Password ne soient pas vides
   if (!empty($_POST['username']) && !empty($_POST['reponse']) && !empty($_POST['password'])) {

      // Et on sécurise en neutralisant la potentielle entrée de html
      $username = strip_tags($_POST['username']); 
      $reponse = strip_tags($_POST['reponse']);
      $password = strip_tags($_POST['password']);
      
      // On regarde si l'utilisateur est inscrit dans la table Account
      $check = $conn->prepare('SELECT username reponse FROM Account WHERE username=?');
      $check->execute(array($username));
      $data = $check->fetch();
      $row = $check->rowCount();
    
      
     // Si > à 0 alors l'utilisateur est présent dans la table account
         if($row > 0) {
              // Si la réponse est la bonne
              if($reponse === $data['reponse']) {
                 // On autorise la modification du mot de passe dans la BDD en le sécurisant
                $passwordhash = password_hash ($_POST['password'], PASSWORD_DEFAULT);
                
                 // On insère les données du formulaire dans la BDD
                $update = "UPDATE Account SET password='$passwordhash'WHERE username='$username'";
                $conn->exec($update);

               echo "Votre mot de passe est modifié ! <br> Vous pouvez vous rendre sur la <a href='home.php'> page d'accueil </a> pour vous connecter";
              } else {
                 echo "Vous n'avez pas répondu correctement à la question secrète<br><a href='reset-password.php'> Essayez à nouveau </a>"; 
                     }
         } else { 
                echo "Utilisateur non reconnu <br><a href='reset-password.php'> Essayez à nouveau </a>";
            }
   }
            ?>

            </body>
            </html>
 