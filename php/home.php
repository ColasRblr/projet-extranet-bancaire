<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Page d'accueil</title>
  <link href="style.css" rel="stylesheet">
</head>

<body>    
  
<h1>Bienvenue sur l'extranet de GBAF</h1>

  <div id="inscription">
   <p>Si vous ne possédez pas encore de compte, veuillez cliquer ci-dessous afin de vous enregistrer pour avoir accès au service proposé par l'extranet</p>
   <a href="inscription.php"> S'inscrire </a> 
  </div> 

  <div id="connexion"> 
    <p>Si vous possédez déjà un compte, connectez-vous ci-dessous afin d'accéder à votre page d'accueil utilisateur</p>
  <?php include 'login.php'; ?>

</div>


  
</body>
</html>