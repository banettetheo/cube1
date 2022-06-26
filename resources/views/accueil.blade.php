<x-front-layout>
    <section id="accueil" class="main-flex">
        <div class="row">
            <div class="col-lg-10 col-md-12 bg-light p-2">
                <div class="row g-0">
                    <!-- <div class="flex filter"> -->
                    <div class="col-lg-5 col-md-12 bg-light p-2">
                        <!-- <div class="filtre-ressource"> -->
                        <label for="cat-select">Sélectionner la catégorie de votre ressource</label><br>
                        <!--une liste de catégorie récupérer sur la bdd-->
                        <select name="Idcategorie" id="cat-select" class="filtre-select">
                            <option selected>Choisir...</option>
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
                        <select name="Idtype" id="type-select" class="filtre-select">
                            <option value="" selected>Choisir...</option>
                            @foreach($typesRessources as $typesRessource)
                            <option value="{{ $typesRessource['id'] }}">{{ $typesRessource['nom'] }}</option>
                            @endforeach
                        </select>
                        <!-- </div> -->
                    </div>
                    <div class="col-lg-2 col-md-12 bg-light p-2">
                        <button class="valid-filtre">filtrer</button>
                    </div>
                    <!-- </div> -->
                </div>
                @livewire('rechercher', ['ressources' => $ressources])

            </div>
            <div class="col-lg-2 col-md-12">
                <div class="row">
                    <div class="col-lg-12 p-3 bg-light">
                        <h1> Jeux vidéo </h1>
                        <div class="list-game">
                            <a href="https://zutom.z-lan.fr/">
                                <i class="img-game zutom-bg"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game1"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game2"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game3"></i>
                            </a>
                            <a href="https://snake.io/">
                                <i class="img-game snake-bg"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game4"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game5"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game6"></i>
                            </a>
                            <a href="">
                                <i class="img-game img-game7"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</x-front-layout>