<x-front-layout>

    <section id="compte-user" class="main">
        

            <!-- si on accède au compte utilisateur avec un id dans l'url différent de celui de la session de l'utilisateur qui s'est connecté,
    on affiche la liste et les informations de l'id dans l'url et le bouton changer de mot de passe et l'adresse mail ne s'affiche pas.
    à la place on a un ajouter en tant que -->
                @livewire('ressources-personnelles', ["ressources" => $ressources , 'titre' => "Vos actualités et celles qui sont partagées avec vous"])
            
    </section>
    <script>
        function openForm() {
            document.getElementById("popupForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
</x-front-layout>