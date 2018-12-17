    # Collego
    
    Features :
_____________________________________________________________________________________________
LUNDI

    - Initier le projet Symfony
    - Création de branches : master / dev / prenom
    
    - Créer la base de données :
        - Préparer le .env
        - Créer les entity  => php bin/console make:entity
        - Créer les liens (OneToMany / ManyToOne / ManyToMany)
        - Chacun crée la base de données sur son PC => php bin/console doctrine:database:create

    OK OBJETCTIFS ATTEINTS

______________________________________________________________________________________________
MARDI

    - Créer les controllers :
        - Controler LOGIN : ROUTE Prof et ROUTE Elèves
        - Controler Register : ROUTE Prof et ROUTE Elèves
        - Controler Student
        - Controler Teacher

    - Créer le formulaire de connexion (loggin)
    - Créer le formulaire d'inscription (inscritpion) (eleve / professeur)
    - Créer la page d'accueil d'élève
    - Créer la page d'accueil des professeurs

    OK OBJECTIFS ATTEINTS

______________________________________________________________________________________________
MERCREDI

    - Création d'un controller de redirection eleve/prof ->ok fait
    - Modifications pour rendre les URLs et pages dynamiques (en fonction du User)->ok fait
    - Sessions ->OK fait
    - Créer le formulaire de création du QCM
        la moitié du chemin est fait. 

    OK OBJECTIFS ATTEINTS

______________________________________________________________________________________________
JEUDI

    - voir le pb encore pour l'integration JS Jquery-> ne pas utiliser 'Enchor'
    
    - Debug conflits sur Git-> tous ->ok fait

    - Poursuivre le formulaire de création (intégration de la 2e collection(choice))->Dom

    - Modifier lien User/Avatar dans DB + gérer l'ajout d'un avatar par défaut pour chaque élève qui s'inscrit (Repo + Service + Controller + Template)

    - Ajout de message flash suite à l'inscription d'un prof et/ou d'un élève
_____________________________________________________________________________________________
VENDREDI

    - BACKOFFICE PROF -> Ludo
        - liste des élèves
        - mettre en place la fiche de l'élève
    - Espace Eleve -> Ludo
        - Front de l'espace élève (sauf partie jeu)

    - Espace jeu élève -> Thibault
        - Dynamiser le menu vertical avec des vignettes de jeux
        - Créer le controller, la route, la page et générer un affichage dynamique (jeu bloqué si xp    insuffisant)
        - Préparer la page d'erreur (404 ou acces denied)
    
    - Fonctionnement QCM -> Fred
        - Développement QCM Ajax

    - Continuer le formulaire QCM -> Dom
        - Débugger le pb id lors de la suppression de question et réponse


D'ici mercredi :

    - gestion des avatars
    - Création d'une classe par le prof -> avec génération d'un code classe qui s'affiche sur l'espace prof
    - L'élève peut rejoindre une classe
    - Questionnaire d'ajout de QCM fonctionnel
    - Espace élève fonctionnel (affichage dynamique de l'xp, etc.)
    - Capacité de jouer aux QCM créés => QCMs fonctionnels

