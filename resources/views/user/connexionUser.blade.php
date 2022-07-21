<x-front-layout>
    <section id="connexion-user" class="">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <h1 class="display-6 mb-3">Connexion</h1>

        <!-- <form id="connexion-form" method="POST" action="{{ route('login') }}">
            @csrf
            <x-input id="email" name="email" type="email" class="input-connexion" placeholder="email" :value="old('email')" required autofocus />

            <x-input id="password" type="password" name="password" class="input-connexion" placeholder="mot de passe" required autocomplete="current-password" />
            <x-button class="btn-validation">{{ __('Connexion') }}</x-button>
            <a class="" href="{{ route('register') }}">{{ __('Pas encore inscrit ?') }}</a>
        </form> -->

        <form id="connexion-form" method="POST" action="{{ route('login') }}">
        @csrf

            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email" :value="old('email')" required autofocus>
            </div>
            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required autocomplete="current-password">
            </div>
            <div class="mb-3">
            </div>
            <button type="submit" class="btn btn-outline-light">Se connecter</button>
            <a href="{{ route('register') }}" class="btn btn-primary btn-sm mt-4">{{ __('Pas encore inscrit ?') }}</a>
        </form>

    </section>

</x-front-layout>