<x-app-layout>
    <section id="creer-ressource" class="">
        <form action="" class="" method="post">

            <label for="nom">le titre de votre ressource </label>
            <input type="text" id="titre" value="titre" />

            <label for="cat-select">selectionner la catégorie de votre ressource</label><br>
            <!--une liste de catégorie récupérer sur la bdd-->
            <select name="categorie" id="cat-select">
                <option value="" selected>selectionner la catégorie de votre ressource</option>
                <option value="exemple">exemple</option>
                <option value="exemple">exemple</option>
            </select>

            <label for="type-select">selectionner le type de votre ressource</label><br>
            <!--une liste de type récupérer sur la bdd-->
            <select name="type" id="type-select">
                <option value="" selected>selectionner le type de votre ressource</option>
                <option value="exemple">exemple</option>
                <option value="exemple">exemple</option>
            </select>

            <label for="content">insérer une description de votre ressource ou le contenu</label>
            <textarea id="content" row="5" cols="33"></textarea>

            <label for="url">ajouter une url à votre ressource</label>
            <input type="url" id="url" placeholder="ajout une url" />

            <label for="file">ajouter un firchier à votre ressource</label>
            <input type="file" id="file" name="file" />

            <input type="submit" value="Valider" />

        </form>
    </section>
</x-app-layout>