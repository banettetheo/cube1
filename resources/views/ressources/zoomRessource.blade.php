<x-front-layout>

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

            <div class="footer-ressource">
                <div class="vue-like">
                    <!--affichage du nombre de commentaire-->
                    <p id="footerRessourceVue">vu {{ $ressource['nbVue'] }}</p>
                    <!--affichage du nombre de like-->
                    <p id="footerRessourceLike">aimé {{ $ressource['nbLike'] }}</p>
                </div>
            </div>
        </div>
        <div class="commentaires">
            <input type="text" class="inputCom" name="Contenue" placeholder="écrire votre commentaire"></imput>
            <button>ajouter votre commentaire</button>
            <h3> Liste des commentaires</h3><br>
            @foreach ($ressource['commentaires'] as $commentaire)
                <div class="flex comUser">
                    <div class="comHeader">
                        <h3 id="userNom">{{ $commentaire['utilisateur']['name'] }}</h3>
                        <h3 id="userPrenom">{{ $commentaire['utilisateur']['Prenom'] }}</h3>
                    </div>
                    <div class="comContent">
                        <p id="contentCom">{{ $commentaire['contenu'] }}</p>
                        <button class="suppCom">supprimer le commentaire</button>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-front-layout>