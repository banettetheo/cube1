@extends('layouts.app')

@section('content')

<section id="accueil" class="main-flex">

    <div class="col-left">
        <h1 id="titre-menu"> menu </h1>
        <button class="button-menu">connexion</button>
        <button class="button-menu">inscription</button>
        <button class="button-menu">votre compte</button>
        <button class="button-menu">créer une ressource</button>
    </div>

    <div class="col-center">
        <!--barre de recherche pour trouver un autre utilisateur-->
        <input type="text" class="recherche-user" placeholder="Rechercher un utilisateur"/>

        <div class="flex">
            <div class="filtre-ressource">
                <label for="type-select">selectionner la catégorie de votre ressource</label><br>
                <!--une liste de catégorie récupérer sur la bdd-->
                <select name="categorie" id="cat-select">
                    <option value="" selected>selectionner la catégorie de votre ressource</option>
                    <option value="exemple">exemple</option>
                    <option value="exemple">exemple</option>
                </select>
            </div>

            <div class="filtre-ressource">
                <label for="type-select">selectionner le type de votre ressource</label><br>
                <!--une liste de type récupérer sur la bdd-->
                <select name="type" id="type-select">
                    <option value="" selected>selectionner le type de votre ressource</option>
                    <option value="exemple">exemple</option>
                    <option value="exemple">exemple</option>
                </select>
            </div>
        </div>

        <div>
            <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte) dans les éléments correspondant.
            Une fois le foreach fais, on garde qu'une seule div class ressource les 5 autres on peu les enlever (là c'était pour l'exemple)-->
            <div class="ressources">
                <!--le titre de la ressource-->
                <h2 id="titreRessource"></h2>
                <!--le nom prenom de l'utilisateur-->
                <h3 id="userNom"></h3>
                <h3 id="userPrenom"></h3>
                <!--le contenu text de la ressource (description ou article)-->
                <textarea id="contentRessource"></textarea>
                <!--affichage du nombre de commentaire-->
                <input id="footerRessourceCom"> </input>
                <!--affichage du nombre de like-->
                <input id="footerRessourceLike"> </input>
                <button href=""> lire la suite </button>
            </div>
            <div class="ressources">
                <!--le titre de la ressource-->
                <h2 id="titreRessource"></h2>
                <!--le nom prenom de l'utilisateur-->
                <h3 id="userNom"></h3>
                <h3 id="userPrenom"></h3>
                <!--le contenu text de la ressource (description ou article)-->
                <textarea id="contentRessource"></textarea>
                <!--affichage du nombre de commentaire-->
                <input id="footerRessourceCom"> </input>
                <!--affichage du nombre de like-->
                <input id="footerRessourceLike"> </input>
                <button href=""> lire la suite </button>
            </div>
            <div class="ressources">
                <!--le titre de la ressource-->
                <h2 id="titreRessource"></h2>
                <!--le nom prenom de l'utilisateur-->
                <h3 id="userNom"></h3>
                <h3 id="userPrenom"></h3>
                <!--le contenu text de la ressource (description ou article)-->
                <textarea id="contentRessource"></textarea>
                <!--affichage du nombre de commentaire-->
                <input id="footerRessourceCom"> </input>
                <!--affichage du nombre de like-->
                <input id="footerRessourceLike"> </input>
                <button href=""> lire la suite </button>
            </div>

            <!-- lors d'une recherche d'utilisateur avec la barre de recherche on affiche juste les utilisateur avec le même nom prenom de la barre de recherche
            avec un foreach  -->
            <div class="user">
                <!--le nom prenom de l'utilisateur-->
                <h3 id="userNom"></h3>
                <h3 id="userPrenom"></h3>
                <!-- accède au compteUser de l'utilisateur (suite dans le fichier compteUser.blade.php le commentaire sous la section)-->
                <button href=""> voir l'utilisateur </button>
            </div>
        </div>
    </div>

    <div class="col-right">
        <h1> Jeu vidéo </h1>
    </div>

</section>

@endsection