@extends('layouts.app')

@section('content')
    <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte) dans les éléments correspondant.-->
    <div class="ressources">
        <!--le titre de la ressource-->
        <h2 id="titreRessource"></h2>
        <!--le nom prenom de l'utilisateur-->
        <h3 id="userNom"></h3>
        <h3 id="userPrenom"></h3>
        <!--affichage du type ressource-->
        <input id="typeRessource"> </input>
        <!--affichage de la catégorie de la ressource-->
        <input id="footerRessourceLike"> </input>
        <button href=""> lire la suite </button>
        <button href=""> supprimer </button>
    </div>
</div>
@endsection