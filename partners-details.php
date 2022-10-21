<?php session_start () ;

//on inclut le header
include 'extensions/header.php';

//on inclue les infos de connexion à la bdd
include 'config.php';

//on crée les variables dont on a besoin
$id_acteur = $_POST['id_acteur'] = $_REQUEST['id_acteur'];
$id_user=$_SESSION['id_user'];

//Créations variables like et dislike
$like=1;
$dislike=-1;

//Requête infos acteur pour affichage article
$sql= $conn->prepare("SELECT acteur, description,logo, id_acteur FROM acteur WHERE id_acteur='$id_acteur'");
$sql->execute(array($id_acteur));
$res= $sql->fetch();
?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Partenaires bancaires</title>
  <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css"/>
  <link href="css/details.css" rel="stylesheet">
  
</head>

<body>

<div class="page">

<div class="partner">
<div id='logo'> <?php echo '<img src="data:image/jpeg;base64,'. base64_encode($res['logo']) .'" width=150px/>'; ?> </div>
 <h2> <?php echo $res['acteur'] ;?> </h2>
<div class="description"> <p><?php echo $res['description'];?></p></div>
</div>


<?php
//on écrit la requête pour vérifier les id_user de la table post au niveau de l'entrée id_acteur concerné
$check = "SELECT id_user FROM vote WHERE id_acteur='$id_acteur' AND id_user='$id_user'";
$requete=$conn->query($check);
$vote_user = $requete -> fetch();

?>

<?php 

//Nb like, dislike et commentaires
$number_like = $conn->query("SELECT COUNT(*) FROM vote WHERE vote = 1 AND id_acteur='$id_acteur'")->fetchColumn();

$number_dislike = $conn->query("SELECT COUNT(*) FROM vote WHERE vote = -1 AND id_acteur='$id_acteur'")->fetchColumn();

$number_comm = $conn->query("SELECT COUNT(*) FROM post WHERE id_acteur='$id_acteur'")->fetchColumn();

//on affiche les commentaires de ce partenaire
$sql1= "SELECT * FROM Post INNER JOIN Account ON account.id_user = post.id_user WHERE post.id_acteur='$id_acteur'";
$req=$conn->query($sql1);
$commentaires=$req->fetchAll(); 

//on écrit la requête pour vérifier les id_user de la table post au niveau de l'entrée id_acteur concerné 
//en allant vérifier les id_user présents dans la table au niveau de l'id_acteur concerné et de l'id_user connecté:
$check1 = "SELECT id_user FROM post WHERE id_acteur='$id_acteur' AND id_user='$id_user'";
$requete1=$conn->query($check1);
$comment_user = $requete1 -> fetch();


//S'il n'a pas déjà commenté : on lui affiche le formulaire de commentaire?>

 <div class="commentaire"> 

  <div id="com-vote">
    <h2 id="titre-com">  <?= $number_comm ?> Commentaire(s): </h2>
    <div id="comm"> <?php if (isset ($comment_user['id_user'])) {
  echo'Vous avez déjà posté un commentaire';
} else {
 echo"
 <form method='post' action='comment-section-traitement.php'>
 <label for='commentaire'>Nouveau commentaire:</label>
 <input type='text' name='commentaire' id='commentaire' required='required'/>
 <input type='hidden' value='$id_acteur' name='id_acteur'/>
 <button type='submit'> Envoyer </button>
 </form>";
}?> </div> 

<div id="vote">
  <div id="vote-content">
  <?= $number_like ?>
<form method='post' action='like-section-traitement.php'>
 <input type='hidden' value='<?= $id_acteur?>' name='id_acteur'/>
 <input type='hidden' value='<?=$like?>' name='like'>
 <button type='submit'> <img class="pouce" src="img/pouce-haut.png" alt="pouce vers le haut"></button>
 </form>

<form method='post' action='dislike-section-traitement.php'>
 <input type='hidden' value='<?=$id_acteur?>' name='id_acteur'/>
 <input type='hidden' value='<?=$dislike?>' name='dislike'>
 <button type='submit'><img class="pouce" src="img/pouce-bas.png" alt="pouce vers le bas"> </button>
 </form>
<?= $number_dislike ?></div> </div></div>

 <?php
//on affiche tous les commentaires concernant ce partenaire avec les infos de prénom (id_user pour l'instant) et date
foreach ($commentaires as $commentaire): 
$date= date_create ($commentaire['date_add']);
?>
 <div class="affich-com"> <div><?php echo $commentaire['prenom'];?></div>
<div><?php echo date_format($date,"d-m-Y");?></div>

<div> <?php echo $commentaire ['post']; ?> </div> </div>

<?php endforeach; ?>

</div>
</div> 

</body>
<?php include 'extensions/footer.php'; ?>
</html>