<?php
session_start();
include 'header.php';
include 'bdd.php';


    $requete = "SELECT * FROM chalets";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->execute();?>
<section class="logements">
    <div class="toplogement">
        <div class="img_logement">
            <img src="../assets/img/lodge.png" alt="Le lodge">
            <div class="voir">
                <h2>Le Lodge</h2>
                <p id="voir_plus" class="voir_plus">Voir en détail</p>
            </div>
        </div>
        <div class="prix_condition">
            <p>À partir de 80€/nuits</p>
            <p class="type_prix">Prix standard</p>
            <p class="popup">Offre annulable sous conditions</p>
            <div id="condition" class="conditions display_none"></div>
        </div>
    </div>
    <div class="deroule displaynone">
        <div class='contenant'>
            <p><b>Vous rêvez d'un séjour insolite et reposant ? Venez vivre une nuit insolite au bord de l'eau mais aussi sur l'eau !</b></p>
            <p><b>Le Lodge</b> vous propose 3 chambres (2 lits doubles + 1 lit superposé), une salle d'eau et wc séparé. Cuisine équipée : vaisselle et batterie de cuisine, plaque de cuisson, micro-onde, réfrigérateur... Une terrasse couverte avec un salon de jardin et des transats pour profiter d'une vue à 180° sur la Saône ! Ce Lodge vous plongera dans l'atmosphère idéale pour vivre des vacances ressourçantes, sportives ou axées sur la détente.
                <b>Vivez une expérience unique !</b>
            </p>
            <p>Heure d'arrivée : à partir de 15:00 <br>Heure de départ : jusqu'à 10:00</p>
        </div>
        <div class='img_descr'>
            <img src='../assets/img/lodge-1 2.jpg' alt=''>
            <img src='../assets/img/lodge-7 1.jpg' alt=''>
            <img src='../assets/img/lodge-3 1.jpg' alt=''>
            <img src='../assets/img/lodge-2 1.jpg' alt=''>
            <img src='../assets/img/salle-resto 1.jpg' alt=''>
            <img src='../assets/img/img2775 1.jpg' alt=''>
        </div>
    </div>
    <p class="descr">Le prix comprend : Les draps de lits. Un accès aux Pédalos, Canoës, Barques et Paddles.
        Le prix ne comprend pas : Le ménage, Linge de toilette : 1 serviette, 1 drap, 1 savon (en location supplémentaire : 6€ par personne), Les taxes de séjour (0,90€ par personne majeure par nuit).</p>
    <a class="reservation" href="reservation.php?type=lodge">Réservez</a>
</section>
<?php
if(isset($_SESSION["admin"])) {
   echo '<h2 class="h2_admin">Ajouter un chalet</h2>
    <form method="post" action="" enctype="multipart/form-data" class="form_admin">
        Nom du chalet:* <input type="text" name="nom" required><br><br>
        prix:* <input type="number" name="prix" required><br><br>
        contenu:* <input type="text" name="contenu" required><br><br>
        image1:* <input type="file" name="image1" required><br><br>
        image2:* <input type="file" name="image2" required><br><br>
        image3:* <input type="file" name="image3" required><br><br>
        image4: <input type="file" name="image4"><br><br>
        image5: <input type="file" name="image5"><br><br>
        image6: <input type="file" name="image6"><br><br>
        Description: <textarea id="story" name="story" rows="5" cols="33">
        1 lit double, wifi...</textarea><br><br>
        <input type="submit" name="valid" value="Envoyer" id="valid">
        <a href="../admin/dashboard.php">annuler</a>
        </form><br><br>';
    if (isset($_POST['valid'])) {
        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $contenu = $_POST['contenu'];
        $image1 = $_POST['image1'];
        $image2 = $_POST['image2'];
        $image3 = $_POST['image3'];
        $image4 = $_POST['image4'];
        $image5 = $_POST['image5'];
        $image6 = $_POST['image6'];
        $description = $_POST['description'];


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

                        $reqajout = "INSERT INTO activites (nom, prix, contenu, image1, image2, image3, image4, image5, image6, description) VALUES (:nom, :prix, :contenu, :image1, :image2, :image3, :image4, :image5, :image6, :description)";
                        $reqsql = $mysqlClient->prepare($reqajout);
                        $reqsql->bindParam(':nom', $nom, PDO::PARAM_STR);
                        $reqsql->bindParam(':prix', $prix, PDO::PARAM_INT);
                        $reqsql->bindParam(':contenu', $contenu, PDO::PARAM_STR);
                        $reqsql->bindParam(':image1', $image1, PDO::PARAM_STR);
                        $reqsql->bindParam(':image2', $image2, PDO::PARAM_STR);
                        $reqsql->bindParam(':image3', $image3, PDO::PARAM_STR);
                        $reqsql->bindParam(':image4', $image4, PDO::PARAM_STR);
                        $reqsql->bindParam(':image5', $image5, PDO::PARAM_STR);
                        $reqsql->bindParam(':image6', $adresse, PDO::PARAM_STR);
                        $reqsql->bindParam(':description', $description, PDO::PARAM_STR);
                        $reqsql->execute();
                        echo "Le chalet a été ajoutée avec succès.";

                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit();
                    } else {
                        echo "Désolé, une erreur s'est produite lors du téléchargement de votre fichier.";
                    }
                }
            }
        } else {
            echo "Le fichier n'est pas une image.";
        }
    }
}

include 'footer.php'; ?>