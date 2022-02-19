@extends('layouts.app')

@section('content')

<section id="compte-ser" class="main-flex">
    <div class="col-center">
        <h2>Liste de vos relations</h2>
        <!-- foreach des relation par rapport à l'utilisateur -->
        <div class="user">
            <!--le nom prenom de l'utilisateur-->
            <h3 id="userNom"></h3>
            <h3 id="userPrenom"></h3>
            <!-- boutton pour supprimer une relation-->
            <button href=""> supprimer cette relation </button>
            <!-- accède au compteUser de l'utilisateur -->
            <button href=""> voir l'utilisateur </button>
        </div>
    </div>
</section>

@endsection