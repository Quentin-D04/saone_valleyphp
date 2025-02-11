<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select des activités</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <h1>Sélection d'un point d'intérêt</h1>
    <form action="" method="GET" id="form4">
        <select name="activites">
            <option value="">Sélectionnez un point d'intérêt</option>
            <?php
            $requete = "SELECT * FROM type_activites";
            $reqsql = $mysqlClient->prepare($requete);
            $reqsql->execute();
            while ($restype = $reqsql->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . htmlspecialchars($restype['idtype_activite']) . "'>" . htmlspecialchars($restype['nom_type']) . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Valider">
    </form>

    <?php
    if (isset($_GET['activites']) && !empty($_GET['activites'])) {
        $id_activite = $_GET['activites'];
        $query = "SELECT * FROM activites INNER JOIN type_activites ON activites.idtype_activite = type_activites.idtype_activite WHERE activites.idtype_activite = :id_activite";
        $stmt = $mysqlClient->prepare($query);
        $stmt->bindParam(':id_activite', $id_activite, PDO::PARAM_INT);
        $stmt->execute();
        $activites = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($activites) {
            echo "<h2 class='h2_activites'>Détails des activités sélectionnées :</h2>";
            foreach ($activites as $activite) {
                echo "<div class='activites'>";
                if (!empty($activite['image'])) {
                    echo "<img src='../assets/img/" . htmlspecialchars($activite['image']) . "' alt='Image de " . htmlspecialchars($activite['nom_activite']) . "'>";
                }
                echo "<p class='echo'>Catégorie : " . htmlspecialchars($activite['nom_type']) . "</p>";
                echo "<p class='echo'>Nom : " . htmlspecialchars($activite['nom_activite']) . "</p>";
                echo "<p class='echo'>Ville : " . htmlspecialchars($activite['ville']) . "</p>";
                echo "<p class='echo'>Adresse : " . htmlspecialchars($activite['adresse']) . "</p>";
                echo "<p class='echo'>Code Postal : " . htmlspecialchars($activite['cp']) . "</p>";
                echo "<p class='echo'>Description : " . htmlspecialchars($activite['description']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Aucune activité trouvée.</p>";
        }
    }
    ?>
</body>

</html>