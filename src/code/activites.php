<?php
include("config.php");
?>
<html>
<h1>Liste des activités</h1>

<table border="1" class="table">
<tr><td>Nom de l'activité</td><td>type d'activité</td><td>Ville</td><td>Adresse</td><td>Code Postal</td><td>Description</td><td>Image</td></</tr>
<?php
$requete="SELECT * FROM activites inner join type_activites on activites.idtype_activite = type_activites.idtype_activite";
$reqsql = $mysqlClient->prepare($requete);
$reqsql->execute();
while($resactivites = $reqsql->fetch(PDO::FETCH_ASSOC)){
   $resactivites['idactivite'];
    echo "<tr><td>".$resactivites['nom_activite']."</td><td>".$resactivites['nom_type']."</td><td>".$resactivites['ville']."</td><td>".$resactivites['adresse']."</td><td>".$resactivites['cp']."</td><td>".$resactivites['description']."</td><td>".$resactivites['image']."</td></tr>";
}
?>
</table>
</body>
</html>