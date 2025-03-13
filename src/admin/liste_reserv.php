<?php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: connexion.php");
    exit();
}
include("../code/bdd.php");
?>
<head>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
    <h1>Liste des réservations</h1><br>
    <a class="retour" href="dashboard.php">Retourner sur la page Admin</a><br><br>
    <table border="1" class="tableres">
        <tr>
            <th>Nom du client</th>
            <th>Email</th>
            <th>N° de tel</th>
            <th>Heure de réservation</th>
            <th>Nombre de personnes</th>
            <th>Date d'arrivée</th>
            <th>Date de départ</th>
            <th>Prix</th>
            <th>Supprimer</th>
        </tr>
        <?php
        $requete = "SELECT * FROM reservations";
        $reqsql = $mysqlClient->prepare($requete);
        $reqsql->execute();
        while ($resreservation = $reqsql->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr class='activity-row'>";
            echo "<td>" . htmlspecialchars($resreservation['name']) . "</td>";
            echo "<td class='activity-type'>" . htmlspecialchars($resreservation['email']) . "</td>";
            echo "<td>" . htmlspecialchars($resreservation['phone']) . "</td>";
            echo "<td>" . htmlspecialchars($resreservation['time']) . "</td>";
            echo "<td>" . htmlspecialchars($resreservation['guests']) . "</td>";
            echo "<td>" . htmlspecialchars($resreservation['start_date']) . "</td>";
            echo "<td>" . htmlspecialchars($resreservation['end_date']) . "</td>";
            echo "<td>" . htmlspecialchars($resreservation['total_price']) . "</td>";
            echo '<td><a href="../code/supprimer_activite.php?id=' . htmlspecialchars($resreservation['id']) . '" onclick="return confirm(\'Êtes-vous sûr de vouloir supprimer cette activité ?\')">Supprimer</a></td>';
            echo "</tr>";
        }
        ?>
    </table>