<x-administration-layout>
    <h3 id="" class="color-charte-verte p-4">Gestion des comptes utilisateurs</h3>
    <div class="container pt-5">
        <div class="row">
            <div class="col-6">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Nom" aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-primary">Rechercher</button>
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
                                <th scope="col">Prénom</th>
                                <th scope="col">Email</th>
                                <th scope="col">Actif</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($utilisateurs as $utilisateur)
                            <tr>
                                <th scope="row">{{$utilisateur['id']}}</th>
                                <td>{{$utilisateur['nom']}}</td>
                                <td>{{$utilisateur['prenom']}}</td>
                                <td>{{$utilisateur['email']}}</td>
                                <td>{{$utilisateur['ban']?"Non":"Oui"}}</td>
                                <td>
                                    <form method="POST" action="{{ route('administration.gestion-comptes.update', $utilisateur['id']) }}" class="form-deconnexion nav-link">
                                        @csrf
                                        @method('PUT')
                                        @if($utilisateur['ban']==1)
                                        <button class="btn btn-primary">Activer</button>
                                        @else
                                        <button class="btn btn-warning">Désactiver</button>
                                        @endif
                                    </form>



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