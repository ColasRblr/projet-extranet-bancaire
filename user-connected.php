  <?php
 session_start ();?> 

<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Connexion utilisateur</title>
  <link href="https://www.dafontfree.net/embed/c2NyYW1ibGVtaXhlZC1yZWd1bGFyJmRhdGEvMjIvcy8xMDg1MjcvU2NyYW1ibGVNaXhlZC50dGY" rel="stylesheet" type="text/css"/>
  <link href="css/style.css" rel="stylesheet">

</head>
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
?><header>
<?php include 'extensions/header.php'; ?>
</header>

<body >


  <!--<div class="loader">

<form class="form" method="post" action="login-traitement.php">

     <input type="text" class="text" placeholder="************" name="username" id="username" required="required"/>
     
     <input type="password" placeholder= "************" name="password" id="password" required="required" />
  
</form>
</div> -->

<section class="page">

<div id="presentation-gbaf">
<h1>Qu'est-ce que le GBAF ? </h1> 


<p>Le Groupement Banque Assurance Français​ (GBAF) est une fédération représentant les 6 grands groupes français :<br/></p>
<ul><li> BNP Paribas ; </li>
<li> BPCE;</li>
<li> Crédit Agricole ;</li>
<li> Crédit Mutuel-CIC ;</li>
<li> Société Générale ;</li>
<li> La Banque Postale.</li></ul>
<p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national.
Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.
<br>
Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.
Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.
Chaque salarié pourra ainsi poster un commentaire et donner son avis.
Le but du projet est donc de développer un extranet donnant accès à ces informations.</p>

<div class="frise">
<img id="illustration" src="img/gbaf-logo.png" width=100px></div>

</div>

<div class="divider"></div>

<h2> Liste des acteurs partenaires </h2>

<p>Les produits et services bancaires sont nombreux et très variés. Afin de renseigner au mieux les clients, les salariés des 340 agences des banques et assurances en France (agents, chargés de clientèle, conseillers financiers, etc.) recherchent sur Internet des informations portant sur des produits bancaires et des financeurs, entre autres.
Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du secteur bancaire, tels que les associations ou les financeurs solidaires.
Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.
Chaque salarié pourra ainsi poster un commentaire et donner son avis.
Le but du projet est donc de développer un extranet donnant accès à ces informations.</p>

<div id="liste">

 <?php 
//boucle
foreach($acteurs as $acteur):
?>

<article> 
  <section id="logo-txt">
 <div id="logo">
  <?php echo '<img src="data:image/jpeg;base64,'. base64_encode($acteur['logo']) .'" width=100px/>';?></div>
  <div id="article"><h3><?php echo $acteur['acteur']?></h3>
 <div id="txt"><?php echo substr($acteur['description'],0 , 80), '...';?></div></div>
</section>
<section id="bouton">
<form action="partners-details.php" method="POST">
<input type="hidden" value='<?php echo $acteur['id_acteur']?>' name="id_acteur">
<button id="suite"type="submit">Afficher la suite</button></section>
</form>
</article>

<?php endforeach; ?>

</div>
</section>


</body>
<footer>
<?php include 'extensions/footer.php'; ?>
</footer>
</html>