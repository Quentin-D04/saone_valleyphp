<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: connexion.php");
    exit();
}
include("../code/bdd.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des cartes</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <h1>Liste des cartes</h1>

    <table border="1" class="table">
        <tr>
            <th>Cartes</th>
            <th>Langue</th>
            <th>Supprimer</th>
        </tr>
        <?php
        $requete = "SELECT * FROM restaurant";
        $reqsql = $mysqlClient->prepare($requete);
        $reqsql->execute();
        while ($resactivites = $reqsql->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td><a href='../img_cartes/" . htmlspecialchars($resactivites['carte']) . "' target='_blank'>" . htmlspecialchars($resactivites['carte']) . "</a></td>";
            echo "<td>" . htmlspecialchars($resactivites['langue']) . "</td>";
            echo '<td><a href="suppr_carte.php?id=' . htmlspecialchars($resactivites['id']) . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette carte ?\')">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>
    <h2>Ajouter des cartes</h2>
    <form method="post" action="" enctype="multipart/form-data">
        Cartes: <input type="file" name="cartes[]" accept=".pdf" multiple required><br><br>
        Langue: 
        <select name="langue" required>
            <option value="français">Français</option>
            <option value="anglais">Anglais</option>
        </select><br><br>
        <input type="submit" name="valid" value="Envoyer">
    </form>

    <?php
    if (isset($_POST['valid'])) {
        $target_dir = "../img_cartes/";
        $maxFileSize = 5000000; // Limite de taille de fichier en octets (5 MB)
        $allowedFileType = "pdf";
        $uploadedFiles = $_FILES["cartes"];
        $langue = $_POST['langue'];
        $errors = [];
        $uploadedFileNames = [];

        // Vérifier chaque fichier
        for ($i = 0; $i < count($uploadedFiles["name"]); $i++) {
            $target_file = $target_dir . basename($uploadedFiles["name"][$i]);
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Vérifier le type de fichier
            if ($fileType != $allowedFileType) {
                $errors[] = "Désolé, seuls les fichiers PDF sont autorisés.";
                continue;
            }

            // Vérifier la taille du fichier
            if ($uploadedFiles["size"][$i] > $maxFileSize) {
                $errors[] = "Désolé, votre fichier " . basename($uploadedFiles["name"][$i]) . " est trop volumineux.";
                continue;
            }

            // Déplacer le fichier téléchargé
            if (move_uploaded_file($uploadedFiles["tmp_name"][$i], $target_file)) {
                $uploadedFileNames[] = basename($uploadedFiles["name"][$i]);
            } else {
                $errors[] = "Désolé, une erreur s'est produite lors du téléchargement de votre fichier " . basename($uploadedFiles["name"][$i]) . ".";
            }
        }

        if (empty($errors)) {
            foreach ($uploadedFileNames as $carte) {
                $reqajout = "INSERT INTO restaurant (carte, langue) VALUES (:carte, :langue)";
                $reqsql = $mysqlClient->prepare($reqajout);
                $reqsql->bindParam(':carte', $carte, PDO::PARAM_STR);
                $reqsql->bindParam(':langue', $langue, PDO::PARAM_STR);
                $reqsql->execute();
            }

            echo "Les cartes ont été ajoutées avec succès.";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
    ?>
<a href="dashboard.php">Retourner sur la page Admin</a>

</body>

</html>