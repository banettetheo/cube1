<x-administration-layout>
    <h3 id="" class="color-charte-verte p-4">Gestion des ressources</h3>
    <div class="container pt-5">
        <div class="row">
            <div class="col-6">
                <div class="input-group">
                    <form method="POST" id="myForm" action="{{ route('administration.gestion-catalogues.ressources.store') }}" class="form-deconnexion nav-link">
                        @csrf
                        @method('POST')
                        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#creer">Ajouter un nouveau type de ressource</button>
                        <div class="modal fade" id="creer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Créer un nouveau type de ressource</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row justify-content-md-center">
                                            <label for='nom' id="" class="col-3 col-form-label">Nom : </label>
                                            <div class="col-6 pl-3">
                                                <input type="text" id="nom" name="Nom" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="">Annuler</button>
                                        <input type="submit" class="btn btn-success" value="Sauvegarder">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
                            @foreach($ressources as $ressource)
                            <tr>
                                <th scope="row">{{$ressource['id']}}</th>
                                <td>{{$ressource['nom']}}</td>
                                <td>{{$ressource['updated_at']}}</td>
                                <td>{{$ressource['deleted_at']}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-4">
                                            <!-- <form method="POST" action="{{ route('administration.gestion-catalogues.categories.update', $ressource['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                <button class="btn btn-warning">Mettre à jour</button>
                                            </form> -->
                                            @if ($ressource['deleted_at'] == "/")

                                            <form method="POST" id="myForm" action="{{ route('administration.gestion-catalogues.ressources.update', $ressource['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                @method('PUT')
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal{{($ressource['id'])}}">Mettre à jour</button>
                                                <div class="modal fade" id="modal{{($ressource['id'])}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Modifier "{{$ressource['nom']}}"</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="alert alert-warning" role="alert">
                                                                    Attention ! Cette modification entraînera un changement pour toute les ressources possédant ce type de ressource
                                                                </div>
                                                                <div class="row justify-content-md-center">
                                                                    <label for='nom' id="" class="col-3 col-form-label">Ressource : </label>
                                                                    <div class="col-6 pl-3">
                                                                        <input type="text" id="nom" name="Nom" class="form-control" value="{{$ressource['nom']}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal" data-toggle="modal" data-target="modalConfirm{{($ressource['id'])}}">Annuler</button>
                                                                <input type="submit" class="btn btn-success" value="Sauvegarder">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            @endif
                                        </div>
                                        <div class="col-3">
                                            @if ($ressource['deleted_at'] == "/")
                                            <form method="POST" action="{{ route('administration.gestion-catalogues.ressources.destroy', $ressource['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Désactiver</button>
                                            </form>
                                            @else
                                            <form method="POST" action="{{ route('administration.gestion-catalogues.ressources.restore', $ressource['id']) }}" class="form-deconnexion nav-link">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-danger">Restaurer</button>
                                            </form>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <!-- <form method="POST" action="{{ route('administration.gestion-comptes.update', $ressource['id']) }}" class="form-deconnexion nav-link">
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