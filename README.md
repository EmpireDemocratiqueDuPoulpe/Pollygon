
# 2PROJ-Pollygon
Pollygon est un site internet permettant de créer des sondages, d'y répondre et de visualiser les résultats sous forme de graphiques. Il peut fonctionner sans JavaScript (excepté pour les graphiques) et s'adapte à tous les principaux navigateurs à ce jour.

***[Eng]** Pollygon is a website for creating and responding to polls and viewing the results in graphical form. It can run without JavaScript (except for graphics) and is compatible with all major browsers today.*

## Installation
Pollygon nécessite:
 - PHP 7.3.12 ou supérieur
 - MariaDB 10.4.10 ou supérieur

L'utilisation de WAMP/XAMPP/etc est conseillée.
Vous devrez ensuite importer [pollygon.sql](https://github.com/EmpireDemocratiqueDuPoulpe/2PROJ-Pollygon/blob/master/pollygon.sql) dans votre base de données. Le mot de passe des comptes par défaut est **Motdepasse123!**.

***[Eng]** Pollygon needs:*
 - *PHP 7.3.12 or higher*
 - *MariaDB 10.4.10 or higher*

*The use of WAMP/XAMPP/etc. is recommended.*
*You will then need to import [pollygon.sql](https://github.com/EmpireDemocratiqueDuPoulpe/2PROJ-Pollygon/blob/master/pollygon.sql) into your database. The default account password is **Motdepasse123!**.*

## Utilisation / Usage
La première page du site, [index.php](https://github.com/EmpireDemocratiqueDuPoulpe/2PROJ-Pollygon/blob/master/index.php), correspond à la page de présentation du produit. Depuis cette page, vous pouvez cliquer sur le bouton "S'inscrire" ou "Se connecter".

Une fois connecté vous arrivez sur la page [home.php](https://github.com/EmpireDemocratiqueDuPoulpe/2PROJ-Pollygon/blob/master/home.php). C'est de là que vous pouvez créer un nouveau sondage ou voir les statistiques de vos précédents sondages. Vous pouvez accéder à votre profil en cliquant sur votre nom d'utilisateur.
Pour partager un sondage à quelqu'un afin qu'il puisse y répondre, vous devez lui envoyer le lien que vous pouvez retrouver sous chacun de vos sondages. **Attention cependant. Les logiciels WAMP/XAMPP/etc exécute le site web en local. Vous ne pouvez pas faire répondre un ami depuis ce genre d'installation.**

***[Eng]** The first page of the site, [index.php](https://github.com/EmpireDemocratiqueDuPoulpe/2PROJ-Pollygon/blob/master/index.php), is the product presentation page. From this page, you can click on the "Register (S'inscrire)" or "Login (Se connecter)" button.*

*Once logged in you will arrive on the page [home.php](https://github.com/EmpireDemocratiqueDuPoulpe/2PROJ-Pollygon/blob/master/home.php). From there you can create a new survey or view the statistics of your previous surveys. You can access your profile by clicking on your username.
To share a survey with someone so that they can answer it, you must send them the link you can find under each of your surveys. **Please note. WAMP/XAMPP/etc software runs the website locally. You can't make a friend answer your survey from this kind of installation.***
