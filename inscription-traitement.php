<link href="css/formulaire.css" rel="stylesheet">

<?php
//On inclue la connexion à la BDD
require ('config.php');

//On empêche l'utilisation d'html en créant les variables envoyées via le formulaire d'inscription
$nom = htmlspecialchars($_POST['nom']); 
$prenom = htmlspecialchars($_POST['prenom']);
$username = htmlspecialchars($_POST['username']); 
$password = htmlspecialchars($_POST['password']);
$reponse = htmlspecialchars($_POST['reponse']);

//On convertit la liste déroulante d'array à string, pour intégrer le choix de l'utilisateur dans la BDD
$question = implode([$_POST['question']]);  

//On sécurise le mdp
$passwordhash = password_hash ($_POST['password'], PASSWORD_DEFAULT);

//On vérifie que les valeurs entrées ne soient pas déjà dans la BDD
$check = "SELECT nom, prenom, username FROM Account WHERE username='$username'";
$requete=$conn->query($check);
$compte_user = $requete -> fetchAll();

//Si l'identifiant existe déjà, on le signale à l'utilisateur pour qu'il en choisisse un autre
if($username= $compte_user){
  echo "Ce pseudo est déjà utilisé <br/>  <a href='inscription.php'>Retour au formulaire d'inscription</a>";
//Si l'identifiant n'existe pas, on autorise l'utilisateur à s'inscrire en insérant ses données dans la BDD
} else {
  $sql = "INSERT INTO `account` ( `nom`, `prenom`, `username`, `password`, `question`,`reponse`) 
  VALUES( '$_POST[nom]','$_POST[prenom]','$_POST[username]','$passwordhash', '$question', '$_POST[reponse]')
  ";
  $conn->exec($sql);

//On envoie ensuite un message de réussite à l'utilisateur 
echo "<div> Inscription réussie !<br> <a href='home.php'>Retour à la page d'accueil</a</div>";}
?>
  