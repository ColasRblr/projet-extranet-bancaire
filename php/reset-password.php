<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Réinitialisation mot de passe</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>

<form method="post" action="reset-password-traitement.php">

       <label for="username">Nom d'utilisateur :</label>
       <input type="text" name="username" id="username" required="required"/>
       
       <br />
       <label for="reponse"> Répondez à la question secrète suivante : <br /> "Quel est le nom de famille de votre professeur d'enfance préféré ?" :</label>
       <input type="text" name="reponse" id="reponse" required="required"/>
       
       <br />
       <label for="password">Nouveau mot de passe :</label>
       <input type="password" name="password" id="password" required="required"/>

       <br/>
      <button id="login-btn" type="submit" name="connexion">Enregistrer mon nouveau mot de passe</button>
</form>

  ...
</body>
</html>