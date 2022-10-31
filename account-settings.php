<?php 

//On maintient l'ouverture de session
session_start()  ;

//On inclue la connexion PDO à la BDD
include 'config.php';

//on crée la variable $id_user
$id_user = $_SESSION['id_user'];

//on va chercher les informations du user connecté dans la BDD
$check = $conn->prepare('SELECT * FROM Account WHERE id_user=?');
$check->execute(array($id_user));
$data = $check->fetch();
?>
  
<!doctype html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <title>Paramètres du compte</title>
      <link href="css/formulaire.css" rel="stylesheet">
    </head>

  <body>

  <?php 
   //On sécurise l'accès aux données seulement si utilisateur connecté, sinon on redirige vers home.php
   if (isset ($_SESSION['id_user'])) {
  ?>

    <div class="formulaire">
      <div class="img">
        <img id="logo" src="img/GBAF-removed.png" alt="logo du GBAF">
      </div>
      <form class="form" method="post" action="account-settings-traitement.php">
        <label for="username_new">Identifiant</label>
        <input type="text" name="username_new" value="<?php echo $data['username']?>" id="username_new"/>
       
        <label for="nom_new">Nom</label>
        <input type="text"  name="nom_new" value="<?php echo $data['nom']?>" id="nom_new"/>

        <label for="prenom_new">Prénom</label>
        <input type="text" name="prenom_new" value="<?php echo $data['prenom']?>" id="prenom_new"/>

        <label for="password_new">Mot de passe </label>
        <input type="password" name="password_new" id="password_new"/>

        <button id="login-btn" type="submit" name="username-modif">Enregistrer mes modifications</button>
      </form>
        <div class="bouton-retour"> <button id="retour" onclick="window.location.href='user-connected.php'"> Retour </button> </div>
    </div>

    <?php } else {
    header('Location:home.php');
  }
  ?>

  </body>
</html>