<?php 
//On maintient l'ouverture de session
session_start() ;

//On inclue la connexion à la BDD
require_once 'config.php'; 
    
//On crée la variable id_user pour identifier ensuite de quel utilisateur on modifie les données personnelles
$id_user=$_SESSION ['id_user'];

//1:Pour modifier le champ utilisateur : on vérifie que le champ est rempli
if (!empty($_POST['username_new'])) {
  //Et on sécurise en neutralisant la potentielle entrée de html
  $username_new = strip_tags($_POST['username_new']); 
  //On met à jour les données de l'utilisateur dans la BDD
  $update_username = "UPDATE account SET username='$username_new' WHERE id_user=$id_user";
  $conn->exec($update_username);
};
                
//2:Pour modifier le champ nom, on vérifie que le champ est rempli
if (!empty($_POST['nom_new'])) {
  //Et on sécurise en neutralisant la potentielle entrée de html
  $nom_new = strip_tags($_POST['nom_new']);                    
  //On met à jour les données de l'utilisateur dans la BDD
  $update_nom = "UPDATE Account SET nom='$nom_new' WHERE id_user=$id_user";
  $conn->exec($update_nom);
};

                
//3:Pour modifier le champ prenom, on vérifie que le champ est rempli
if (!empty($_POST['prenom_new'])) {
  //Et on sécurise en neutralisant la potentielle entrée de html
  $prenom_new = strip_tags($_POST['prenom_new']);
  //On met à jour les données de l'utilisateur dans la BDD
  $update_prenom = "UPDATE Account SET prenom='$prenom_new' WHERE id_user=$id_user";
  $conn -> exec($update_prenom);
};

//4:Pour modifier le champ password, on vérifie que le champ est rempli
if (!empty($_POST['password_new'])) {
  //Et on sécurise en neutralisant la potentielle entrée de html
  $password_new = strip_tags($_POST['password_new']);               
  //On autorise la modification du password dans la BDD en sécurisant avec un hash
  $password_new_hash = password_hash ($_POST['password_new'], PASSWORD_DEFAULT);                     
  //On met à jour les données de l'utilisateur dans la BDD
  $update_password = "UPDATE Account SET password='$password_new_hash' WHERE id_user=$id_user";
  $conn->exec($update_password);
};
?>

<!doctype html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Paramètres du compte</title>
      <link href="css/formulaire.css" rel="stylesheet"> 
    </head>

  <body>
    <div> Vos informations ont été modifiées ! 
      <br> Vous pouvez vous rendre sur la <a href='user-connected.php'> page d'accueil de votre compte </a> 
    </div>
  </body>
</html>