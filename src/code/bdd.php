<?php

$base="saone_valley";
$host="localhost";
$user="root";
$pass="root";

try
{

$mysqlClient = new PDO("mysql:host={$host};dbname={$base};", $user, $pass);
}
catch(Exception $e)
{

        die('Erreur : '.$e->getMessage());
}
?>