<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Connexion</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
<form method="post" action="login-traitement.php">

       <label for="username">Nom d'utilisateur :</label>
       <input type="text" name="username" id="username" required="required"/>
       
       <br />
       <label for="password">Mot de passe :</label>
       <input type="password" name="password" id="password" required="required" />
       
       <br/>
      <button id="login-btn" type="submit" name="connexion">Connexion</button>
</form>

<div> 
<button onclick="window.location.href = 'reset-password.php'"> J'ai oublié mon mot de passe</button>
 </div>
 
</body>
</html>