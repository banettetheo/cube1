<x-front-layout>
    <div class="row">
        <div class="col-lg-10 col-md-12 bg-light p-2">
            @livewire('recherche-utilisateur', ['utilisateurs' => $utilisateurs, 'typesRelation' => $typesRelation])
        </div>
</x-front-layout>