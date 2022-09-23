
<?PHP

require ('config.php');

//On empêche l'utilisation d'html
$nom = htmlspecialchars($_POST['nom']); 
$prenom = htmlspecialchars($_POST['prenom']);
$username = htmlspecialchars($_POST['username']); 
$password = htmlspecialchars($_POST['password']);
$reponse = htmlspecialchars($_POST['reponse']);
        
//on sécurise le mdp
$passwordhash = password_hash ($_POST['password'], PASSWORD_DEFAULT);

  //insérer données du formulaire dans BDD
  $sql = "INSERT INTO `Account` ( `nom`, `prenom`, `username`, `password`, `reponse`)
VALUES( '$_POST[nom]','$_POST[prenom]','$_POST[username]','$passwordhash','$_POST[reponse]')
";
  $conn->exec($sql);

  //message envoyé à l'utilisateur
  echo "Inscription réussie !<br> <a href='home.php'>Retour à la page d'accueil</a>";

?>


