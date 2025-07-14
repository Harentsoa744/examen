<?php
$host = "localhost";
$db = "4288_4390";
$user = "root";
$pass = "";
$conn = mysqli_connect($host, $user, $pass, $db);
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $sql = "SELECT * FROM membre WHERE email='$email';";
    $resultat = mysqli_query($conn,$sql);
    $user = mysqli_fetch_assoc($resultat);
    if ($user && password_verify($mdp, $user['mdp'])) {
        $_SESSION['user_id'] = $user['id_membre'];
        header("Location:../index.php?p=objets");
    } else {
        echo "Échec de connexion";
    }
}
?>
?>