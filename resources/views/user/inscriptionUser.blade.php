<?php
    include "../template/header.php";
?>

    <section id="inscription-user">

        <h1>Inscription</h1>

        <form id="inscription-form">

            <input type="text" class="input-inscription" placeholder="nom"></input>
            <input type="text" class="input-inscription" placeholder="prenom"></input>
            <input type="text" class="input-inscription" placeholder="email"></input>
            <input type="text" class="input-inscription" placeholder="mot de passe"></input>
            <input type="text" class="input-inscription" placeholder="confirme mot de passe"></input>

            <button class="btn-validation">inscription</button>

        </form>

    </section>

<?php
    include "../template/footer.php";
?>