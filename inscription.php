<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Création compte utilisateur</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>

<form method="post" action='inscription-traitement.php'>
     <div>
       <label for="nom">Nom :</label>
       <input type="text" name="nom" id="nom" required="required"/>
     </div>
     <div>
       <label for="prénom">Prénom :</label>
       <input type="text" name="prenom" id="prenom" required="required" />     
      <div>     
       <label for="username">Identifiant :</label>
       <input type="text" name="username" id="username" required="required" />    
      </div>
      <div>
       <label for="password">Mot de passe :</label>
       <input type="password" name="password" id="password" required="required"/>
      </div>
      <div>
       <label for="reponse"> Quel est le nom de famille de votre professeur d'enfance préféré ? :</label>
       <input type="text" name="reponse" id="reponse" required="required"/>
      </div>
       <button type="submit" >S'inscrire</button>
</form>  
</body>
</html>