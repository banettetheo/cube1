@extends('layouts.app')

@section('content')

<section id="accueil">

    <div class="col-left">
        <h1 id="titre-menu"> menu </h1>
        <button class="button-menu">connexion</button>
        <button class="button-menu">inscription</button>
        <button class="button-menu">votre compte</button>
        <button class="button-menu">créer une ressource</button>
    </div>

    <div class="col-center">
        <input type="text" class="recherche-ressource" placeholder="Rechercher pas nom d'utilisateur"/>
        
        <select name="categorie" id="cat-select">
            <option value="" selected>selectionner la catégorie de votre ressource</option>
            <option value="exemple">exemple</option>
            <option value="exemple">exemple</option>
        </select>

        <label for="type-select">selectionner le type de votre ressource</label>
        <select name="type" id="type-select">
            <option value="" selected>selectionner le type de votre ressource</option>
            <option value="exemple">exemple</option>
            <option value="exemple">exemple</option>
        </select>

        <!-- faire un for each pour récupérer une ressource et afficher les éléments titre/auteur/contenu(image texte)/et les comentaire-->
        <div class="ressources">
            <h2 id="titreRessource"></h2>
            <h3 id="userRessource"></h3>
            <textarea id="contentRessource"></textarea>
            <input id="footerRessource"> </input>
        </div>
        <div class="ressources">
            <h2 id="titreRessource"></h2>
            <h3 id="userRessource"></h3>
            <textarea id="contentRessource"></textarea>
            <input id="footerRessource"> </input>
            <button href=""> lire la suite </button>
        </div>
        <div class="ressources">
            <h2 id="titreRessource"></h2>
            <h3 id="userRessource"></h3>
            <textarea id="contentRessource"></textarea>
            <input id="footerRessource"> </input>
            <button href=""> lire la suite </button>
        </div>
        <div class="ressources">
            <h2 id="titreRessource"></h2>
            <h3 id="userRessource"></h3>
            <textarea id="contentRessource"></textarea>
            <input id="footerRessource"> </input>
            <button href=""> lire la suite </button>
        </div>
        <div class="ressources">
            <h2 id="titreRessource"></h2>
            <h3 id="userRessource"></h3>
            <textarea id="contentRessource"></textarea>
            <input id="footerRessource"> </input>
            <button href=""> lire la suite </button>
        </div>
        <div class="ressources">
            <h2 id="titreRessource"></h2>
            <h3 id="userRessource"></h3>
            <textarea id="contentRessource"></textarea>
            <input id="footerRessource"> </input>
            <button href=""> lire la suite </button>
        </div>
    </div>

    <div class="col-right">
        <h1> Jeu vidéo </h1>
    </div>

</section>

@endsection