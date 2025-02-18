<?php include 'header_en.php'; ?>
<div class="carousel">
    <div class="carousel-track">
        <img src="../assets/img/domaine 1 (1).png" alt="Image 1">
        <img src="../assets/img/domaine 1 (2).png" alt="Image 2">
        <img src="../assets/img/domaine 1 (3).png" alt="Image 3">
    </div>
</div>
<main>
    <h1>Saône Valley Domain</h1>
    <img src="../assets/img/branche.png" alt="" class="branche">
    <form id="dispo" action="" method="post">
        <label for="Date_one">Arrival Date</label>
        <input type="date" id="Date_one" name="Date_one" required><br>
        <label for="Date_two">Departure Date</label>
        <input type="date" id="Date_two" name="Date_two" required><br>
        <input type="number" id="adultes" name="adultes" placeholder="Adults" required><br>
        <input type="number" id="enfants" name="enfants" placeholder="Children" required><br>
        <input type="number" id="hebergements" name="hebergements" placeholder="Accommodations" required><br>
        <div class="btnform">
            <input type="submit" value="Send" class="btn_form">
        </div>
    </form>
    <h2 class="h2_accueil">Experience unforgettable moments like nowhere else!</h2>
    <p class="p_accueil">On more than 5 hectares, in the heart of the Saône Valley, in a preserved natural environment, on the edge of a private water body and the enchanting waters of the Saône, the Saône-Valley Domain welcomes you all year round to experience unique holidays.</p>
    <div class="offres">
        <h2 class="h2_accueil2">Special Offers</h2>
        <img src="../assets/img/Capture d'écran 2025-02-03 111130.png" alt="special offer" class="offre">
        <a class="btn_offre" href="index.php#offres">Discover</a>
    </div>
    <h2 class="h2_accueil3">Our Comfort, Our Services</h2>
    <div class="options">
        <ul class="list_op">
            <li>Fishing</li>
            <li>Pets Allowed</li>
            <li>Playground</li>
        </ul>
        <ul class="list_op">
            <li>Booking of Additional Services</li>
            <li>View of River or Pond</li>
            <li>Bocce Court</li>
        </ul>
        <ul class="list_op">
            <li>Mini Golf</li>
            <li>Bar</li>
            <li>Restaurant</li>
        </ul>
    </div>
</main>
<?php include 'footer_en.php'; ?>