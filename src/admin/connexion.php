<?php
session_start();
require '../code/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    

    $stmt = $pdo->prepare("SELECT password FROM admins WHERE username = :username");
    $stmt->execute(['username' => $username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && $username === "Saone_valley" && password_verify($password, $user['password'])) {
        $_SESSION["admin"] = $username;
        header("Location: ../code/chargement.php");
        exit();
    } else {
        echo "Erreur : Seul l'administrateur peut se connecter.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h2 align="center">Connexion à votre espace personnalisé</h2>
    <form class="admin" method="POST" align="center">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>
