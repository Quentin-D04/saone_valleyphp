<?php
include("bdd.php");

if (isset($_GET['id'])) {
    $id_activite = $_GET['id'];

    $requete = "SELECT * FROM activites WHERE idactivite = :id";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':id', $id_activite, PDO::PARAM_INT);
    $reqsql->execute();
    $resactivite = $reqsql->fetch(PDO::FETCH_ASSOC);

    if ($resactivite) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier une activité</title>
            <link rel="stylesheet" href="../styles/style.css">
        </head>
        <body>
            <h1 class="modif">Modifier une activité</h1>
            <form method="post" action="" enctype="multipart/form-data" class="admin">
                <label for="type">Type d'activité:</label>
                <select name="type" id="type">
                    <?php
                    $requete = "SELECT * FROM type_activites";
                    $reqsql = $mysqlClient->prepare($requete);
                    $reqsql->execute();
                    while ($restype = $reqsql->fetch(PDO::FETCH_ASSOC)) {
                        $selected = ($restype['idtype_activite'] == $resactivite['idtype_activite']) ? 'selected' : '';
                        echo "<option value='" . htmlspecialchars($restype['idtype_activite']) . "' $selected>" . htmlspecialchars($restype['nom_type']) . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                <label for="nom">Nom de l'activité:</label>
                <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($resactivite['nom_activite']); ?>" required><br><br>
                <label for="ville">Ville:</label>
                <input type="text" name="ville" id="ville" value="<?php echo htmlspecialchars($resactivite['ville']); ?>" required><br><br>
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" id="adresse" value="<?php echo htmlspecialchars($resactivite['adresse']); ?>" required><br><br>
                <label for="cp">Code Postal:</label>
                <input type="text" name="cp" id="cp" value="<?php echo htmlspecialchars($resactivite['cp']); ?>" required><br><br>
                <label for="description">Description:</label>
                <input type="text" name="description" id="description" value="<?php echo htmlspecialchars($resactivite['description']); ?>" required><br><br>
                <label for="description_en">Description (English):</label>
                <input type="text" name="description_en" id="description_en" value="<?php echo htmlspecialchars($resactivite['description_en']); ?>" required><br><br>
                <label for="image">Image:</label>
                <input type="file" name="image" id="image"><br><br>
                <label for="lien">Lien:</label>
                <input type="text" name="lien" id="lien" value="<?php echo htmlspecialchars($resactivite['lien']); ?>"><br><br>
                <input type="hidden" name="idactivite" value="<?php echo htmlspecialchars($resactivite['idactivite']); ?>">
                <input type="submit" name="valid" value="Envoyer" id="valid_modif">
                <a class="annuler" href="../admin/activites.php">Annuler</a>
            </form>
        </body>
        </html>
        <?php
    } else {
        echo "Activité non trouvée.";
    }
} else {
    echo "ID d'activité non spécifié.";
}

if (isset($_POST['valid'])) {
    $id_activite = $_POST['idactivite'];
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $ville = $_POST['ville'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $description = $_POST['description'];
    $description_en = $_POST['description_en'];
    $lien = $_POST['lien'];

    $requete = "SELECT image FROM activites WHERE idactivite = :id";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':id', $id_activite, PDO::PARAM_INT);
    $reqsql->execute();
    $resactivite = $reqsql->fetch(PDO::FETCH_ASSOC);
    $ancienne_image = $resactivite['image'];

    if (!empty($_FILES["image"]["name"])) {
        $target_dir = "../img_activites/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $maxFileSize = 500000;

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {

            if ($_FILES["image"]["size"] > $maxFileSize) {
                echo "Désolé, votre fichier est trop volumineux.";
            } else {

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "avif") {
                    echo "Désolé, seuls les fichiers JPG, JPEG, PNG et AVIF sont autorisés.";
                } else {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                        $image = basename($_FILES["image"]["name"]);

                        // Supprimer l'ancienne image
                        if (file_exists($target_dir . $ancienne_image)) {
                            unlink($target_dir . $ancienne_image);
                        }
                    } else {
                        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                        $image = $ancienne_image;
                    }
                }
            }
        } else {
            echo "Le fichier n'est pas une image.";
            $image = $ancienne_image;
        }
    } else {
        $image = $ancienne_image;
    }

    $requete = "UPDATE activites SET nom_activite = :nom, idtype_activite = :type, ville = :ville, adresse = :adresse, cp = :cp, description = :description, description_en = :description_en, image = :image, lien = :lien WHERE idactivite = :idactivite";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':nom', $nom, PDO::PARAM_STR);
    $reqsql->bindParam(':type', $type, PDO::PARAM_INT);
    $reqsql->bindParam(':ville', $ville, PDO::PARAM_STR);
    $reqsql->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $reqsql->bindParam(':cp', $cp, PDO::PARAM_STR);
    $reqsql->bindParam(':description', $description, PDO::PARAM_STR);
    $reqsql->bindParam(':description_en', $description_en, PDO::PARAM_STR);
    $reqsql->bindParam(':image', $image, PDO::PARAM_STR);
    $reqsql->bindParam(':lien', $lien, PDO::PARAM_STR);
    $reqsql->bindParam(':idactivite', $id_activite, PDO::PARAM_INT);
    $reqsql->execute();
    echo "L'activité a été mise à jour avec succès.";

    header("Location: ../admin/activites.php");
    exit();
}
?>