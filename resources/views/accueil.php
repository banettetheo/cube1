<?php
    include "template/header.php";
?>

<section id="accueil">

    <div class="col-left">
        <h1 id="titre-menu"> menu </h1>
        <button class="button-menu">connexion</button>
        <button class="button-menu">inscription</button>
        <button class="button-menu">votre compte</button>
        <button class="button-menu">créer une ressource</button>
    </div>

    <div class="col-center">
        <input type="text" class="recherche-ressource" placeholder="Rechercher pas mot"/>
        <!-- faire un for each pour récupérer une ressource et afficher les éléments titre/auteur/contenu(image texte)/et les comentaire-->
        <div class="ressources">
            <h3>le titre</h3>
            <p>le contenu</p>
            <p>le footer avec les commentaires</p>
        </div>
        <div class="ressources">
            <h3>le titre</h3>
            <p>le contenu</p>
            <p>le footer avec les commentaires</p>
        </div>
        <div class="ressources">
            <h3>le titre</h3>
            <p>le contenu</p>
            <p>le footer avec les commentaires</p>
        </div>
        <div class="ressources">
            <h3>le titre</h3>
            <p>le contenu</p>
            <p>le footer avec les commentaires</p>
        </div>
        <div class="ressources">
            <h3>le titre</h3>
            <p>le contenu</p>
            <p>le footer avec les commentaires</p>
        </div>
        <div class="ressources">
            <h3>le titre</h3>
            <p>le contenu</p>
            <p>le footer avec les commentaires</p>
        </div>
    </div>

    <div class="col-right">
        <h1> Jeu vidéo </h1>
    </div>

</section>

<?php
    include "template/footer.php";
?>