<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>header</title>
  <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css"/>

  <link href="css/extensions.css" rel="stylesheet">
  
</head>
<body>

<?php

//si le header est présent sur une page connectée...
if (isset ($_SESSION['id_user'])) { 
  
  //on récupère le nom et prénom de l'utilisateur sur la BDD grâce à l'id_user stocké dans la variable de session
include 'config.php';
$requete = $conn->prepare('SELECT nom, prenom FROM account WHERE id_user = :id_user');
$requete->execute(array('id_user'=>$_SESSION['id_user']));
$resultat = $requete->fetch();

?>
<div class="header-connecte">

   <div class="left"> <img class="logo" src="img/GBAF-removed.png" alt="Logo du GBAF" > </div>
   
<div class="param">

<div class="user">
<img class="logo-user"src="img/logo-user.png">
<div id="user-name">
   <?php echo '&nbsp'; echo $resultat['nom'];echo '&nbsp'; echo $resultat['prenom']; ?></div></div>

  <div id="boutons"><?php echo "<br/><button class='btn-header' onclick='window.location.href = `account-settings.php`'> Paramètres du compte</button>"; ?>
 <?php echo "<br/><button class='btn-header' onclick='window.location.href = `deconnexion.php`'> Se déconnecter</button>";?> </div>
</div>

</div>  
 
  <?php 
  } 
  //si le header est présent sur une page non connectée, on affiche un header neutre avec un simple message d'accueil
  else { ?>

<div class="header-non-connecte">
 <div class="logo">
  <img src="img/GBAF-removed.png" alt="logo du GBAF"> </div>

  </div>
  
<?php } ?>
  
</body>
</html>