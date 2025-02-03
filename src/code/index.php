<?php include 'header.php'; ?>
<div class="carousel">
    <div class="carousel-track">
        <img src="..//assets/img/domaine 1 (1).png" alt="Image 1">
        <img src="../assets/img/domaine 1 (2).png" alt="Image 2">
        <img src="../assets/img/domaine 1 (3).png" alt="Image 3">
    </div>
</div>
<main>
    <h1>Domaine Saône Valley</h1>
    <img src="../assets/img/branche.png" alt="" class="branche">
    <form id="dispo" action="" method="post">
        <label for="Date_one">Date d'arrivée</label>
        <input type="date" id="Date_one" name="Date_one" required><br>
        <label for="Date_two">Date de départ</label>
        <input type="date" id="Date_two" name="Date_two" required><br>
        <input type="number" id="adultes" name="adultes" placeholder="Adultes" required><br>
        <input type="number" id="enfants" name="enfants" placeholder="Enfants" required><br>
        <input type="number" id="hebergements" name="hebergements" placeholder="hébergements" required><br>
        <div class="btnform">
            <input type="submit" value="Envoyer" class="btn_form">
        </div>
    </form>
    >
    <h2 class="h2_accueil">Vivez des moments inoubliables comme nulle part ailleurs !</h2>
    <p class="p_accueil">Sur plus de 5 hectares, au cœur de la Vallée de la Saône, dans un milieu naturel préservé, en bordure d'un plan d'eau privatif et des eaux enchanteresses de la Saône, le Domaine Saône-Valley vous accueille toute l'année pour vivre des vacances uniques.</p>
    <div class="offres">
        <h2 class="h2_accueil2">offres Spéciales</h2>
        <img src="../assets/img/Capture d'écran 2025-02-03 111130.png" alt="offre spéciale" class="offre">
    </div>
</main>
<?php include 'footer.php'; ?>