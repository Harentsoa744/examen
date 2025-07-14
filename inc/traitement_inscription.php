<?php
include "connexion.php";
if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $date = $_POST['date'];
    $genre = $_POST['genre'];
    $sql = "INSERT INTO membre (nom, email, mdp, date_naissance, genre) VALUES ('$nom', '$email', '$mdp','$date','$genre');";
    mysqli_query($conn,$sql);
}
echo "test";
?>