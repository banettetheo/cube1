<x-front-layout>
    <div class="row">
        <div class="col-lg-10 col-md-12 bg-light p-2">
            @foreach ($utilisateurs as $utilisateur)
            <div class="user row-0">
                <div class="col-lg-12">
                    <div class="row g-0 h-100">
                        <div class="col-lg-10 col-md-auto">
                            <div class="row g-0 mx-4 justify-content-between h-100">
                                <div class="col-auto">
                                    <div class="row g-0 mx-4 h-100">
                                        <div class="col-auto">
                                            <!--le nom prenom de l'utilisateur-->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 512 512">
                                                <!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 128c39.77 0 72 32.24 72 72S295.8 272 256 272c-39.76 0-72-32.24-72-72S216.2 128 256 128zM256 448c-52.93 0-100.9-21.53-135.7-56.29C136.5 349.9 176.5 320 224 320h64c47.54 0 87.54 29.88 103.7 71.71C356.9 426.5 308.9 448 256 448z" />
                                            </svg>
                                        </div>
                                        <div class="col-auto my-auto mx-1">
                                            {{ $utilisateur['nom'] }}
                                        </div>
                                        <div class="col-auto my-auto mx-1">
                                            {{ $utilisateur['prenom'] }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto my-auto mx-1">
                                    {{ $utilisateur['relation'] }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</x-front-layout>