    <div>
        <div>
            <div>
                @foreach ($current_ressources as $ressource)
                <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte) dans les éléments correspondant.
                    Une fois le foreach fais, on garde qu'une seule div class ressource les 5 autres on peu les enlever (là c'était pour l'exemple)-->
                <div class="ressources">
                    <div class="header-ressource">
                        <!--le titre de la ressource-->
                        <h2>{{ $ressource['titre'] }}</h2>

                        <div class="flex">
                            <!--le nom prenom de l'utilisateur-->
                            <h3>{{ $ressource['utilisateur']['name'] }}</h3>
                            <h3>{{ $ressource['utilisateur']['Prenom'] }}</h3>
                        </div>
                        <hr>
                    </div>

                    <!--le contenu text de la ressource (description ou article)-->
                    <p>{{ $ressource['contenu'] }}</p>

                    <div class="row g-0 justify-content-between">
                        <div class="footer-ressource">
                            <div class="col-2">
                                <div class="row">
                                    <div class="col-6">
                                        <!--affichage du nombre de commentaire-->
                                        <i class="fa-solid fa-eye"></i>&nbsp; {{ $ressource['nbVue'] }}
                                    </div>
                                    <div class="col-6">
                                        <!--affichage du nombre de like-->
                                        <i class="fa-solid fa-thumbs-up"></i>&nbsp; {{ $ressource['nbLike'] }}
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6">

                                @if(Auth()->check())
                                <a href="" class="btn btn-primary"> Mettre de côté </a>
                                <a href="" class="btn btn-primary"> Ajouter aux favoris </a>
                                @endif
                                <a href="{{ route('ressources.show', $ressource['id']) }}" class="btn btn-primary" style="margin-right:0;margin-left:auto;"> Lire la suite </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row g-0" id="assignmentButtonDiv">
                    <div class="col-12 py-2 d-flex justify-content-center">
                        <button type="button" wire:click="$emitTo('rechercher','addArticles')" class="btn btn-primary rounded p-2" style="width:100%;"><i class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>