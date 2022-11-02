<!doctype html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Réinitialisation mot de passe</title>
      <link href="css/formulaire.css" rel="stylesheet">
    </head>

    <body>
      <div class="formulaire">
        <div class="img">
          <img id="logo" src="img/GBAF-removed.png" alt="logo du GBAF">
        </div>
        <form class="form" method="post" action="reset-password-traitement.php">
          <input type="text"  placeholder="Identifiant" class="text" name="username" id="username" required="required">
          <label for="question-select"> Quelle était la question secrète de votre choix ? </label> 
            <select name="question" id="question-select">
              <option value="g-m">Quel est le prénom de votre grand-mère maternelle ?</option>
              <option value="animal">Quel est le nom de votre premier animal de compagnie ?</option>
              <option value="adresse">Quel est le nom de la rue où vous avez grandi ?</option>
            </select>
          <input type="text" placeholder="Réponse" class="text"  name="reponse" id="reponse" required="required">     
          <input type="password" placeholder="Nouveau mot de passe" name="password" id="password" required="required">
          <button id="login-btn" type="submit" name="connexion">Enregistrer mon nouveau mot de passe</button>
          <button id="retour" onclick="window.location.href='index.php'">Retour</button>
        </form>
      </div>
    </body>
</html>