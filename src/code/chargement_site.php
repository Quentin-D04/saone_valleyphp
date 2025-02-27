<?php

if($_GET['type'] == 'restaurant'){
    $temps_chargement = 2;
    $url = 'restaurant.php';
}elseif($_GET['type'] == 'restaurant_en'){
    $temps_chargement = 2;
    $url = '../english/restaurant_en.php';
}elseif($_GET['type'] == 'nautiques'){
    $temps_chargement = 2;
    $url = 'nautiques.php';
}elseif($_GET['type'] == 'nautiques_en'){
    $temps_chargement = 2;
    $url = '../english/nautiques_en.php';
}elseif($_GET['type'] == 'select'){
    $temps_chargement = 2;
    $url = 'select.php';
}elseif($_GET['type'] == 'select_en'){
    $temps_chargement = 2;
    $url = '../english/select_en.php';
}elseif($_GET['type'] == 'logements'){
    $temps_chargement = 2;
    $url = 'logements.php';
}elseif($_GET['type'] == 'accueil'){
    $temps_chargement = 2;
    $url = 'index.php';
}elseif($_GET['type'] == 'home'){
    $temps_chargement = 2;
    $url = '../english/index_en.php';
}else{
    $temps_chargement = 2;
    $url = 'index.php';
}

header("Refresh: $temps_chargement; url= $url");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chargement...</title>
    <link rel="stylesheet" href="../styles/chargement.css">

</head>
<body>
    <div class="loader">
        <div class="loader-inner">
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
            <div class="loader-line-wrap">
                <div class="loader-line"></div>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
</html>