<x-front-layout>

    <section id="creer-ressource">
        <form action="{{ route('ressources.store') }}" method="POST" class="form-main">
            @csrf
            <div class="form-left">

                <input type="text" id="titre" value="" name="Titre" placeholder="Titre de votre ressource" />
                <!--une liste de catégorie récupérer sur la bdd-->
                <select name="IdCategorie" id="cat-select" class="mb-4">
                    <option value="" selected>Sélectionner la catégorie</option>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie['id'] }}">{{ $categorie['nom'] }}</option>
                    @endforeach
                </select>

                <!--une liste de type récupérer sur la bdd-->
                <select name="IdType" id="type-select" class="mb-4">
                    <option value="" selected>Sélectionner le type</option>
                    @foreach($typesRessources as $typesRessource)
                    <option value="{{ $typesRessource['id'] }}">{{ $typesRessource['nom'] }}</option>
                    @endforeach
                </select>


                <input type="url" id="url" placeholder="Ajouter une url" name="Lien_ressources" />

                <input type="file" id="file" name="file" placeholder="ajouter un firchier à votre ressource" />

            </div>

            <div class="form-right">

                <textarea id="content" row="5" cols="33" name="Contenue" placeholder="Décrivez votre ressource"></textarea>
                <input class="btn btn-primary" type="submit" value="Créer" />
            </div>
        </form>
    </section>
</x-front-layout>