<?php session_start() ?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Paramètres du compte</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
  ...
 <p>Bienvenue dans votre page de paramètres personnels </p>

<p>>Vous pouvez modifier ci-dessous vos informations personnelles</p>

 <form method="post" action="account-settings-traitement.php">

       <label for="username_new">Nom d'utilisateur :</label>
       <input type="text" name="username_new" id="username_new"/>
       
       <br/>
       <label for="nom_new">Nom:</label>
       <input type="text" name="nom_new" id="nom_new"/>

       <br/>
       <label for="prenom_new">Prenom:</label>
       <input type="text" name="prenom_new" id="prenom_new"/>

       <br/>
       <label for="password_new">Mot de passe :</label>
       <input type="password" name="password_new" id="password_new"/>

       <br/>
      <button id="login-btn" type="submit" name="username-modif">Enregistrer mes modifications</button>
</form>
</body>
</html>