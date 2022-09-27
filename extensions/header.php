<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>header</title>
  
  <link href="style.css" rel="stylesheet">
  
</head>
<body>

<?php


//si le header est présent sur une page connectée...
if (isset ($_SESSION['id_user'])) 
{ //on récupère le nom et prénom de l'utilisateur sur la BDD grâce à l'id_user stocké dans la variable de session
include 'config.php';
$requete = $conn->prepare('SELECT nom, prenom FROM account WHERE id_user = :id_user');
$requete->execute(array('id_user'=>$_SESSION['id_user']));
$resultat = $requete->fetch();

//... on affiche le nom et prénom, le bouton déconnexion et le bouton paramètres du compte
   
   echo $resultat['nom']; 
   echo "<br/>";
   echo $resultat['prenom'];
   echo "<br/><button onclick='window.location.href = `deconnexion.php`'> Se déconnecter</button>";
   echo "<br/><button onclick='window.location.href = `account-settings.php`'> Paramètres du compte</button>";
  }
   
  //si le header est présent sur une page non connectée, on affiche un header neutre avec un simple message d'accueil
else {

echo ("Header non connecté");

}
?> 

</body>
</html>