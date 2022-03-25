<x-administration-layout>


    <h3 id="" class="color-charte-verte p-4">Accueil back-office (RE)SOURCES RELATIONNELLES</h3>
    @auth
    <div class="container m-4">
        <p>Bonjour {{Auth::user()->Prenom}} !<br><br>
            Bienvenue dans votre espace dédié à l'administration.</p>
        @endAuth
    </div>
</x-administration-layout>