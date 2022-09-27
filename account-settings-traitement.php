<?php
session_start ();

//On inclue la connexion à la BDD
  require_once 'config.php'; 
    
  //on crée la variable id_user pour identifier ensuite de quel utilisateur on modifie les données personnelles
  $id_user=$_SESSION ['id_user'];

  // Pour modifier le champ utilisateur : on vérifie que le champ est rempli
   if(!empty($_POST['username_new'])) {

      // Et on sécurise en neutralisant la potentielle entrée de html
      $username_new = strip_tags($_POST['username_new']); 
    
            //insérer données du formulaire dans BDD
            $update_username ="UPDATE account SET username='$username_new' WHERE id_user=$id_user";
            $conn -> exec($update_username);

                
                };
                
                //Pour modifier le champ nom, on vérifie que le champ est rempli
        if (!empty($_POST['nom_new'])){

                    // Et on sécurise en neutralisant la potentielle entrée de html
                $nom_new = strip_tags($_POST['nom_new']);
                              
                          //insérer données du formulaire dans BDD
                    $update_nom = "UPDATE Account SET nom='$nom_new' WHERE id_user=$id_user";
                         $conn -> exec($update_nom);
              };

                              
                //Pour modifier le champ prenom, on vérifie que le champ est rempli
        if (!empty($_POST['prenom_new'])){

            // Et on sécurise en neutralisant la potentielle entrée de html
        $prenom_new = strip_tags($_POST['prenom_new']);
    
                  //insérer données du formulaire dans BDD
            $update_prenom = "UPDATE Account SET prenom='$prenom_new' WHERE id_user=$id_user";
                 $conn -> exec($update_prenom);
      };

                  //Pour modifier le champ password, on vérifie que le champ est rempli
                  if (!empty($_POST['password_new'])){

                    // Et on sécurise en neutralisant la potentielle entrée de html
                $password_new = strip_tags($_POST['password_new']);
                  
                               // On autorise la modification du password dans la BDD en sécurisant avec un hash
                   $password_new_hash = password_hash ($_POST['password_new'], PASSWORD_DEFAULT);
                              
                          //insérer données du formulaire dans BDD
                    $update_password = "UPDATE Account SET password='$password_new_hash' WHERE id_user=$id_user";
                         $conn -> exec($update_password);
              };


         echo "Vos informations ont été modifiées ! <br> Vous pouvez vous rendre sur la <a href='user-connected.php'> page d'accueil de votre compte </a>";

                               ?>