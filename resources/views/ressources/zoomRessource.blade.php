<x-app-layout>


    <section id="zoom-ressource" class="">
        <div class="ressources">
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
        </div>
        <div class="commentaires">
            <h3> Liste des commentaires</h3><br>
            <textarea type="text"></textarea>
            <button>ajouter votre commentaire</button>
            <div>
                <h3 id="userCom"></h3>
                <div>
                    <textarea id="contentCom"></textarea>
                    <button>répondre à ce commentaire</button>
                    <button>supprimer le commentaire</button>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>