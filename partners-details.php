<?php session_start () ?>


<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">

  <title>Partenaires bancaires</title>
  <link href="style.css" rel="stylesheet">
  
</head>
<body>
<?php include 'extensions/header.php'; ?>
<?php 

$partner_infos=$_POST['partner_infos']; 

echo $partner_infos;

?>
<?php include 'extensions/footer.php'; ?>
</body>
</html>