<?php 

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Extranet_GBAF";

try {
    //connexion à la BDD
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

  // définir le mode exception d'erreur PDO 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	die('Erreur : '.$e->getMessage());
}

?>