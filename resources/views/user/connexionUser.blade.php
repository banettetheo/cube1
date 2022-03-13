<x-guest-layout>

    <section id="connexion-user" class="">

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />


        <h1>Connexion</h1>

        <form id="connexion-form" method="POST" action="{{ route('login') }}">
            @csrf
            <x-input id="email" name="email" type="email" class="input-connexion" placeholder="email" :value="old('email')" required autofocus />

            <x-input id="password" type="password" name="password" class="input-connexion" placeholder="mot de passe" required autocomplete="current-password" />
            <a class="" href="{{ route('register') }}">{{ __('Pas encore inscrit ?') }}</a>
            <x-button class="btn-validation">{{ __('Connexion') }}</x-button>

        </form>

    </section>

</x-guest-layout>