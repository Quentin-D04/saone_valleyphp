<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: connexion.php");
    exit();
}
include("../code/bdd.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = (int) $_GET['id'];

    try {
        $reqsql = $mysqlClient->prepare("DELETE FROM reservations WHERE id = :id");
        $reqsql->bindParam(':id', $id, PDO::PARAM_INT);
        $reqsql->execute();
        
        header("Location: liste_reserv.php");
        exit();
    } catch (PDOException $e) {
        echo "<p style='color:red;'>Erreur lors de la suppression : " . $e->getMessage() . "</p>";
    }
} else {
    echo "<p style='color:red;'>ID de réservation non spécifié ou invalide.</p>";
}
?>