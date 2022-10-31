# projet-extranet-bancaire

Le projet extranet bancaire a pour but de mutualiser en une seule interface utilisateur l'ensemble des informations concernant les partenaires bancaires du GBAF. Les salariés de ce dernier, une fois connectés, pourront donc se renseigner sur ces partenaires mais également les évaluer avec un système de commentaire et de like/dislike.

## Technologies

- HTML
- CSS 
- PHP
- SQL

## Auteur

Colas Rabiller

## Fonctionnalités

-interface utilisateur : système d'inscription et de connexion/déconnexion pour accéder aux informations sur les partenaires bancaires;

-réinitialisation du mot de passe via question secrète;

-modification des données de l'utilisateur une fois connecté (nom/prénom/nom d'utilisateur/mot de passe);

-sur la page détaillée de chaque partenaire : commentaire et vote (like/dislike) une fois par utilisateur (son prénom et la date du commentaire s'affichent automatiquement);

-responsive : 2 breakpoints (modèle desktop first; adaptabilité tablette et mobile selon normes Bootstrap 2022).

## Installation du site 

1-Téléchargez MAMP, WAMP ou XAMPP selon votre système d'exploitation. 

2-Assurez-vous que l'extention PDO est bien présente et active (dans PHPINFO sur MAMP/WAMP/XAMPP).

3-Téléchargez le dossier projet-extranet-gbaf et placez-le :

    -dans  C:\MAMP\htdocs  sous Windows ;
    
    -ou dans  /Applications/MAMP/htdocs  sous Mac.

Vous pourrez changer ce répertoire par défaut si besoin dans les préférences de MAMP, section Web Server, où vous modifierez "Document root".

4-Créez une base de données et importez-y la base de données fournie dans le document export_bdd.sql

5-Dans le fichier config.php, modifiez les variables suivantes si nécessaires :

    -$servername : Le nom de l'hôte : c'est l'adresse IP de l'ordinateur où MySQL est installé. Le plus souvent, MySQL est installé sur le même ordinateur que PHP : dans ce cas, mettez la valeur localhost . 
      
    -$dbname : c'est le nom de la base de données à laquelle vous voulez vous connecter. Dans notre cas, la base s'appelle extranet_gbaf, mais vous avez peut-être choisi un autre nom au moment de l'import.
      
    -$username et $password : ils permettent de vous identifier. Renseignez-vous auprès de votre hébergeur pour les connaître (Sur MAMP, la valeur de l'identifiant et du mot de passe est la même : root).
    
6-Lancez MAMP/WAMP/XAMPP, rendez-vous dans MY WEBSITE puis home.php (http://localhost:8888/projet-extranet-bancaire/home.php) et dans TOOLS/PHPMYADMIN pour travailler sur la BDD : et c'est parti !
