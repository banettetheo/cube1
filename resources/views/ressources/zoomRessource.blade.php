<x-front-layout>
    @if(Route::is('mon-compte.moderateur.ressources-a-valider.show'))
    <a href="{{route('mon-compte.moderateur.ressources-a-valider.index')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>&nbsp;Retour aux ressources à valider</a>
    @else
    <a href="{{route('accueil')}}" class="btn btn-primary"><i class="fa-solid fa-arrow-left"></i>&nbsp;Retour aux ressources</a>
    @endif
    <section id="zoom-ressource" class="">
        <div class="ressources">
            <div class="header-ressource">
                <!--le titre de la ressource-->
                <h2 id="titreRessource">{{ $ressource['titre'] }}</h2>
                <div class="flex">
                    <!--le nom prenom de l'utilisateur-->
                    <h3 id="userNom">{{ $ressource['utilisateur']['name'] }}</h3>
                    <h3 id="userPrenom">{{ $ressource['utilisateur']['Prenom'] }}</h3>
                </div>
                <hr>
            </div>

            <!--le contenu text de la ressource (description ou article)-->
            <p id="contentRessource">{{ $ressource['contenu'] }}</p>
            <hr>
            <div class="footer-ressource">
                <div class="row g-0 justify-content-between">
                    <div class="col-auto">
                        <div class="row g-0">
                            <div class="col-auto">
                                <p id="footerRessourceVue" style="height:20px"><i class="fas fa-eye fa-2x pr-3 pl-3"></i>&nbsp;{{ $ressource['nbVue'] }}</p>
                            </div>
                            <div class="col-auto offset-lg-1 offset-md-1 offset-sm-1 mx-2">
                                <p id="footerRessourceLike" style="height:20px"><i class="fas fa-thumbs-up fa-2x pr-3 pl-3 pr-3"></i>&nbsp;{{ $ressource['nbLike'] }}</p>
                            </div>
                        </div>
                    </div>
                    @if(auth()->check()==true)

                    <div class="col-auto">
                        <div class="row g-0">
                            @if(Route::is('mon-compte.moderateur.ressources-a-valider.show'))
                            <div class="col-auto offset-lg-1 offset-md-1 offset-sm-1 mx-2">
                                <a href="{{route('mon-compte.moderateur.ressources-a-valider.valider',$ressource['id'])}}" class="btn btn-success">Valider</i></a>
                            </div>
                            <div class="col-auto offset-lg-1 offset-md-1 offset-sm-1 mx-2">
                                <a href="{{route('mon-compte.moderateur.ressources-a-valider.refuser',$ressource['id'])}}" class="btn btn-danger">Refuser</i></a>
                            </div>
                            @else
                            <div class="col-auto offset-lg-1 offset-md-1 offset-sm-1 mx-2">
                                <a href="{{route('ressources.like',$ressource['id'])}}" class="btn btn-primary">J'aime&nbsp;<i class="fas fa-thumbs-up fa-1x pr-3 pl-3"></i></a>
                            </div>
                            <div class="col-auto offset-lg-1 offset-md-1 offset-sm-1 mx-2">
                                @if($cote==false)
                                <a href="{{route('ressources.mettre-de-cote', $ressource['id'])}}" class="btn btn-primary">Mettre de côté</a>
                                @else
                                <a href="{{route('ressources.mettre-de-cote.destroy', $ressource['id'])}}" class="btn btn-warning">Retirer la mise de côté</a>
                                @endif
                            </div>
                            <div class="col-auto offset-lg-1 offset-md-1 offset-sm-1 mx-2">
                                @if($favoris==false)
                                <a href="{{route('ressources.ajout-aux-favoris',$ressource['id'])}}" class="btn btn-primary">Mettre en favoris</a>
                                @else
                                <a href="{{route('ressources.ajout-aux-favoris.destroy',$ressource['id'])}}" class="btn btn-warning">Retirer des favoris</a>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        <div class="commentaires">
            @if(auth()->check()==true)
            <form method="POST" action="{{ route('commentaires.store', $ressource['id']) }}">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="Contenue" aria-label="Commentaire" aria-describedby="btn-commentaire" placeholder="Votre commentaire...">
                    <input type="submit" class="btn btn-primary" id="btn-commentaire" value="Publier"></input>
                </div>
            </form>
            @endif
            <h3> Commentaires</h3><br>
            @foreach ($ressource['commentaires'] as $commentaire)
            <div class="flex comUser">
                <div class="comHeader">
                    <h3 id="userNom">{{ $commentaire['utilisateur']['name'] }}</h3>
                    <h3 id="userPrenom">{{ $commentaire['utilisateur']['Prenom'] }}</h3>
                </div>
                <div class="comContent">
                    <p id="contentCom">{{ $commentaire['contenu'] }}</p>
                    @if($commentaire['utilisateur']['id']==auth()->id())
                    <form method="POST" action="{{ route('commentaires.destroy', $commentaire['id']) }}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Supprimer mon commentaire">
                    </form>

                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </section>

</x-front-layout>