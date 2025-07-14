<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "4288_4390");


$where = "";
if (isset($_GET['categorie']) && !empty($_GET['categorie'])) {
    $id = intval($_GET['categorie']);
    $where = "WHERE o.id_categorie = $id";
}

$categories = mysqli_query($conn, "SELECT * FROM categorie_objet");
echo "<form method='GET'>";
echo "<select name='categorie'>";
echo "<option value=''>-- Toutes les catégories --</option>";
while ($cat = mysqli_fetch_assoc($categories)) {
    $selected = (isset($_GET['categorie']) && $_GET['categorie'] == $cat['id_categorie']) ? "selected" : "";
    echo "<option value='" . $cat['id_categorie'] . "' $selected>" . $cat['nom_categorie'] . "</option>";
}
echo "</select> <button type='submit'>Filtrer</button></form><hr>";

$sql = "
    SELECT o.nom_objet, c.nom_categorie, e.date_retour
    FROM objet o
    JOIN categorie_objet c ON o.id_categorie = c.id_categorie
    JOIN emprunt e ON o.id_objet = e.id_objet
    $where
    ORDER BY o.nom_objet
";

$result = mysqli_query($conn, $sql);
while ($obj = mysqli_fetch_assoc($result)) {
    echo "<div><strong>{$obj['nom_objet']}</strong> - Catégorie : {$obj['nom_categorie']}<br>";
    echo "🕒 Emprunté jusqu’au : {$obj['date_retour']}";
    echo "</div><hr>";
}
?>