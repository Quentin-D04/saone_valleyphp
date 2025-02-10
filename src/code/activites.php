<?php
include("config.php");
?>
<html>
<h1>Liste des activités</h1>

<table border="1" class="table">
<tr><td>Nom de l'activité</td><td>Ville</td><td>Adresse</td><td>Code Postal</td><td>Description</td></tr>
<?php
$requete="SELECT * FROM activites";
$reqsql = $mysqlClient->prepare($requete);
$reqsql->execute();
while($resactivites = $reqsql->fetch(PDO::FETCH_ASSOC)){
   $resactivites['idactivite'];
    echo "<tr><td>".$resactivites['nom_activite']."</td><td>".$resactivites['ville']."</td><td>".$resactivites['adresse']."</td><td>".$resactivites['cp']."</td><td>".$resactivites['description']."</td></tr>";
}
?>
</table>

</html>