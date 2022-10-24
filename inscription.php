<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Création compte utilisateur</title>
  <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css"/>
  <link href="css/formulaire.css" rel="stylesheet">
  
</head>
<body>

<div class="formulaire">

  <div class="img">
   <img id="logo" src="img/GBAF-removed.png" alt="logo du GBAF"> 
  </div>

<form class="form" method="post" action='inscription-traitement.php'>

       <input type="text"  class="text"  placeholder="Nom" name="nom" id="nom" required="required"/>
      
       <input type="text" class="text"  placeholder="Prénom" name="prenom" id="prenom" required="required" />     
       
       <input type="text" class="text"  placeholder="Identifiant" name="username" id="username" required="required" />    
    
       <input type="password" placeholder="Mot de passe"  name="password" id="password" required="required"/>
      
       <label for="question-select">Choisissez votre question secrète</label>

      <select name="question" id="question-select">
    <option value="g-m">Quel est le prénom de votre grand-mère maternelle ?</option>
    <option value="animal">Quel est le nom de votre premier animal de compagnie ?</option>
    <option value="adresse">Quel est le nom de la rue où vous avez grandi ?</option>
</select>
       <input type="text"  class="text" placeholder="Réponse" name="reponse" id="reponse" required="required"/>

       <button type="submit" >S'inscrire</button>
    
       <button id="retour" onclick="window.location.href='home.php'"> Retour </button>
      
</form>  

</div>

</body>

</html>