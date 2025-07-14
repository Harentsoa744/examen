<?php
function list_objet($conn, $where){
    $req = "
    SELECT o.nom_objet, c.nom_categorie, e.date_retour
    FROM objet o
    JOIN categorie_objet c ON o.id_categorie = c.id_categorie
    LEFT JOIN emprunt e ON o.id_objet = e.id_objet
    $where
    ORDER BY o.nom_objet
";
return mysqli_query($conn,$req);
}
?>