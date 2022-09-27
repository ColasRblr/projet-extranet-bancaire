<?php   
session_start();
session_destroy();
unset($_SESSION['id_user']);
header ('location: home.php');
?>
