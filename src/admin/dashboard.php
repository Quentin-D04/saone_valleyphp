<?php
session_start();
require '../code/config.php';


if (!isset($_SESSION["admin"])) {
    header("Location: connexion.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>
<body>
    <h2>Bienvenue sur le tableau de bord, <?php echo $_SESSION["admin"]; ?> !</h2>
    <nav>
        <ul>
            <li><a href="activites.php">Ajouter des activités</a></li>
            <li><a href="inscription.php">Ajouter un utilisateur</a></li>
            <li><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
</body>
</html>
