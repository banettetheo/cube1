<x-guest-layout>
    <section id="accueil" class="main-flex">

        <div class="col-center">
            <div class="flex header-recherche-filtre">
                <div class="recherche-user">
                    <!--barre de recherche pour trouver un autre utilisateur-->
                    <input type="text" class="recherche" placeholder="Rechercher un utilisateur">
                    <button  class="valid-recherche">rechercher</button>
                </div>
                <div class="flex filter">
                    <div class="filtre-ressource">
                        <label for="cat-select">selectionner la catégorie de votre ressource</label><br>
                        <!--une liste de catégorie récupérer sur la bdd-->
                        <select name="categorie" id="cat-select" class="filtre-select">
                            <option value="" selected>selectionner la catégorie de votre ressource</option>
                            <option value="exemple">exemple1</option>
                            <option value="exemple">exemple</option>
                        </select>
                    </div>

                    <div class="filtre-ressource">
                        <label for="type-select">selectionner le type de votre ressource</label><br>
                        <!--une liste de type récupérer sur la bdd-->
                        <select name="type" id="type-select" class="filtre-select">
                            <option value="" selected>selectionner le type de votre ressource</option>
                            <option value="exemple">exemple</option>
                            <option value="exemple">exemple</option>
                        </select>
                    </div>
                    <button class="valid-filtre">filtrer</button>
                </div>
            </div>
            <div>
                <!-- faire un foreach pour récupérer les ressources et afficher les éléments titre/auteur/contenu(image texte) dans les éléments correspondant.
                Une fois le foreach fais, on garde qu'une seule div class ressource les 5 autres on peu les enlever (là c'était pour l'exemple)-->
                <div class="ressources">
                    <div class="header-ressource">
                        <!--le titre de la ressource-->
                        <h2 id="titreRessource">Titre de la ressource et en plus très long pour pouvoir tester les grands titres</h2>
                        <div class="flex">
                            <!--le nom prenom de l'utilisateur-->
                            <h3 id="userNom">le nom de l'utilisateur</h3>
                            <h3 id="userPrenom">le prenom de l'utilisateur</h3>
                        </div>
                        <hr>
                    </div>
                    
                    <!--le contenu text de la ressource (description ou article)-->
                    <textarea id="contentRessource"></textarea>

                    <div class="footer-ressource">
                        <div class="vue-like">
                            <!--affichage du nombre de commentaire-->
                            <p id="footerRessourceVue"> </p>
                            <!--affichage du nombre de like-->
                            <p id="footerRessourceLike"> </p>
                        </div>
                        <div class="group-btn-footer">
                            <a href="" class="btn-footer"> mettre de côté </a>
                            <p> / </p>
                            <a href="" class="btn-footer"> ajouter aux favoris </a>
                            <p> / </p>
                            <a href="" class="btn-footer"> lire la suite </a>
                        </div>
                    </div>
                </div>

                <!-- lors d'une recherche d'utilisateur avec la barre de recherche on affiche juste les utilisateur avec le même nom prenom de la barre de recherche
                avec un foreach  -->
                <div class="user">
                    <!--le nom prenom de l'utilisateur-->
                    <h3 id="userNom">le nom de l'utilisateur</h3>
                    <h3 id="userPrenom">le prenom de l'utilisateur</h3>
                    <!-- accède au compteUser de l'utilisateur (suite dans le fichier compteUser.blade.php le commentaire sous la section)-->
                    <a href=""> voir l'utilisateur </a>
                </div>
            </div>
        </div>

        <div class="col-right">
            <h1> Jeu vidéo </h1>
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

    </section>
</x-guest-layout>