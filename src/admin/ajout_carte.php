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
</head>

<body>
    <h1>Liste des cartes</h1>

    <table border="1" class="table">
        <tr>
            <th>Cartes</th><th>Supprimer</th>
        </tr>
        <?php
        $requete = "SELECT * FROM restaurant";
        $reqsql = $mysqlClient->prepare($requete);
        $reqsql->execute();
        while ($resactivites = $reqsql->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td><a href='../img_cartes/" . htmlspecialchars($resactivites['carte']) . "' target='_blank'>" . htmlspecialchars($resactivites['carte']) . "</a></td>";
            echo '<td><a href="suppr_carte.php?id=' . htmlspecialchars($resactivites['id']) . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette carte ?\')">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Ajouter une carte</h2>
    <form method="post" action="" enctype="multipart/form-data">
        Carte: <input type="file" name="carte" accept=".pdf" required><br><br>
        <input type="submit" name="valid" value="Envoyer">
    </form>

    <?php
    if (isset($_POST['valid'])) {
        $target_dir = "../img_cartes/";
        $target_file = $target_dir . basename($_FILES["carte"]["name"]);
        $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $maxFileSize = 500000;


        if ($fileType != "pdf") {
            echo "Désolé, seuls les fichiers PDF sont autorisés.";
        } else {

            if ($_FILES["carte"]["size"] > $maxFileSize) {
                echo "Désolé, votre fichier est trop volumineux.";
            } else {
                if (move_uploaded_file($_FILES["carte"]["tmp_name"], $target_file)) {
                    $carte = basename($_FILES["carte"]["name"]);

                    $reqajout = "INSERT INTO restaurant (carte) VALUES (:carte)";
                    $reqsql = $mysqlClient->prepare($reqajout);
                    $reqsql->bindParam(':carte', $carte, PDO::PARAM_STR);
                    $reqsql->execute();
                    echo "La carte a été ajoutée avec succès.";

                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit();
                } else {
                    echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                }
            }
        }
    }
    ?>
<a href="dashboard.php">Retourner sur la page Admin</a>

</body>

</html>