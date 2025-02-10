<?php

$base="saone_valley";
$host="localhost";
$user="root";
$pass="root";

try
{
// On se connecte à MySQL
$mysqlClient = new PDO("mysql:host={$host};dbname={$base};", $user, $pass);
}
catch(Exception $e)
{
// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>