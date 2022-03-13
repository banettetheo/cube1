<x-guest-layout>

    <section id="inscription-user" class="">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <h1>Inscription</h1>

        <form id="inscription-form" method="POST" action="{{ route('register') }}">
            @csrf

            <x-input type="text" id="name" name="name" class="input-inscription" placeholder="Nom" :value="old('name')" required autofocus />
            <!-- <x-input type="text" id="prenom" name="prenom" class="input-inscription" placeholder="prenom" :value="old('prenom')" required autofocus /> -->
            <x-input type="email" id="email" name="email" class="input-inscription" placeholder="Email" placeholder="email" :value="old('email')" required />
            <x-input id="password" class="input-inscription" type="password" name="password" placeholder="Mot de passe" required autocomplete="new-password" />
            <x-input id="password_confirmation" class="input-inscription" type="password" placeholder="Confirmer mot de passe" name="password_confirmation" required />
            <a class="" href="{{ route('login') }}">{{ __('Déjà inscrit ?') }}</a>
            <x-button class="btn-validation">{{ __("S'inscrire") }}</x-button>

        </form>

    </section>
</x-guest-layout>