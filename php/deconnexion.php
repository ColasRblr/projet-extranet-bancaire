<?php session_start (); ?>
<?php
  session_destroy();
  echo "Vous êtes déconnecté <br/>
 
<button onclick='window.location.href = `home.php`'> Rejoindre la page d'accueil</button>";

?>
