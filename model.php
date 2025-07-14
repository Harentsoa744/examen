<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Entreprise</title>
    <meta charset="UTF-8">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .box {
            background: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 300px;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #007BFF;
            border: none;
            color: white;
            font-weight: bold;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .link {
            text-align: center;
            margin-top: 15px;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
        table { border-collapse: collapse; width: 70%; margin: auto; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
        th { background-color: #f0f0f0; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        h2 { text-align: center; margin-bottom: 30px; }
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
            include "page/login.php";
        }
        ?>
    </main>
</body>
</html>
