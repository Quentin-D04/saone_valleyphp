<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des activités</title>
</head>

<body>
    <h1>Liste des activités</h1>

    <table border="1" class="table">
        <tr>
            <th>Nom de l'activité</th>
            <th>Type d'activité</th>
            <th>Ville</th>
            <th>Adresse</th>
            <th>Code Postal</th>
            <th>Description</th>
            <th>Image</th>
        </tr>
        <?php
        $requete = "SELECT * FROM activites INNER JOIN type_activites ON activites.idtype_activite = type_activites.idtype_activite";
        $reqsql = $mysqlClient->prepare($requete);
        $reqsql->execute();
        while ($resactivites = $reqsql->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($resactivites['nom_activite']) . "</td>";
            echo "<td>" . htmlspecialchars($resactivites['nom_type']) . "</td>";
            echo "<td>" . htmlspecialchars($resactivites['ville']) . "</td>";
            echo "<td>" . htmlspecialchars($resactivites['adresse']) . "</td>";
            echo "<td>" . htmlspecialchars($resactivites['cp']) . "</td>";
            echo "<td>" . htmlspecialchars($resactivites['description']) . "</td>";
            echo "<td><img src='../img_activites/" . htmlspecialchars($resactivites['image']) . "' alt='Image de " . htmlspecialchars($resactivites['nom_activite']) . "' width='100'></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>Ajouter une activité</h2>
    <form method="post" action="" enctype="multipart/form-data">
        Nom de l'activité: <input type="text" name="nom" required><br><br>
        Type d'activité:
        <select name="type">
            <?php
            $requete = "SELECT * FROM type_activites";
            $reqsql = $mysqlClient->prepare($requete);
            $reqsql->execute();
            while ($restype = $reqsql->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . htmlspecialchars($restype['idtype_activite']) . "'>" . htmlspecialchars($restype['nom_type']) . "</option>";
            }
            ?>
        </select>
        <br><br>
        Ville: <input type="text" name="ville" required><br><br>
        Adresse: <input type="text" name="adresse" required><br><br>
        Code Postal: <input type="text" name="cp" required><br><br>
        Description: <input type="text" name="description" required><br><br>
        Image: <input type="file" name="image" required><br><br>
        <input type="submit" name="valid" value="Envoyer">
    </form>

    <?php
    if (isset($_POST['valid'])) {
        $nom = $_POST['nom'];
        $type = $_POST['type'];
        $ville = $_POST['ville'];
        $adresse = $_POST['adresse'];
        $cp = $_POST['cp'];
        $description = $_POST['description'];

        // Gestion du téléchargement de l'image
        $target_dir = "../img_activites/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Vérifier si le fichier est une image réelle ou une fausse image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["image"]["name"]); // Nom de l'image

                // Ajouter en BDD
                $reqajout = "INSERT INTO activites (nom_activite, idtype_activite, ville, adresse, cp, description, image) VALUES (:nom, :type, :ville, :adresse, :cp, :description, :image)";
                $reqsql = $mysqlClient->prepare($reqajout);
                $reqsql->bindParam(':nom', $nom, PDO::PARAM_STR);
                $reqsql->bindParam(':type', $type, PDO::PARAM_INT);
                $reqsql->bindParam(':ville', $ville, PDO::PARAM_STR);
                $reqsql->bindParam(':adresse', $adresse, PDO::PARAM_STR);
                $reqsql->bindParam(':cp', $cp, PDO::PARAM_STR);
                $reqsql->bindParam(':description', $description, PDO::PARAM_STR);
                $reqsql->bindParam(':image', $image, PDO::PARAM_STR);
                $reqsql->execute();
                echo "L'activité a été ajoutée avec succès.";
                // Redirection après l'insertion
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
            }
        } else {
            echo "Le fichier n'est pas une image.";
        }
    }
    ?>
</body>

</html>