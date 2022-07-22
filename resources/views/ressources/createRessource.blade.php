<x-front-layout>
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
    
            <div class="font-medium text-red-600">
                {{ __('La création de votre fiche de mission à échouée.') }}
            </div>
    
            <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <section id="creer-ressource">
        <form action="{{ route('ressources.store') }}" method="POST" class="form-main">
            @csrf
            <div class="form-left">

                <input type="text" id="titre" value="{{ old('Titre') }}" name="Titre" placeholder="Titre de votre ressource" />
                <!--une liste de catégorie récupérer sur la bdd-->
                <select name="IdCategorie" id="cat-select" class="mb-4">
                    <option value="" selected>Sélectionner la catégorie</option>
                    @foreach($categories as $categorie)
                    <option value="{{ $categorie['id'] }}" {{$categorie['id']==old('IdCategorie')?'selected':""}}>{{ $categorie['nom'] }}</option>
                    @endforeach
                </select>

                <!--une liste de type récupérer sur la bdd-->
                <select name="IdType" id="type-select" class="mb-4">
                    <option value="" selected>Sélectionner le type</option>
                    @foreach($typesRessources as $typesRessource)
                    <option value="{{ $typesRessource['id'] }}" {{$typesRessource['id']==old('IdType')?'selected':""}}>{{ $typesRessource['nom'] }}</option>
                    @endforeach
                </select>


                <input type="url" id="Lien_ressources" name="Lien_ressources" placeholder="Ajouter une url" name="Lien_ressources" value="{{ old('Lien_ressources') }}">

                <input type="file" id="file" name="file" placeholder="ajouter un firchier à votre ressource" value="{{ old('file') }}">

            </div>

            <div class="form-right">

                <textarea id="content" row="5" cols="33" name="Contenue" placeholder="Décrivez votre ressource">{{ old('Contenue') }}</textarea>
                <input class="btn btn-primary" type="submit" value="Créer" />
            </div>
        </form>
    </section>
</x-front-layout>