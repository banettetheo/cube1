<div>
    <div class="row">
        <div class="col-lg-2 col-md-12 py-4">
            @auth
            @if ($monCompte==true)
            <a href="{{route('mon-compte.mis-de-cote')}}" class="btn btn-outline-light">Mes ressources mise de côté</a><br><br>
            <a href="{{route('mon-compte.favoris')}}" class="btn btn-outline-light">Mes ressources favorites</a><br><br>
            @if ( Auth::user()->Moderateur)
            <a href="{{ route('ressources-a-valider.index') }}" class="btn btn-outline-warning">Valider des ressources</a>
            @endif
            @endif
            @endauth
        </div>

        <div class="col-lg-8 col-md-12 px-2 bg-light py-4 px-3">
            <h3 class="text-center">{{$titre}}</h3>
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
                        <a href="{{route('ressources.show',$ressource['id'])}}" class="btn btn-primary">Lire</a>
                        @if(Route::is('monCompte.index'))
                        <button id="modifRessource" class="btn btn-primary">Modifier</button>
                        <button id="supprRessource" class="btn btn-danger">Supprimer</button>&nbsp;/
                        <button id="publiRessource" class="btn btn-primary">Publier</button>
                        <button id="modifRessource" class="btn btn-primary">Partager</button>
                        @endif
                        @if(Route::is('mon-compte.mis-de-cote'))
                        <a href="{{route('ressources.mettre-de-cote.destroy', $ressource['id'])}}" class="btn btn-warning">Retirer la mise de côté</a>
                        @endif
                        @if(Route::is('mon-compte.favoris'))
                        <a href="{{route('ressources.ajout-aux-favoris.destroy', $ressource['id'])}}" class="btn btn-warning">Retirer des favoris</a>
                        @endif
                    </li>
                </ul>
            </div>
            <hr>
            @endforeach
        </div>
        <div class="col-lg-2 col-md-12 bg-light">
            @auth
            @if ($monCompte==true)
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
</div>