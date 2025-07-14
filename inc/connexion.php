<?php
$host = "localhost";
$db = "db_s2_ETU004390";
$user = "ETU004390";
$pass = "XAYUYJrv";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("Connexion échouée : " . mysqli_connect_error());
}
?>
