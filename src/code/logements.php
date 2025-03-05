<?php
session_start();
include 'header.php';
include 'bdd.php';


if (isset($_SESSION["admin"])) {
    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['valid'])) {
        $nom = trim($_POST['nom']);
        $prix = trim($_POST['prix']);
        $contenu = trim($_POST['contenu']);
        $description = trim($_POST['description']);

        $target_dir = "../img_chalets/";
        $maxFileSize = 500000;
        $allowedFileTypes = ["jpg", "jpeg", "png", "avif"];
        $errors = [];
        $images = [];


        function uploadImage($file, $target_dir, $maxFileSize, $allowedFileTypes)
        {
            if ($file['error'] === UPLOAD_ERR_NO_FILE) {
                return null;
            }
            $target_file = $target_dir . basename($file["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            $check = getimagesize($file["tmp_name"]);
            if ($check === false) return "Le fichier n'est pas une image.";
            if ($file["size"] > $maxFileSize) return "Fichier trop volumineux.";
            if (!in_array($imageFileType, $allowedFileTypes)) return "Formats autorisés : JPG, JPEG, PNG, AVIF.";

            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return basename($file["name"]);
            } else {
                return "Erreur lors de l'upload.";
            }
        }


        foreach (['image0', 'image1', 'image2', 'image3', 'image4', 'image5', 'image6'] as $key) {
            if (isset($_FILES[$key])) {
                $uploadedImage = uploadImage($_FILES[$key], $target_dir, $maxFileSize, $allowedFileTypes);
                if (is_string($uploadedImage) && str_starts_with($uploadedImage, "Erreur")) {
                    $errors[] = $uploadedImage;
                } else {
                    $images[$key] = $uploadedImage;
                }
            } else {
                $images[$key] = null;
            }
        }

        $checkQuery = "SELECT COUNT(*) FROM chalets WHERE nom = :nom";
        $stmtCheck = $mysqlClient->prepare($checkQuery);
        $stmtCheck->execute([':nom' => $nom]);
        $chaletExists = $stmtCheck->fetchColumn();

        if ($chaletExists > 0) {
            echo "<p style='color:red;'>Un chalet avec ce nom existe déjà.</p>";
        } elseif (empty($errors)) {
            try {
                $reqajout = "INSERT INTO chalets (nom, prix, contenu, image0, image1, image2, image3, image4, image5, image6, description) 
                             VALUES (:nom, :prix, :contenu, :image0, :image1, :image2, :image3, :image4, :image5, :image6, :description)";
                $reqsql = $mysqlClient->prepare($reqajout);
                $reqsql->execute([
                    ':nom' => $nom,
                    ':prix' => $prix,
                    ':contenu' => $contenu,
                    ':image0' => $images['image0'],
                    ':image1' => $images['image1'],
                    ':image2' => $images['image2'],
                    ':image3' => $images['image3'],
                    ':image4' => $images['image4'],
                    ':image5' => $images['image5'],
                    ':image6' => $images['image6'],
                    ':description' => $description
                ]);

                echo "<p style='color:green;'>Le chalet a été ajouté avec succès.</p>";

                // Redirection pour éviter la resoumission du formulaire
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } catch (PDOException $e) {
                echo "<p style='color:red;'>Erreur lors de l'ajout : " . $e->getMessage() . "</p>";
            }
        } else {
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        }
    }
}


$query = "SELECT * FROM chalets";
$stmt = $mysqlClient->prepare($query);
$stmt->execute();
$chalets = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($chalets) {
    foreach ($chalets as $index => $chalet) {
        echo '<section class="logements">
        <div class="toplogement">
            <div class="img_logement">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image0']) . '" alt="">
                <div class="voir">
                    <h2>' . htmlspecialchars($chalet['nom']) . '</h2>
                    <p onclick="voirplus('.($index).')" class="voir_plus">Voir en détail</p>
                </div>
            </div>
            <div class="prix_condition">
                <p>À partir de ' . htmlspecialchars($chalet['prix']) . '€/nuit</p>
                <p class="type_prix">Prix standard</p>
                <p onclick="offre('.($index).')" class="popup">Offre annulable sous conditions</p>
                <div id="condition_' . ($index) . '" class="conditions display_none">
                <p>De 15 à 30 jours avant l\'arrivée, 30% du montant de la réservation vous sera facturé à titre de frais d’annulation De 3 à 14 jours avant l\'arrivée, 50% du montant de la réservation vous sera facturé à titre de frais d’annulation No show, 100% du montant de la réservation vous sera facturé à titre de frais d’annulation À 2 jours de l\'arrivée, 100% du montant de la réservation vous sera facturé à titre de frais d’annulation</p>
                </div>
            </div>
        </div>
        <div id="chalet_' . ($index) . '" class="deroule displaynone">
            <div class="contenant">
                ' . htmlspecialchars($chalet['contenu']) . '
            </div>
            <div class="img_descr">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image1']) . '" alt="">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image2']) . '" alt="">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image3']) . '" alt="">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image4']) . '" alt="">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image5']) . '" alt="">
                <img src="../img_chalets/' . htmlspecialchars($chalet['image6']) . '" alt="">
            </div>
        </div>
        <p class="descr">' . htmlspecialchars($chalet['description']) . '</p>
        <a class="reservation" href="reservation.php?type=lodge">Réservez</a>
    </section>';
    }
}


if (isset($_SESSION["admin"])) {
    echo '<h2 class="h2_admin">Ajouter un chalet</h2>
    <form method="post" action="" enctype="multipart/form-data" class="form_admin">
        Nom du chalet:* <input type="text" name="nom" required><br><br>
        Prix:* <input type="number" name="prix" required><br><br>
        Contenu:* <textarea name="contenu" rows="5" cols="33" placeholder="chalet au bord de la saône..." required></textarea><br><br>
        Image de produit :* <input type="file" name="image0" required><br><br>
        Image1:* <input type="file" name="image1" required><br><br>
        Image2:* <input type="file" name="image2"><br><br>
        Image3:* <input type="file" name="image3"><br><br>
        Image4: <input type="file" name="image4"><br><br>
        Image5: <input type="file" name="image5"><br><br>
        Image6: <input type="file" name="image6"><br><br>
        Description: <textarea name="description" rows="5" cols="33" placeholder="1 lit double, wifi..." required></textarea><br><br>
        <input type="submit" name="valid" value="Envoyer">
        <a href="../admin/dashboard.php">Annuler</a>
    </form><br><br>';
}

include 'footer.php';
?>