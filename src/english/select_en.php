<?php
include("../code/bdd.php");
include("header_en.php");
?>
<body>
    <h1 class="h1_select">Select a Point of Interest</h1>
    <form action="" method="GET" id="form4" onsubmit="return validateDates()">
        <label for="date_one">Arrival Date:</label>
        <input type="date" name="date_one" id="date_one" required>
        <label for="date_two">Departure Date:</label>
        <input type="date" name="date_two" id="date_two" required>
        <select name="activites">
            <option value="">Select a point of interest</option>
            <?php
            $requete = "SELECT * FROM type_activites";
            $reqsql = $mysqlClient->prepare($requete);
            $reqsql->execute();
            while ($restype = $reqsql->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value='" . htmlspecialchars($restype['idtype_activite']) . "'>" . htmlspecialchars($restype['nom_type']) . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Submit">
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
            echo "<h2 class='h2_select'>Details of Selected Activities:</h2>";
            foreach ($activites as $activite) {
                echo "<div class='activites'>";
                if (!empty($activite['image'])) {
                    echo "<img src='../img_activites/" . htmlspecialchars($activite['image']) . "' alt='Image of " . htmlspecialchars($activite['nom_activite']) . "'>";
                }
                echo "<p class='echo'>Category: " . htmlspecialchars($activite['nom_type']) . "</p>";
                echo "<p class='echo'>Name: " . htmlspecialchars($activite['nom_activite']) . "</p>";
                echo "<p class='echo'>City: " . htmlspecialchars($activite['ville']) . "</p>";
                echo "<p class='echo'>Address: " . htmlspecialchars($activite['adresse']) . "</p>";
                echo "<p class='echo'>Postal Code: " . htmlspecialchars($activite['cp']) . "</p>";
                echo "<p class='echo'>Description: " . htmlspecialchars($activite['description_en']) . "</p>"; // Assuming 'description_en' is the column for English descriptions
                echo "<a href='". htmlspecialchars($activite['lien']) ."' target='_blank'>Learn more</a>";
                echo "</div>";
            }
        } else {
            echo "<p>No activities found.</p>";
        }
    }
    include("footer_en.php");
    ?>
</body>
</html>