<x-front-layout>

    <section id="compte-user" class="main-flex">
        <div class="row">

            <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
            <div class="col-lg-2 col-md-12 py-4">
                @auth
                @if (Request::getRequestUri()=='/mon-compte')
                <a href="" class="btn btn-outline-light">Mes ressources mise de côté</a><br><br>
                <a href="" class="btn btn-outline-light">Mes ressources favorites</a><br><br>
                @if ( Auth::user()->Moderateur)
                <a href="{{ route('ressources-a-valider.index') }}" class="btn btn-outline-warning">Valider des ressources</a>
                @endif
                @endif
                @endauth
            </div>

            <div class="col-lg-8 col-md-12 px-2 bg-light py-4 px-3">
                <h3 class="text-center">Ressources de côté</h3>
                <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte)-->
                <hr>
                @foreach ($ressources as $ressource)
                <div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-eye fa-1x pr-3 pl-3"></i><span class="ml-2" style="font-size: 20px;">&nbsp;{{$ressource['nbVue']}}&nbsp;/&nbsp;
                            <i class="fas fa-thumbs-up fa-1x pr-3 pl-3"></i><span class="ml-2" style="font-size: 20px;">&nbsp;{{$ressource['nbLike']}}

                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$ressource['categorie']['Nom']}} / {{$ressource['type']['Nom']}}</li>
                    </ul>
                    <div class="card-body">
                        <h5 class="card-title">{{ $ressource['titre'] }}</h5>
                        {{ $ressource['contenu'] }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"> {{ $ressource['utilisateur']['name'] }}&nbsp;{{ $ressource['utilisateur']['Prenom'] }}</li>
                        <li class="list-group-item">
                            <button class="btn btn-primary">Lire</button>
                            <button id="modifRessource" class="btn btn-primary">Modifier</button>
                            <button id="supprRessource" class="btn btn-danger">Supprimer</button>&nbsp;
                            {{dd($ressource)}}
                            @if(Auth()->id == $ressource[])
                            /
                            <button id="publiRessource" class="btn btn-primary">Publier</button>
                            <button id="modifRessource" class="btn btn-primary">Partager</button>
                        </li>
                    </ul>
                </div>
                <hr>
                @endforeach
            </div>
            <div class="col-lg-2 col-md-12 bg-light">
                @auth
                @if (Request::getRequestUri()=='/mon-compte')
                <h4 class="text-center">Mes informations</h4>
                <div class="row g-0">
                    <div class="col-lg-auto col-md-12">
                        {{ Auth::user()->name}}
                    </div>
                    <div class="col-lg-auto col-md-12">
                        &nbsp;{{ Auth::user()->Prenom}}
                    </div>
                </div>
                <p id="nom"></p>
                <p id="prenom"></p>
                <!------------------------------------------------------------->
                <!-- s'affiche que si l'id dans l'url et celui du user connecter sont les mêmes -->
                <p id="adresse-mail">{{ Auth::user()->email}}</p>
                <a id="changeMDP" class="btn btn-outline-dark" href="{{ url('changer-mot-de-passe') }}">
                    {{ __('Changer de mot de passe') }}
                </a>

                <form method="POST" action="{{ route('logout') }}" class="form-deconnexion">
                    @csrf
                    <x-button class="btn btn-danger mt-3">{{ __('Déconnexion') }}</x-button>
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
                <button class="ajoutRelation"> ajouter la relation</button>
                @endif
                @endauth
                <!------------------------------------------------------------->
            </div>
        </div>
    </section>
    <script>
        function openForm() {
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
</x-front-layout>