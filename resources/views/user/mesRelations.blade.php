<x-app-layout>

    <section id="user-relation" class="main-flex">
        <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
        <div class="col-left">
            @auth
            <a href="" class="button-menu">-Vos ressources mise de côté</a><br><br>
            <a href="" class="button-menu">-Vos ressources favorites</a><br><br>
            @if ( Auth::user()->Moderateur)
            <a href="{{ route('ressources-a-valider.index') }}" class="button-menu">-Valider des ressources</a>
            @endif
            @endauth
        </div>
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
        <div class="col-right flex column">
        @auth
        @if (Route::is('monCompte'))
            <h1>Vos informations :</h1>
            <p id="nom">{{ Auth::user()->name}}</p>
            <p id="prenom">{{ Auth::user()->Prenom}}</p>
            <!------------------------------------------------------------->
            <!-- s'affiche que si l'id dans l'url et celui du user connecter sont les mêmes -->
            <p id="adresse-mail">{{ Auth::user()->email}}</p>
                            <a id="changeMDP" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ url('changer-mot-de-passe') }}">
                    {{ __('Changer de mot de passe') }}
                </a>

            <form method="POST" action="{{ route('logout') }}" class="form-deconnexion">
                @csrf
                <x-button class="button-menu">{{ __('Déconnexion') }}</x-button>
            </form>
            @else

            <!------------------------------------------------------------->
            
            <!-- s'affiche que si l'id dans l'url et celui du user connecter sont différent -->
            <!--une liste de type de relation récupérer sur la bdd-->
            <select name="type" id="relation-select">
                <option value="" selected>selectionner le type de relation</option>
                <option value="ami">ami</option>
                <option value="famille">famille</option>
            </select>
            <button> ajouter la relation</button>
            @endif
            @endauth
            <!------------------------------------------------------------->
        </div>
    </section>

</x-app-layout>