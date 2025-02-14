<?php
session_start();
require '../code/config.php';


if (!isset($_SESSION["admin"])) {
    echo "Accès refusé. Seul l'administrateur peut inscrire des utilisateurs.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST["new_username"];
    $new_password = $_POST["new_password"];
    

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM admins WHERE username = :username");
    $stmt->execute(['username' => $new_username]);
    $userExists = $stmt->fetchColumn();
    
    if ($userExists) {
        echo "Erreur : Ce nom d'utilisateur est déjà pris.";
    } else {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
            $stmt->execute(['username' => $new_username, 'password' => $hashed_password]);
            echo "Utilisateur ajouté avec succès !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription Utilisateur</title>
</head>
<body>
    <h2>Ajouter un utilisateur</h2>
    <form method="POST">
        <label for="new_username">Nom d'utilisateur :</label>
        <input type="text" id="new_username" name="new_username" required>
        <br>
        <label for="new_password">Mot de passe :</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <button type="submit">Ajouter</button>
        <a href="dashboard.php">Annuler</a>
    </form>
</body>
</html>