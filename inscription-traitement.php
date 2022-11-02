<link href="css/formulaire.css" rel="stylesheet">

<?php
//On inclue la connexion à la BDD
require ('config.php');

//On vérifie que les valeurs entrées ne soient pas déjà dans la BDD
$check = $conn->prepare("SELECT nom, prenom, username FROM Account WHERE username=?");
$check->execute(array($_POST['username']));
$compte_user = $check-> fetchAll();

//Si l'identifiant existe déjà, on le signale à l'utilisateur pour qu'il en choisisse un autre
if($_POST['username']== $compte_user){
  echo "Ce pseudo est déjà utilisé <br/>  <a href='inscription.php'>Retour au formulaire d'inscription</a>";
 
//Si l'identifiant n'existe pas, on autorise l'utilisateur à s'inscrire en insérant ses données dans la BDD
} else { 
  $sql = $conn->prepare('INSERT INTO Account (nom, prenom, username, password, question, reponse) VALUES (?, ?, ?, ?, ?, ?)');
  $sql->execute(array(strip_tags($_POST['nom']), strip_tags($_POST['prenom']), strip_tags($_POST['username']), password_hash($_POST['password'], PASSWORD_DEFAULT), implode([$_POST['question']]), strip_tags($_POST['reponse'])));

//On envoie ensuite un message de réussite à l'utilisateur 
echo "<div> Inscription réussie !<br> <a href='index.php'>Retour à la page d'accueil</a</div>";
}
?>
  
