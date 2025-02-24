<?php
// chargement.php

// Définir le temps de chargement en secondes
$temps_chargement = 2;

// Rediriger vers une autre page après le temps de chargement
header("Refresh: $temps_chargement; url=../admin/dashboard.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chargement en cours...</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .loader {
            font-size: 90px;
            font-weight: bold;
            color: #A4C868;
            animation: spin 2s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .loading-text {
            margin-top: 20px;
            font-size: 1.5em;
            color: #A4C868;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="loader">S</div>
        <div class="loading-text">Chargement de votre espace en cours...</div>
    </div>
</body>
</html>