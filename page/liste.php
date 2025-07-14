<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login_register.php");
    exit;
}

$conn = new mysqli("localhost", "root", "", "nom_de_ta_base");

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