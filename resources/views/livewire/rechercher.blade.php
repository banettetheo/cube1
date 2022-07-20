    <div>
        <div class="row g-0">
            <!-- <div class="flex filter"> -->
            <div class="col-lg-7 col-md-12 bg-light p-2">
                <!-- <div class="filtre-ressource"> -->
                <label for="cat-select">Sélectionner la catégorie de votre ressource</label><br>
                <!--une liste de catégorie récupérer sur la bdd-->
                <select name="Idcategorie" id="cat-select" class="filtre-select" wire:change="$emitTo('rechercher','filtreCateg',$event.target.value)">
                    <option value="0" selected>Choisir...</option>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie['id'] }}">{{ $categorie['nom'] }}</option>
                    @endforeach
                </select>
                <!-- </div> -->
            </div>

            <div class="col-lg-5 col-md-12 bg-light p-2">
                <!-- <div class="filtre-ressource"> -->
                <label for="type-select">Sélectionner le type de votre ressource</label><br>
                <!--une liste de type récupérer sur la bdd-->
                <select name="Idtype" id="type-select" class="filtre-select" wire:change="$emitTo('rechercher','filtreType',$event.target.value)">
                    <option value="" selected>Choisir...</option>
                    @foreach($typesRessources as $typesRessource)
                    <option value="{{ $typesRessource['id'] }}">{{ $typesRessource['nom'] }}</option>
                    @endforeach
                </select>
                <!-- </div> -->
            </div>
            <!-- </div> -->
        </div>
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
                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <!--affichage du nombre de commentaire-->
                                        <i class="fa-solid fa-eye"></i>&nbsp; {{ $ressource['nbVue'] }}
                                    </div>
                                    <div class="col-auto">
                                        <!--affichage du nombre de like-->
                                        <i class="fa-solid fa-thumbs-up"></i>&nbsp; {{ $ressource['nbLike'] }}
                                    </div>
                                </div>
                            </div>

                            <div class="col-auto">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="{{ route('ressources.show.publique', $ressource['id']) }}" class="btn btn-primary" style="margin-right:0;margin-left:auto;"> Lire la suite </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @if(Count($ressources_trop_plein)>0)
                <div class="row g-0" id="assignmentButtonDiv">
                    <div class="col-12 py-2 d-flex justify-content-center">
                        <button type="button" wire:click="$emitTo('rechercher','addArticles')" class="btn btn-primary rounded p-2" style="width:100%;"><i class="fa-solid fa-sort-down"></i></button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>