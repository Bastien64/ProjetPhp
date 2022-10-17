# flower
Test de l'application
Pour tester l'application en tant qu'administrateur :

Lien du site en ligne

    Login : Admin
    Mdp : admin

 Vous pourrez vous connecter en tant que "Boutique" une fois cree dans l'application à partir du compte administrateur. Les login seront envoyés par mail. 
Suivant les droits, Boutique ou Visiteur l'interface differe 

 Technologies Utilisees : 
 Html5 
 Css3
 Javascript ES6
 Php 8
 SQL 
 Bootstrap 5.1

L'instalation d'un serveur Web en local  est  indispensables pour l'utilisation de cette application en local. Pensez à les installer avant de passer à la suite !

    A l'aide du terminal, placer vous dans l'espace de travail de votre choix et copiez la commande suivante :

git clone https://github.com/bastien64/flower

    Rendez-vous dans le dossier en tapant : cd flower
    Installez les dépendances avec : npm install
    Creez un fichier .env à la racine du dossier et y intégrer les variables d'environnement suivantes correspondants avec les votres :

APP_ENV=dev
DATABASE_DNS=mysql:host=localhost;dbname=ecf;port=3306;
DATABASE_USER= [Votre nom utilisateur bdd]
DATABASE_PASSWORD=[Votre code bdd]
DATABASE_NAME = [ECF]
DATABASE_HOST = [localhost]

    Lancer l'application avec :

npm run dev

    Ouvrez votre navigateur et rendez-vous sur localhost pour tester l'application
    Enjoy sunglasses

En tant qu'administrateur, vous allez pouvoir gérer :

    Les franchises
    Les salles
    Les Utilisateurs de l'application 

En vous connectant, vous verrez d'office la liste de toutes les franchises sous la forme de cartes. Sur chacune d'entre elles, se trouvent 2 boutons d'action qui vous invitent à  supprimer ou afficher la franchise concernée avec la boutique s'il y a lieu. Une barre de recherche n'est pas a jour pour l'instant (17/10/2022)

Le menu a gauche vous invitera à vous diriger vers le menu des modules pour créer, modifier ou supprimer des Franchises, boutiques

Chaque franchise peut avoir plusieurs salles mais une salle appartient à une seule franchise : ainsi, à la suppression d'une franchise, les salles liées seront également supprimées.

En tant que boutique, vous aurez accès à une interface en lecture pour consulter les droits accordées à vos salles ainsi qu'à votre profil. Les identifiants vous seront communiqués par mail lorsque l'administrateur aura créé votre compte. Vous pouvez répondre à ce mail pour toute demande.