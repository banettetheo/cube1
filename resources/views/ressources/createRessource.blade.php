<x-app-layout>
    <section id="creer-ressource">
        <form action="{{ route('ressources.store') }}" method="POST" class="form-main">
            @csrf
            <div class="form-left">

                <input type="text" id="titre" value="" name="Titre" placeholder="le titre de votre ressource"/>
                <div class="form-select">
                    <!--une liste de catégorie récupérer sur la bdd-->
                    <select name="IdCategorie" id="cat-select">
                        <option value="" selected>selectionner la catégorie</option>
                        @foreach($categories as $categorie)
                            <option value="{{ $categorie['id'] }}">{{ $categorie['nom'] }}</option>
                        @endforeach
                    </select>

                    <!--une liste de type récupérer sur la bdd-->
                    <select name="IdType" id="type-select">
                        <option value="" selected>selectionner le type</option>
                        @foreach($typesRessources as $typesRessource)
                            <option value="{{ $typesRessource['id'] }}">{{ $typesRessource['nom'] }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="url" id="url" placeholder="ajouter une url à votre ressource" name="Lien_ressources"/>

                <input type="file" id="file" name="file" placeholder="ajouter un firchier à votre ressource"/>

            </div>

            <div class="form-right">

                <textarea id="content" row="5" cols="33" name="Contenue" placeholder="insérer une description de votre ressource ou le contenu"></textarea>

                <input id="btn-creer-ressource" type="submit" value="créer votre ressource"/>
            </div>
        </form>
    </section>
</x-app-layout>