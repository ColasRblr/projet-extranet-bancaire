<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Page d'accueil</title>
  <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css"/>
  <link href="css/home.css" rel="stylesheet">
</head>
 
<body>

<header>
 <?php include 'extensions/header.php'; ?>
</header>

<div class="page">

 <h1>Bienvenue sur l'extranet de GBAF</h1>

<section id="home">

   <div id="inscription">
    <p>Si vous ne possédez pas encore de compte, veuillez cliquer ci-dessous afin de vous enregistrer pour avoir accès au service proposé par l'extranet</p>
    <a href="inscription.php"> S'inscrire </a> 
   </div> 

   <div id="connexion"> 
    <p>Si vous possédez déjà un compte, connectez-vous ci-dessous afin d'accéder à votre page d'accueil utilisateur</p>
    <a href="login.php"> Se connecter </a> 
   <button id="reset"onclick="window.location.href = 'reset-password.php'"> J'ai oublié mon mot de passe</button>
</div>
<div class="divider"> </div>
</section>
</div>
</body>

 <?php include 'extensions/footer.php'; ?>

</html>
 