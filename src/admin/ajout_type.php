<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: connexion.php");
    exit();
}
include("../code/bdd.php");

// Ajout d'un type d'activité
if (isset($_POST['ajouter'])) {
    $typeActivite = $_POST['type_activite'];

    $requete = "INSERT INTO type_activites (nom_type) VALUES (:nom_type)";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':nom_type', $typeActivite, PDO::PARAM_STR);
    if ($reqsql->execute()) {
        $message = "Le type d'activité a été ajouté avec succès.";
    } else {
        $message = "Une erreur s'est produite lors de l'ajout du type d'activité.";
    }
}

// Suppression d'un type d'activité
if (isset($_POST['supprimer']) && isset($_POST['idtype_activite'])) {
    $idType = $_POST['idtype_activite'];

    $requete = "DELETE FROM type_activites WHERE idtype_activite = :idtype_activite";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->bindParam(':idtype_activite', $idType, PDO::PARAM_INT);
    if ($reqsql->execute()) {
        $message = "Le type d'activité a été supprimé avec succès.";
    } else {
        $message = "Une erreur s'est produite lors de la suppression du type d'activité.";
    }
}

// Requête pour récupérer les types d'activités
$requete = "SELECT * FROM type_activites";
$reqsql = $mysqlClient->prepare($requete);
$reqsql->execute();
$typesActivites = $reqsql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les types d'activités</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>

<body>
    <h1>Ajouter un type d'activité</h1>

    <?php if (isset($message)) : ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>

    <form method="post" class="form_type">
        <label for="type_activite">Type d'activité :</label>
        <input type="text" id="type_activite" name="type_activite" required><br><br>
        <input type="submit" name="ajouter" value="ajouter">
    </form>

    <h2 class="h2_type">Types d'activités existants</h2>
    <table border="1" class="table_type">
        <tr>
            <th>Type d'activité</th>
            <th>Action</th>
        </tr>
        <?php foreach ($typesActivites as $type) : ?>
            <tr>
                <td><?php echo htmlspecialchars($type['nom_type'] ?? ''); ?></td>
                <td>
                    <form method="post" onsubmit="return confirm('Voulez-vous vraiment supprimer ce type d\'activité ?');">
                        <input type="hidden" name="idtype_activite" value="<?php echo htmlspecialchars($type['idtype_activite']); ?>">
                        <input type="submit" name="supprimer" value="supprimer">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <a href="dashboard.php">Retourner sur la page Admin</a>
</body>

</html>
