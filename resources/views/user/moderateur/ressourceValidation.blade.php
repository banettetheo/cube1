<x-app-layout>
    <section id="ressource-validation" class="">

        <div class="col-center">
            <h2>Liste des ressources à valider pour la publication</h2>
            <!-- faire un foreach pour récupérer les ressource et afficher les éléments titre/auteur/contenu(image texte)-->
            <div class="ressources">
                <div class="col-leftUser">
                    <!--le titre de la ressource-->
                    <h2 id="titreRessource"></h2>
                    <!--le nom de l'utilisateur qui l'a partagé-->
                    <h3 id="userRessource"></h3>
                    <!--le contenu text de la ressource (description ou article)-->
                    <textarea id="contentRessource"></textarea>
                    <!--affichage du nombre de commentaire-->
                    <input id="footerRessourceCom"> </input>
                    <!--affichage du nombre de like-->
                    <input id="footerRessourceLike"> </input>
                    <button href=""> lire la suite </button>
                </div>
                <div class="colr-rightUser">
                    <button id="refuserRessource">refuser la publicationde la ressource</button>
                    <button id="publiRessource">publier la ressource</button>
                </div>
            </div>
        </div>

    </section>

</x-app-layout>