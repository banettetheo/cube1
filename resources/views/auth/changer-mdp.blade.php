<x-guest-layout>

    <section id="inscription-user" class="">

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('mdp.changer') }}" id="inscription-form">
            @csrf
            @auth
            <x-input id="email" class="input-inscription" type="email" name="email"  value="{{ Auth::user()->email }}" required autofocus readonly></x-input>
            <x-input id="mdp_actuel" class="input-inscription" type="password" placeholder="Mot de passe actuel" name="mdp_actuel" required />
            <x-input id="mdp" class="input-inscription" type="password" placeholder="Nouveau mot de passe" name="mdp" required />
            <x-input id="confirmation_mdp" class="input-inscription" type="password" placeholder="Confirmer mot de passe" name="confirmation_mdp" required />

            @endauth

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Réinitialiser') }}
                </x-button>
            </div>
        </form>
</section>
</x-guest-layout>