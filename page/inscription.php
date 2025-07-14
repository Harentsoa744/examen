<h2>Inscription</h2>
<form action="inc/traitement_inscription.php" method="POST">
    Nom: <input type="text" name="nom" required><br>
    Email: <input type="email" name="email" required><br>
    Mot de passe: <input type="password" name="mdp" required><br>
    <select name="genre">
        <option value="homme">homme</option>
        <option value="femme">femme</option>
    </select>
    <input type="date" name="date" >
    <input type="submit" name="register" value="S'inscrire">
</form>