<section>
    <header>
        <h2>Accueil</h2>
    </header>
</section>
<?php
session_start();
?>
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_register.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "nom_de_ta_base");

// Filtrage
$where = "";
if (isset($_GET['categorie'])) {
    $id = intval($_GET['categorie']);
    $where = "WHERE o.id_categorie = $id";
}

// Liste des catégories
$categories = $conn->query("SELECT * FROM categorie_objet");
echo "<form method='GET'>";
echo "<select name='categorie'>";
echo "<option value=''>-- Toutes les catégories --</option>";
while ($cat = $categories->fetch_assoc()) {
    echo "<option value='" . $cat['id_categorie'] . "'>" . $cat['nom_categorie'] . "</option>";
}
echo "</select> <button type='submit'>Filtrer</button></form><hr>";

// Liste des objets
$req = "
    SELECT o.nom_objet, c.nom_categorie, e.date_retour 
    FROM objet o
    LEFT JOIN categorie_objet c ON o.id_categorie = c.id_categorie
    LEFT JOIN emprunt e ON o.id_objet = e.id_objet
    $where
    ORDER BY o.nom_objet
";
$res = $conn->query($req);

while ($obj = $res->fetch_assoc()) {
    echo "<div><strong>{$obj['nom_objet']}</strong> - Catégorie : {$obj['nom_categorie']}<br>";
    echo $obj['date_retour'] ? "🕒 Emprunté jusqu’au : {$obj['date_retour']}" : "✅ Disponible";
    echo "</div><hr>";
}
?>
Herizo
<?php
session_start();
session_destroy();
header("Location: login_register.php");
?>
Herizo
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "nom_de_ta_base");

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $res = $conn->query("SELECT * FROM membre WHERE email='$email'");
    $user = $res->fetch_assoc();

    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['user_id'] = $user['id_membre'];
        header("Location: objets.php");
        exit;
    } else {
        $erreur = "❌ Email ou mot de passe incorrect.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
<body>
    <div class="box">
        <h2>Connexion</h2>

        <?php if (isset($erreur)) echo "<div class='error'>$erreur</div>"; ?>

        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="mdp" placeholder="Mot de passe" required>
            <button type="submit" name="login">Se connecter</button>
        </form>

        <div class="link">
            Pas encore de compte ? <a href="register.php">Inscription ici</a>
        </div>
    </div>
</body>
</html>
<hr>
