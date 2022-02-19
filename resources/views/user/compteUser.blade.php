@extends('layouts.app')

@section('content')

<section>
    <div class="col-left">
        <button class="button-menu">créer une ressource</button>
    </div>
    <div class="col-center">
        <h2>Liste de vos actualités et celles qui sont partagé avec vous</h2>
        <!-- faire un for each pour récupérer une ressource et afficher les éléments titre/auteur/contenu(image texte)/et les comentaire-->
        <div class="ressources">
            <div class="col-leftUser">
                <h2 id="titreRessource"></h2>
                <h3 id="userRessource"></h3>
                <textarea id="contentRessource"></textarea>
                <input id="footerRessource"> </input>
            </div>
            <div class="colr-rightUser">
                <button id="supprRessource"></button>
                <button id="modifRessource"></button>
                <button id="publiRessource"></button>
            </div>
        </div>
    </div>
    <div class="col-right">
        <h1>Vos information</h1>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
        <p></p>
    </div>
</section>

@endsection