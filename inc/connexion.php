<?php
$host = "localhost";
$db = "employees";
$user = "root";
$pass = "";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
