@extends('layouts.app')

@section('content')

    <section id="connexion-user" class="">

        <h1>Connexion</h1>

        <form id="connexion-form">

            <input type="text" class="input-connexion" placeholder="email"></input>
            <input type="text" class="input-connexion" placeholder="mot de passe"></input>

            <button class="btn-validation">connexion</button>

        </form>

    </section>
    
@endsection