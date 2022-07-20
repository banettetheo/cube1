<x-front-layout>
    <section id="accueil" class="main-flex">
        <div class="row">
            <div class="col-lg-10 col-md-12 bg-light p-2">

                @livewire('rechercher', ['ressources' => $ressources, 'categories' => $categories, 'typesRessources'=>$typesRessources])

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