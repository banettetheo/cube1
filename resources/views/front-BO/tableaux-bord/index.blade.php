<x-administration-layout>
    <h3 id="" class="color-charte-verte p-4">Tableaux de bord : Statistiques</h3>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mt-5 font-weight-bold text-center">Statistiques générales</h4>
            </div>
        </div>
        <div class="row mt-3 pt-3" style="background-color: #eeeeee">
            <div class="col-md-12">
                <!-- Card group -->
                <div class="card-group">
                    <!-- Card -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title">Toutes ressources confondues:</h6>
                            <p class="card-text blue-text"><i class="fas fa-feather fa-3x pr-3 pl-3"></i><span class="ml-2" style="font-size: 30px;">{{$nbRessources}}</span></p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title">Nombre de j'aimes: </h6>
                            <p class="card-text red-text"><i class="fas fa-thumbs-up fa-3x pr-3 pl-3"></i></i><span class="ml-2" style="font-size: 30px;">{{$nbJaimes}}</span></p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h6 class="card-title">Nombre de vues: </h6>
                            <p class="card-text red-text"><i class="fas fa-eye fa-3x pr-3 pl-3"></i></i><span class="ml-2" style="font-size: 30px;">{{$nbVues}}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row">
                <div class="col">
                    <button class="btn btn-warning">Exporter</button>
                </div>
            </div>
        </div>
    </div>
</x-administration-layout>