<section>
    <header>
        <h2>Accueil</h2>
    </header>
</section>
<?php
session_start();
?>
<div class="row d-flex justify-content-center">
<div class="box ">
        <h2>Connexion</h2>

        <?php if (isset($erreur)) echo "<div class='error'>$erreur</div>"; ?>

        <form action="inc/traitement_login.php" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit" name="login">Se connecter</button>
        </form>

        <div class="link">
            Pas encore de compte ? <a href="inc/traitement_inscription.php">Inscription ici</a>
        </div>
    </div>
    </div>
<hr>
