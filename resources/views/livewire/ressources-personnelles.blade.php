<div>
    <div class="row">
        <div class="col-lg-2 col-md-12 py-4">
            @auth
            @if ($monCompte==true)
            <a href="{{route('mon-compte.mis-de-cote')}}" class="btn btn-outline-light">Mes ressources mise de côté</a><br><br>
            <a href="{{route('mon-compte.favoris')}}" class="btn btn-outline-light">Mes ressources favorites</a><br><br>
            @if ( Auth::user()->Moderateur)
            <a href="{{ route('mon-compte.moderateur.ressources-a-valider.index') }}" class="btn btn-outline-warning">Valider des ressources</a>
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
                        @if(Route::is('mon-compte.moderateur.ressources-a-valider.index'))
                        <a href="{{route('mon-compte.moderateur.ressources-a-valider.show',$ressource['id'])}}" class="btn btn-primary">Consulter</a>
                        @else
                        <a href="{{route('ressources.show',$ressource['id'])}}" class="btn btn-primary">Lire</a>
                        @endif
                        @if(Route::is('mon-compte.mis-de-cote'))
                        <a href="{{route('ressources.mettre-de-cote.destroy', $ressource['id'])}}" class="btn btn-warning">Retirer la mise de côté</a>
                        @elseif(Route::is('mon-compte.favoris'))
                        <a href="{{route('ressources.ajout-aux-favoris.destroy', $ressource['id'])}}" class="btn btn-warning">Retirer des favoris</a>
                        @elseif(!Route::is('mon-compte.moderateur.ressources-a-valider.index'))
                        <a href="{{route('ressources.edit', $ressource['id'])}}" id="modifRessource" class="btn btn-primary">Modifier</a>
                        <form method="POST" action="{{route('ressources.destroy', $ressource['id'])}}">
                            @csrf
                            @method('DELETE')
                            <input type=submit class="btn btn-danger" value="Supprimer">
                        </form>
                        <a href="{{route('monCompte.publier', $ressource['id'])}}" class="btn btn-primary">Publier</a>
                        <form method="POST" id="myForm" action="" class="form-deconnexion nav-link">
                                @csrf
                                @method('POST')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#partager">Partager</button>
                                <div class="modal fade" id="partager" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Partager sa ressource</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row justify-content-md-center">
                                                    <label for='nom' id="" class="col-auto col-form-label">Partager avec : </label>
                                                    <div class="col-auto pl-3">
                                                        <select name="relation_select" id="relation-select">
                                                            <option value="0" selected></option>
                                                            <option value="" selected></option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="">Annuler</button>
                                                <input type="submit" class="btn btn-success" value="Sauvegarder">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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