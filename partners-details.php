<?php

//On maintient l'ouverture de session
session_start () ;

//On inclue la connexion PDO à la BDD
include 'config.php';

//On crée les variables dont on a besoin : id_acteur et id_user
$id_acteur = $_POST['id_acteur'] = $_REQUEST['id_acteur'];
$id_user=$_SESSION['id_user'];

//On crée les variables like et dislike
$like=1;
$dislike=-1;

//On va chercher les infos sur l'acteur dans la BDD pour ensuite les afficher
$sql= $conn->prepare("SELECT acteur, description,logo, id_acteur FROM acteur WHERE id_acteur=?");
$sql->execute(array($_REQUEST['id_acteur']));
$res= $sql->fetch();
?>

<!doctype html>
  <html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Partenaires bancaires</title>
      <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css">
      <link href="css/details.css" rel="stylesheet">
      <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css">
      <link href="css/extensions.css" rel="stylesheet">
  
    </head>

  <body>

  <?php 
   //On sécurise l'accès aux données seulement si utilisateur connecté, sinon on redirige vers index.php
   if (isset ($_SESSION['id_user'])) {
  ?>
  <?php 
    //On inclue le header
    include 'extensions/header.php';
  ?>
    <div class="page">
      
      <div class="partner">
        <div id='logo'> 
          <?php echo '<img src="data:image/jpeg;base64,'. base64_encode($res['logo']) .'" width=150 alt="logo du partenaire">'; ?>
        </div>
        <h2><?php echo $res['acteur'] ;?></h2>
        <div class="description"> 
          <p><?php echo $res['description'];?></p>
        </div>
      </div>

<?php
//On va chercher si l'utilisateur connecté a déjà voté (nécessaire??)
$check = $conn->prepare("SELECT id_user FROM vote WHERE id_acteur=? AND id_user=?");
$check->execute(array($_POST['id_acteur'], $_SESSION['id_user']));
$vote_user = $check -> fetch();

//On va chercher combien de like, dislike et commentaires compte cet acteur
$numberlike = $conn->prepare("SELECT COUNT(*) FROM vote WHERE vote = ? AND id_acteur=?");
$numberlike->execute(array($like, $_REQUEST['id_acteur']));
$number_like = $numberlike->fetchColumn();

$numberdislike = $conn->prepare("SELECT COUNT(*) FROM vote WHERE vote = ? AND id_acteur=?");
$numberdislike->execute(array($dislike, $_REQUEST['id_acteur']));
$number_dislike = $numberdislike->fetchColumn();

$numbercomm = $conn->prepare("SELECT COUNT(*) FROM post WHERE id_acteur=?");
$numbercomm->execute(array($_REQUEST['id_acteur']));
$number_comm = $numbercomm->fetchColumn();

//On va chercher les commentaires de cet acteur pour ensuite les afficher
$sql1= $conn->prepare("SELECT * FROM Post INNER JOIN Account ON account.id_user = post.id_user WHERE post.id_acteur=? ORDER BY id_post DESC");
$sql1->execute(array($_REQUEST['id_acteur']));
$commentaires=$sql1->fetchAll(); 

//On va chercher si l'utilisateur connecté a déjà posté un commentaire sur cet acteur
$check1 = $conn->prepare("SELECT id_user FROM post WHERE id_acteur=? AND id_user=?");
$check1->execute(array($_REQUEST['id_acteur'], $_SESSION['id_user']));
$comment_user = $check1 -> fetch();

//S'il n'a pas déjà commenté : on lui affiche le formulaire de commentaire?>
  <div class="commentaire"> 
    <div id="com-vote">
      <h2 id="titre-com"><?= $number_comm ?> Commentaire(s):</h2>
        <div id="comm">
          <?php if (isset ($comment_user['id_user'])) {
          echo'Vous avez déjà posté un commentaire';
          } else {
            echo"
              <form method='post' action='comment-section-traitement.php'>
              <label for='commentaire'>Nouveau commentaire:</label>
              <input type='text' name='commentaire' id='commentaire' required='required'>
              <input type='hidden' value='$id_acteur' name='id_acteur'>
              <button type='submit'> Envoyer </button>
              </form>";
          }?>
        </div> 
        <div id="vote">
          <div id="vote-content">
            <div id="number_like">
              <?= $number_like ?>
            </div>
          <form method='post' action='like-section-traitement.php'>
            <input type='hidden' value='<?= $id_acteur?>' name='id_acteur'>
            <input type='hidden' value='<?=$like?>' name='like'>
            <button type='submit'> <img class="pouce" src="img/pouce-haut.png" alt="pouce vers le haut"></button>
          </form>
          <form method='post' action='dislike-section-traitement.php'>
            <input type='hidden' value='<?=$id_acteur?>' name='id_acteur'>
            <input type='hidden' value='<?=$dislike?>' name='dislike'>
            <button type='submit'><img class="pouce" src="img/pouce-bas.png" alt="pouce vers le bas"> </button>
          </form>
          <div id="number_dislike"> 
            <?= $number_dislike ?>
          </div> 
        </div>
      </div>
    </div>

    <?php
    //on affiche tous les commentaires concernant ce partenaire avec les infos de prénom (id_user pour l'instant) et date
    foreach ($commentaires as $commentaire): 
    $date= date_create ($commentaire['date_add']);
    ?>
      <div class="affich-com">
        <div class="prenom">
          <?php echo $commentaire['prenom'];?>
        </div>
        <div class="date">
          <?php echo date_format($date,"d-m-Y");?>
        </div>
        <div class="com">
          <?php echo $commentaire ['post'];?> 
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div> 

  <?php } else {
    header('Location:index.php');
  }
  ?>
  <?php include 'extensions/footer.php'; ?>
</body>
</html>