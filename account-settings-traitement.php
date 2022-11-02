<?php 
//On maintient l'ouverture de session
session_start() ;

//On inclue la connexion à la BDD
require_once 'config.php'; 
    
//On crée la variable id_user pour identifier ensuite de quel utilisateur on modifie les données personnelles
$id_user=$_SESSION ['id_user'];

//1:Pour modifier le champ utilisateur : on vérifie que le champ est rempli
if (!empty($_POST['username_new'])) {
  //On met à jour les données de l'utilisateur dans la BDD
  $update_username = $conn->prepare("UPDATE account SET username=? WHERE id_user=?");
  $update_username->execute(array(strip_tags($_POST['username_new']),$_SESSION['id_user']));
};

//2:Pour modifier le champ nom, on vérifie que le champ est rempli
if (!empty($_POST['nom_new'])) {           
  //On met à jour les données de l'utilisateur dans la BDD
  $update_nom = $conn->prepare("UPDATE account SET nom=? WHERE id_user=?");
  $update_nom->execute(array(strip_tags($_POST['nom_new']),$_SESSION['id_user']));
};

                
//3:Pour modifier le champ prenom, on vérifie que le champ est rempli
if (!empty($_POST['prenom_new'])) {
  //On met à jour les données de l'utilisateur dans la BDD
  $update_prenom = $conn->prepare("UPDATE account SET prenom=? WHERE id_user=?");
  $update_prenom->execute(array(strip_tags($_POST['prenom_new']),$_SESSION['id_user']));
};

//4:Pour modifier le champ password, on vérifie que le champ est rempli
if (!empty($_POST['password_new'])) {                    
  //On met à jour les données de l'utilisateur dans la BDD
  $update_password = $conn->prepare("UPDATE account SET password=? WHERE id_user=?");
  $update_password->execute(array(password_hash($_POST['password_new'], PASSWORD_DEFAULT),$_SESSION['id_user']));
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