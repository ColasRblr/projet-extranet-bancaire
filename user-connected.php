  <?php
 session_start ();?> 

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Connexion utilisateur</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
  <?php include 'extensions/header.php'; ?>

<p>Bienvenue sur votre session</p>

<div> 
<h1>Qu'est-ce que le GBAF ? </h1> 

<img src="img/GBAF.png" width=300px>

<p>Le Groupement Banque Assurance Français​ (GBAF) est une fédération représentant les 6 grands groupes français :
● BNP Paribas ; <br/>
● BPCE;<br/>
● Crédit Agricole ;<br/>
● Crédit Mutuel-CIC ;<br/>
● Société Générale ;<br/>
● La Banque Postale.<br/><br/>
Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.
Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
<br>
Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.
Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.
Chaque salarié pourra ainsi poster un commentaire et donner son avis.
Le but du projet est donc de développer un extranet donnant accès à ces informations.</p>
</div>



<h1> Liste des acteurs partenaires </h1>
<section>

<?php 
//on va chercher les infos sur les partenaires dans la bdd

//on se connecte à la base
include 'config.php';

//on écrit la requête
$sql="SELECT acteur, description,logo, id_acteur FROM acteur ORDER BY id_acteur";

//on exécute la requête
$requete=$conn->query($sql);

//on récupère les données
$acteurs = $requete -> fetchAll();
?>
 
 <?php 
//boucle
foreach($acteurs as $acteur):
?>

<article> 
  <h2><?php echo $acteur['acteur']?></h2>
  <?php echo '<img src="data:image/jpeg;base64,'. base64_encode( $acteur['logo'] ) .'" width=300px/>';?>
  <div><?php echo substr($acteur['description'],0 , 120), '...';?></div>

  <form action="partners-details.php" method="POST">
<input type="hidden" value='<h2><?php echo $acteur['acteur']?></h2>
  <?php echo '<img src="data:image/jpeg;base64,'. base64_encode( $acteur['logo'] ) .'" width=300px/>';?>
  <div><?php echo $acteur['description'];?></div>' name="partner_infos"> 
  <input type="hidden" value='<?php echo $acteur['id_acteur']?>' name="id_acteur">
<input type="submit" value="Afficher la suite">
</form>

</article>

<?php endforeach; ?>


</section>
<?php include 'extensions/footer.php'; ?>
</body>
</html>