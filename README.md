#Collego

Pour travailler, vous avez besoin de forker ce dépôt. Ensuite, clonez votre dépôt sur votre machine. Créez une branche avec votre prénom.

git branch *prenom* ou *nom de la fonctionnalité*

Vous pouvez ajouter un remote upstream (en plus de votre origin) vers ce dépôt avec :

git remote add upstream https://github.com/LEMARRE/Projet-Collego.git

Vous avez maintenant 2 branches master, celle de ce dépôt et de votre dépôt. Parfois, vous voudrez récupérer une mise à jour du dépôt :

# Mets à jour la branche master
git checkout master
git fetch upstream
git merge upstream/master
git push origin master
# Revenir sur votre branche
git checkout prenom
# Attention à cette commande, la version de l'élève revient au même niveau que celle de master (Perte potentielle)
git rebase master
