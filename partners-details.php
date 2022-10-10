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
//on inclue les infos de connexion à la bdd
include 'config.php';

//on crée les variables dont on a besoin
$partner_infos=$_POST['partner_infos'];
$id_acteur = $_POST ['id_acteur'];
$id_user=$_SESSION['id_user'];
//Créations variables like et dislike
$like=1;
$dislike=-1;

//on affiche les informations du partenaire via la variable définie ci-desssu
echo $partner_infos;

//on écrit la requête pour vérifier les id_user de la table post au niveau de l'entrée id_acteur concerné
$check="SELECT id_user FROM vote WHERE id_acteur='$id_acteur' AND id_user='$id_user'";
$requete=$conn->query($check);
$vote_user = $requete -> fetch();

//Si l'user connecté est présent dans la vérif ci-dessus : il a commenté : donc on lui affiche un message
if ($vote_user['id_user']) {
  echo'<div id="dejavote"> <p>Vous avez déjà voté au sujet de ce partenaire </p> </div>';}

//S'il n'a pas déjà commenté : on lui affiche le formulaire de commentaire
else {
  echo
 //Bouton radio pour like/dislike
"<form action='like-section-traitement.php' method='post' name='radio_vote'>
<input type='hidden' value='$id_acteur' name='id_acteur'>
<input type='hidden' value='$partner_infos' name='partner_infos'>
<input type='radio' name='vote' required='required' value='$like'> j'aime
<input type='radio' name='vote' value='$dislike'> je n'aime pas <br/>
<button type='submit' name='submit_vote'> Voter </button>
</form>";}
?>

<?php 
//On affiche les likes et dislike de cet acteur
$number_like = $conn->query("SELECT COUNT(*) FROM vote WHERE vote = 1 AND id_acteur='$id_acteur'")->fetchColumn();
echo $number_like;
echo "&nbsplike<br/>";

$number_dislike = $conn->query("SELECT COUNT(*) FROM vote WHERE vote = -1 AND id_acteur='$id_acteur'")->fetchColumn();
echo $number_dislike; 
echo "&nbspdislike";?>

<?php

//on affiche les commentaires de ce partenaire
//$sql ="SELECT post, id_user, date_add FROM post WHERE id_acteur ='$id_acteur'";
//$req=$conn->query($sql);
//$commentaires=$req->fetchAll();

$sql1= "SELECT * FROM Post INNER JOIN Account ON account.id_user = post.id_user WHERE post.id_acteur='$id_acteur'";
$req=$conn->query($sql1);
$commentaires=$req->fetchAll();

//$sql2= "SELECT prenom  FROM Account JOIN Post ON account.id_user = post.id_user WHERE post.id_acteur='$id_acteur'";
//$req=$conn->query($sql2);
//$prenom=$req->fetchAll();

//on affiche tous les commentaires concernant ce partenaire avec les infos de prénom (id_user pour l'instant) et date
foreach($commentaires as $commentaire): 
echo"<br/> Commentaires:";
$date= date_create ($commentaire['date_add']);
?>
  <article> <div><?php echo'posté par : '; echo $commentaire['prenom'];?></div>
<div><?php echo 'le '; echo date_format($date,"d-m-Y");?></div>
<div> <?php echo $commentaire ['post']; ?> </div> </article>

<?php endforeach; ?>

<?php

//on écrit la requête pour vérifier les id_user de la table post au niveau de l'entrée id_acteur concerné

//CHOIX 1 : en comptant le nombre de row où l'id_user et l'id_acteur concerné sont présents -> si 0 c'est que l'user n'a pas commenté
//$user_present_post = $conn->query("SELECT COUNT(*) FROM post WHERE id_acteur = '$id_acteur' AND id_user='$id_user'")->fetchColumn();
//echo $id_acteur;

//CHOIX 2 : en allant vérifier les id_user présents dans la table au niveau de l'id_acteur concerné et de l'id_user connecté:
$check1="SELECT id_user FROM post WHERE id_acteur='$id_acteur' AND id_user='$id_user'";
$requete1=$conn->query($check1);
$comment_user = $requete1 -> fetch();

//Si l'user connecté est présent dans la vérif ci-dessus : il a commenté : donc on lui affiche un message
if ($comment_user['id_user']) {
  echo'<div id="dejacommente"> <p>Vous avez déjà posté un commentaire à propos de ce partenaire </p> </div>';}

//S'il n'a pas déjà commenté : on lui affiche le formulaire de commentaire
else {
echo"
<form method='post' action='comment-section-traitement.php'>
<label for='commentaire'>Laissez un commentaire:</label>
       <input type='textarea' name='commentaire' id='commentaire' required='required'/>
     <input type='hidden' value='$id_acteur' name='id_acteur'/>
     <input type='hidden' value='$partner_infos' name='partner_infos'> 
       <button type='submit'> Envoyer </button>
</form>";}


//$check = $conn->prepare('SELECT  FROM post WHERE id_acteur=? AND id_user=?');
//$check->execute(array($id_acteur, $id_user));
//$data = $check->fetch();
//$row = $check->rowCount();

//$check = $conn->prepare('SELECT username reponse FROM Account WHERE username=?');
//$check->execute(array($username));
//$data = $check->fetch();
//$row = $check->rowCount();

//Si l'user connecté est présent dans la vérif ci-dessus : il a commenté : donc on lui affiche un message
//if ($user_present_post > 0) 
?>

<?php include 'extensions/footer.php'; ?>
</body>
</html>