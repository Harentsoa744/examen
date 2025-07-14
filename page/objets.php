<?php
$conn = new mysqli("localhost", "root", "", "4288_4390");

if ($conn->connect_error) {
    die("Échec de connexion : " . $conn->connect_error);
}

$where = "";
if (isset($_GET['categorie']) && $_GET['categorie'] !== '') {
    $id = intval($_GET['categorie']);
    $where = "WHERE o.id_categorie = $id";
}

$result = list_objet($conn, $where);

$categories = $conn->query("SELECT * FROM categorie_objet");
echo "<form method='GET'>";
echo "<input type='hidden' name='p' value='objets'>";
echo "<select name='categorie'>";
echo "<option value=''>-- Toutes les catégories --</option>";
while ($cat = $categories->fetch_assoc()) {
    echo "<option value='" . $cat['id_categorie'] . "'>" . $cat['nom_categorie'] . "</option>";
}
echo "</select> <button type='submit' class='btn-primary rounded-pill'>Filtrer</button></form><hr>";
?>

<section>
<h2>Liste des objets</h2>

<table>
    <tr>
        <th>Nom de l'objet</th>
        <th>Catégorie</th>
        <th>Disponibilité</th>
    </tr>

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nom_objet']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nom_categorie']) . "</td>";
        if ($row['date_retour']) {
            echo "<td>🕒 Emprunté jusqu’au : " . htmlspecialchars($row['date_retour']) . "</td>";
        } else {
            echo "<td>✅ Disponible</td>";
        }
        echo "</tr>";
    }
    ?>
</table>
</section>