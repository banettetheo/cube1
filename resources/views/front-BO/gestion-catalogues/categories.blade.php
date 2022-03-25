<x-administration-layout>
    <h3 id="" class="color-charte-verte p-4">Gestion des catégories</h3>
    <div class="container pt-5">
        <div class="row">
            <div class="col-6">
                <div class="input-group">
                    <button type="button" class="btn btn-outline-primary">Ajouter une nouvelle catégorie</button>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <div class="row">
                <div class="col align-self-center">

                    <table class="table">
                        <thead class="color-charte text-white">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Date de suppression</th>
                                <th scope="col">Options</th>
                                <!-- <th scope="col">Email</th>
                                <th scope="col">Actif</th>
                                <th scope="col">Options</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                            <tr>
                                <th scope="row">{{$categorie['id']}}</th>
                                <td>{{$categorie['nom']}}</td>
                                <td>{{$categorie['deleted_at']}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <form method="POST" action="{{ route('administration.gestion_catalogues.categories.update', $categorie['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                <button class="btn btn-warning">Mettre à jour</button>
                                            </form>
                                        </div>
                                        <div class="col-3">
                                            <form method="POST" action="{{ route('administration.gestion_catalogues.categories.destroy', $categorie['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                <button class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                <!-- <form method="POST" action="{{ route('administration.gestion-comptes.update', $categorie['id']) }}" class="form-deconnexion nav-link">
                                        @csrf
                                        <button class="btn btn-warning">Désactiver</button>
                                    </form> -->



                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-administration-layout>