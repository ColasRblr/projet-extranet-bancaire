  
            <!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Paramètres du compte</title>
  <link href="css/formulaire.css" rel="stylesheet">
  <body>
  
  <?php

require ('config.php');

//On empêche l'utilisation d'html
$nom = htmlspecialchars($_POST['nom']); 
$prenom = htmlspecialchars($_POST['prenom']);
$username = htmlspecialchars($_POST['username']); 
$password = htmlspecialchars($_POST['password']);
$reponse = htmlspecialchars($_POST['reponse']);
        
//on sécurise le mdp
$passwordhash = password_hash ($_POST['password'], PASSWORD_DEFAULT);

//on vérifie que les valeurs entrées ne soient pas déjà dans la BDD

$check = "SELECT nom, prenom, username FROM Account WHERE username='$username'";
$requete=$conn->query($check);
$compte_user = $requete -> fetchAll();

if($username= $compte_user){
  echo "Ce pseudo est déjà utilisé <br/>  <a href='inscription.php'>Retour au formulaire d'inscription</a<";
}

else{ //insérer données du formulaire dans BDD
  $sql = "INSERT INTO `account` ( `nom`, `prenom`, `username`, `password`, `reponse`)
VALUES( '$_POST[nom]','$_POST[prenom]','$_POST[username]','$passwordhash','$_POST[reponse]')
";
  $conn->exec($sql);

        echo "<div> Inscription réussie !<br> <a href='home.php'>Retour à la page d'accueil</a</div>";}
            ?> 
              

</body>
</html>
