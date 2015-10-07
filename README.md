# test-mvc-oo

Le 7 et 8 octobre 2015


TEST PHP POO, MySQL en PDO et MVC


Ce qui est à votre disposition:

1) Téléchargez les fichiers ce trouvant à cette adresse dans un nouveau projet nommé "test-mvc-oo":
https://github.com/mikhawa/test-mvc-oo

2) Importez la base de donnée dans phpMyAdmin en local grâce au fichier sql inclu dans /datas/ : mvcoo-plein.sql

3) Vous trouverez également dans /datas/ un fichier nommé mvcoo.mwb qui vous permettra d'avoir une vue d'ensemble des tables dans Workbench, voici la capture d'écran de celle-ci:

4) Une maquette MVC est déjà créée, veuillez l'utiliser et garder les noms de fichiers, variables et constantes tels que présentés dans celle-ci.

Ce que vous devez faire:

1) Créez la BD "mvcoo" en local en important le fichier mvcoo-plein.sql

2) Créez les fichiers de classes pour chaque table de la base et mettez les dans le dossier adéquat (avec des getters et setters pour chaque colonne):

Ecrivain.php, Periode.php, Livre.php

Chaque setter doit protéger la variable passée en paramètre au cas d'une insertion dans la DB

3) Créez les managers de chacune de ces classes avec intégration de la PDO, et 2 méthodes de bases nommées "recupTous()" et "RecupUn($id)" permettant de récupérer chaques éléments de chaque tables SANS jointures! :

EcrivainManager.php, PeriodeManager.php, LivreManager.php

A mettre dans le dossier adéquat !

4) Observez le contrôleur frontal (index.php) et remplissez en premier lieu le contrôleur déjà présent (UserController.php)

5) Vous allez devoir créer des classes héritantes des classes Manager où vous mettrez les méthodes qui ferons des requêtes AVEC jointures (Obligatoire) et/ou de l'administration en cas de création de celle-ci (Bonus)!

EcrivainAdminManager.php,  PeriodeAdminManager.php, LivreAdminManager.php

A mettre dans le dossier adéquat !

6) Vous devez créer des vues pour les affichages, autant que vous en aurez besoin.


Affichage du site
Vous êtes libre de faire du graphisme ou non, seuls les éléments demandés sont obligatoires
Le menu
On doit voir apparaitre sur toutes les pages un menu contenant chacunes des périodes (chiffres romains) de la table "periode", avec un lien sur chacunes d'entre elles passant une variable GET "idperiode". 
Vous pouvez où le mettre dans une vue séparée (demande un include dans les autres vues) ou l'inclure dans chaque vues (plus simple).
Le lien connexion y sera ajouté en cas de création de l'administration (Bonus)

Accueil

Le menu doit y être présent ainsi qu'un écrivain pris au hasard (en utilisant par exemple une méthode d' EcrivainManager qui le récupérerait, petit coup de pousse: "SELECT * FROM ecrivain  ORDER BY RAND() LIMIT 1; " ;-) ) SANS liens avec les tables "livre" ni "période".

Schéma:
Titre: Bienvenue sur Les Poètes Francophones
Menu
Sous-titre: Ecrivain au hasard
ecrivain.lenom (complet)
ecrivain.labio (complet)

Section Période

Pour arriver sur cette section, une variable GET nommée "idperiode" doit exister (depuis le menu), vous récupérez tous les écrivains liés à cette période.
Sur le lien "lire plus" mettez une variable GET nommée "idecrivain"

Schéma:
Titre: Les Poètes Francophones section periode.laperiode sciècle
Menu
boucle qui affiche tous les écrivains de cette période{
	ecrivain.lenom (complet)
	ecrivain.labio (250 caractères puis un lien lire plus...)
}


Section Ecrivain

Pour arriver sur cette section, une variable GET nommée "idecrivain" doit exister (depuis le lien "lire plus..."), vous récupérez les détails de l'écrivain en y joignant le titre, une courte description des livres qu'il a écrit (! jointure et group_concat + group_by)
Sur le lien "lire plus" mettez une variable GET nommée "idlivre"

Schéma:
Titre: Les Poètes Francophones section ecrivain.lenom
Menu
ecrivain.lenom (complet)
ecrivain.labio (complet avec nl2br() pour les retours à la ligne)
boucle qui affiche tous les livres de cet écrivain{
	livre.letitre (complet)
	livre.ladescription (100 caractères puis un lien lire plus...)
}
Section Livre

Pour arriver sur cette section, une variable GET nommée "idlivre" doit exister (depuis le lien "lire plus..."), vous récupérez les détails du livre.

Schéma:
Titre: Les Poètes Francophones section Livre: livre.letitre
Menu
livre.letitre (complet) – livre.lasortie
livre.ladescription (complet avec nl2br() pour les retours à la ligne)
Bonus

Tous est déjà prévu dans le contrôleur frontal et le fichier config, créez un lien "se connecter", un formulaire de connexion et un nouveau contrôleur pour l'admin et pour la connexion. Vous êtes libre pour la méthode du moment que ça respecte le modèle MVC.

Le but de cette administration? Pouvoir ajouter des écrivains dans les époques et pouvoir rajouter des livres aux écrivains.

Super bonus: pouvoir modifier/supprimer des livres et/ou des écrivains !
Bon test à tous !
