<?php
include("../code/bdd.php");

if (isset($_GET['id'])) {
    $id_carte = $_GET['id'];

    // Récupérer le nom du fichier PDF
    $requete = "SELECT carte FROM restaurant WHERE id = :id";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':id', $id_carte, PDO::PARAM_INT);
    $reqsql->execute();
    $resCarte = $reqsql->fetch(PDO::FETCH_ASSOC);
    $carte = $resCarte['carte'];

    // Supprimer le fichier PDF du serveur
    $target_dir = "../img_cartes/";
    if (file_exists($target_dir . $carte)) {
        unlink($target_dir . $carte);
    }

    // Supprimer l'entrée de la base de données
    $requete = "DELETE FROM restaurant WHERE id = :id";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':id', $id_carte, PDO::PARAM_INT);
    $reqsql->execute();

    echo "La carte a été supprimée avec succès.";
    header("Location: ajout_carte.php");
    exit();
} else {
    echo "ID de carte non spécifié.";
    header("Location: ajout_carte.php");
    exit();
}
?>