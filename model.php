<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Entreprise</title>
    <meta charset="UTF-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        td{
            border: 2px solid blue;
        }
        th{
            border: 2px solid black;
        }
        tr{
            border: 2px solid black;
        }
    </style>
</head>
<body>
    <main class="container mt-4">
        <?php
        include "inc/connexion.php";
        include "inc/fonction.php";
        if (isset($_GET['p'])) {
            include "page/" . $_GET['p'] . ".php";
        } else {
            include "page/departements.php";
        }
        ?>
    </main>
</body>
</html>
