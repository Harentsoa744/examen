<?php
$host = "localhost";
$db = "4288_4390";
$user = "root";
$pass = "";
$conn = mysqli_connect($host, $user, $pass, $db);
if (isset($_POST['register'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
    $sql = "INSERT INTO membre (nom, email, mdp) VALUES ('$nom', '$email', '$mdp');";
    mysqli_query($conn,$sql);
}
echo "test";
?>