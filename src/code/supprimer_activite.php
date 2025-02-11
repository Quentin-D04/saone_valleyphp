<?php
include("config.php");

if (isset($_GET['id'])) {
    $id_activite = $_GET['id'];

    // Récupérer l'image associée à l'activité
    $requete = "SELECT image FROM activites WHERE idactivite = :id";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':id', $id_activite, PDO::PARAM_INT);
    $reqsql->execute();
    $resactivite = $reqsql->fetch(PDO::FETCH_ASSOC);
    $image = $resactivite['image'];

    // Supprimer l'image du serveur
    $target_dir = "../img_activites/";
    if (file_exists($target_dir . $image)) {
        unlink($target_dir . $image);
    }

    // Supprimer l'activité de la base de données
    $requete = "DELETE FROM activites WHERE idactivite = :id";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':id', $id_activite, PDO::PARAM_INT);
    $reqsql->execute();

    echo "L'activité a été supprimée avec succès.";
    header("Location: activites.php");
    exit();
} else {
    echo "ID d'activité non spécifié.";
    header("Location: activites.php");
    exit();
}
?>