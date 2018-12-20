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

    - voir le pb encore pour l'integration JS Jquery-> ne pas utiliser 'Enchor' ANNULEe
    
    - Debug conflits sur Git-> tous ->ok fait

    - Poursuivre le formulaire de création (intégration de la 2e collection(choice))->Dom A 80%

    - Modifier lien User/Avatar dans DB + gérer l'ajout d'un avatar par défaut pour chaque élève qui s'inscrit (Repo + Service + Controller + Template) -> OK FAIT

    - Ajout de message flash suite à l'inscription d'un prof et/ou d'un élève ->OK FAIT

_____________________________________________________________________________________________
VENDREDI

    - BACKOFFICE PROF -> Ludo
        - liste des élèves
        - mettre en place la fiche de l'élève ->OK FAIT
    - Espace Eleve -> Ludo
        - Front de l'espace élève (sauf partie jeu) ->OK FAIT

    - Espace jeu élève -> Thibault
        - Dynamiser le menu vertical avec des vignettes de jeux -> OK FAIT
        - Créer le controller, la route, la page et générer un affichage dynamique (jeu bloqué si xp insuffisant)
        - Préparer la page d'erreur (404 ou acces denied) -> ERREUR 404 à faire
    
    - Fonctionnement QCM -> Fred
        - Développement QCM Ajax -> A faire à plusieurs

    - Continuer le formulaire QCM -> Dom
        - Débugger le pb id lors de la suppression de question et réponse -> 80% de fait

D'ici mercredi :

    - gestion des avatars 
    - Création d'une classe par le prof -> avec génération d'un code classe qui s'affiche sur l'espace prof -> OK FAIT
    - L'élève peut rejoindre une classe-> OK FAIT
    - Questionnaire d'ajout de QCM -> fonctionnel à 90%
    - Espace élève fonctionnel (affichage dynamique de l'xp, etc.) -> OK FAIT
    
    - Capacité de jouer aux QCM créés => QCMs fonctionnels -> FAIT 50 %
_______________________________________________________________________________________________

LUNDI

    - nous avons tourné en rond : bloquage total de l'équipe
_______________________________________________________________________________________________
MARDI

    - L'élève peut rejoindre une classe-> OK FAIT
    - Questionnaire d'ajout de QCM -> fonctionnel à 90%
    - Espace élève fonctionnel (affichage dynamique de l'xp, etc.) -> OK FAIT

______________________________________________________________________________________________
MERCREDI


- le prof peut créer une classe->OK Fait
- inscription élève obligatoire avec code classe-> OK Fait
- redigérer le QCM vers une page de présentation du QCM-> OK Fait

- finir la création du QCM (pb du bolean, buton de suppression réponse) (DOM)
- barre des taches liste déroulante qcm (Ludo)->OK Fait
- barre de recherche nom des élèves -> OK FAIT

- finir le jeu du QCM (Fred)

______________________________________________________________________________________________
JEUDI

- rejoindre une classe (ajax)-> Thibault

- GIT AVEC LIEN POUR ROBIN au plus tard vendredi matin 10H

- utiliser Ajax pour vérifier en tant réél que le code class correspond au code class élève -> Thibault

- suite QCM -> vérif des champs QCM -> DOM
- ajouter un titre dans la table QCM -> Dom

- suite jeu QCM -> Fred
- ajouter les points xp dans bd élève

- gestion des résultats de l'élève
- consultation des résulats par le prof

- corriger pb responsive sur le site -> Ludovic

- espace recherche prof (thibault)

ATTENTION
présentation du site via une slide ou powerpoint










implementer le mémory

