<?php session_start () ?>

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Partenaires bancaires</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
<?php //on inclut le header
include 'extensions/header.php'; ?>
<?php 
//on crée les variables dont on a besoin
$partner_infos=$_POST['partner_infos'];
$id_acteur = $_POST ['id_acteur'];

//on affiche les informations du partenaire via la variable définie ci-desssu
echo $partner_infos;
?>

<?php 
//on va chercher les informations du commentaire dans la table Post
$sql ="SELECT post, id_user, date_add FROM post WHERE id_acteur ='$id_acteur'";
$req=$conn->query($sql);
$commentaires=$req->fetchAll();
//on va chercher les prénoms dans la table account
//$sql1='SELECT prenom, id_user FROM account WHERE id_user='$commentaire['id_user']'';
//$req1=$conn->query($sql1);
//$prenoms=$req1->fetchAll(); ?>

<?php
//on affiche tous les commentaires concernant ce partenaire avec les infos de prénom et date
foreach($commentaires as $commentaire):?>

  <article> <h2><?php echo $commentaire['id_user'];?></h2>
<h2><?php echo $commentaire ['date_add'];?></h2>
<div> <?php echo $commentaire ['post']; ?> </div> </article>

<?php endforeach;?>

<?php
//on écrit la requête pour vérifier les id_user de la table post
$check="SELECT id_user FROM post WHERE id_acteur='$id_acteur'";
$requete=$conn->query($check);
$comment_user = $requete -> fetch();

//on vérifie si le user-connected est présent dans la table post sur cet acteur (et donc a déjà commenté)
$id_user=$_SESSION['id_user'];

//$check = $conn->prepare('SELECT id_user FROM Post WHERE id_acteur=?');
//$check->execute(array($id_acteur));
//$comment_user= $check->fetchAll(); 


if ($id_user=$comment_user['id_user']) {
  echo'<div id="dejacommente"> <p>Vous avez déjà posté un commentaire à propos de ce partenaire </p> </div>';}

else {
echo'
<form method="post" action="comment-section-traitement.php">
<div>  <label for="commentaire">Votre commentaire:</label>
       <input type="textarea" name="commentaire" id="commentaire" required="required"/>
     </div>
     <div>
     <input type="hidden" value="<?php echo $id_acteur?>" name="id_acteur"
     /> 
      </div>
       <button type="submit"> Poster mon commentaire </button>
</form>';}

?>

<?php include 'extensions/footer.php'; ?>
</body>
</html>