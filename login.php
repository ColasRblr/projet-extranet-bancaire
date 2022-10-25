<!doctype html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Connexion</title>
      <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css"/>
      <link href="css/formulaire.css" rel="stylesheet">
    </head>

  <body>
    <div class="formulaire">
      <div class="img">
        <img id="logo" src="img/GBAF-removed.png" alt="logo du GBAF">
      </div>
      <form class="form" method="post" action="login-traitement.php">
        <input type="text" class="text" placeholder="Identifiant" name="username" id="username" required="required"/>
        <input type="password" placeholder= "Mot de passe" name="password" id="password" required="required" />
        <button id="login-btn" type="submit" name="connexion">Connexion</button>
        <button id="retour" onclick="window.location.href='home.php'">Retour</button>
      </form>
    </div>
  </body>
</html>