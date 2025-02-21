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
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h2>Bienvenue sur le tableau de bord, <?php echo $_SESSION["admin"]; ?> !</h2>
    <nav>
        <ul class="dashboard">
            <li class="dash"><a href="ajout_carte.php">Ajouter des cartes de menu</a></li>
            <li class="dash"><a href="activites.php">Ajouter des activités</a></li>
            <li class="dash"><a href="inscription.php">Ajouter un utilisateur</a></li>
            <li class="dash"><a href="ajout_type.php">ajout type activité</a></li>
            <li class="dash"><a href="logout.php">Déconnexion</a></li>
        </ul>
    </nav>
</body>
</html>
