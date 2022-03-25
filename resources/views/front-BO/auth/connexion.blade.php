<x-administration-layout>
    <div class="container-fluid">
        <!-- <div class="align-content-end"> -->

            <div class="row align-items-center justify-content-md-center m-5">
                <div class="col-5 m-5 p-5">

                    <form class="form-signin" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h1 class="h3 mb-5 font-weight-normal text-white">Connexion au back-office</h1>
                        <!-- <label for="inputEmail" class="sr-only">Email address</label> -->
                        <input type="email" class="form-control mb-3" name="email" placeholder="Adresse mail" required="" autofocus="">
                        <!-- <label for="inputPassword" class="sr-only">Password</label> -->
                        <input type="password" id="inputPassword" class="form-control mb-5" name="password" placeholder="Mot de passe" required="">

                        <button class="btn btn-lg btn-outline-light btn-block" type="submit">Se connecter</button>
                    </form>
                </div>
            <!-- </div> -->
        </div>
    </div>
</x-administration-layout>