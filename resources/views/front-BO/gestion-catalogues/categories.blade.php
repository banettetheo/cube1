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
                                <th scope="col">Dernière modification</th>
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
                                <td>{{$categorie['updated_at']}}</td>
                                <td>{{$categorie['deleted_at']}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <!-- <form method="POST" action="{{ route('administration.gestion-catalogues.categories.update', $categorie['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                <button class="btn btn-warning">Mettre à jour</button>
                                            </form> -->
                                            <form method="POST" id="myForm" action="{{ route('administration.gestion-catalogues.categories.update', $categorie['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal{{($categorie['id'])}}">Mettre à jour</button>
                                                <div class="modal fade" id="modal{{($categorie['id'])}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modifier "{{$categorie['nom']}}"</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="alert alert-warning" role="alert">
                                                                    Attention ! Cette modification entraînera un changement pour toute les ressources possédant cette catégorie
                                                                </div>
                                                                <div class="row justify-content-md-center">
                                                                    <label for='nom' id="" class="col-3 col-form-label">Catégorie : </label>
                                                                    <div class="col-6 pl-3">
                                                                        <input type="text" id="nom" name="Nom" class="form-control" value="{{$categorie['nom']}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="modalConfirm{{($categorie['id'])}}">Annuler</button>
                                                                <input type="submit" class="btn btn-success" value="Sauvegarder">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="col-3">
                                            <form method="POST" action="{{ route('administration.gestion-catalogues.categories.destroy', $categorie['id']) }}" class="form-deconnexion nav-link">
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

                                <!-- Modal -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-administration-layout>