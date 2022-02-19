@extends('layouts.app')

@section('content')

<section id="zoomRessource">
    <div class="ressources">
        <h2 id="titreRessource"></h2>
        <h3 id="userRessource"></h3>
        <textarea id="contentRessource"></textarea>
        <input id="footerRessource"> </input>
    </div>
    <div class="commentaires">
        <h3> Liste des commentaires</h3>
        <h3 id="userCom"></h3>
        <textarea id="contentCom"></textarea>
    </div>
</section>

@endsection