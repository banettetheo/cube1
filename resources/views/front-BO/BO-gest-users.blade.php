@extends('layouts.app')

@section('content')
<div class="user">
        <!--le nom prenom email de l'utilisateur-->
        <h3 id="userNom"></h3>
        <h3 id="userPrenom"></h3>
        <h3 id="userEmail"></h3>
        <button href=""> supprimer </button>
        <button href=""> ban </button>
        <button href=""> unban </button>
    </div>

</div>
@endsection