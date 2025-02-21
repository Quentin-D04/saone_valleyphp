<?php 
include '../code/bdd.php';   
include 'header_resto_en.php';

// Requête pour récupérer les informations du restaurant
$query = "SELECT * FROM restaurant WHERE langue = 'anglais'"; 
$reqsql = $mysqlClient->prepare($query);
$reqsql->execute();
$carte = $reqsql->fetch(PDO::FETCH_ASSOC);

// Vérification des clés
$carteLangue = isset($carte['langue']) ? $carte['langue'] : '';
$carteFichier = isset($carte['carte']) ? $carte['carte'] : '';

?>

<main>
    <img src="../assets/img/logo_resto.jpg" alt="L'Évasion restaurant logo" class="logo_resto">
    <h1 class="h1_resto">Come and discover the new Bar - Restaurant L'ÉVASION at Domaine Saône-Valley!</h1>

    <?php if ($carteLangue === 'anglais' && !empty($carteFichier)) : ?>
        <a class="carte" href="../img_cartes/<?php echo htmlspecialchars($carteFichier); ?>" download="carte_en.pdf">
           Download the menu
        </a>
    <?php endif; ?>

    <div class="horaires-container">
        <span class="line"></span>
        <div class="title-container">
            <span class="title">Our Opening Hours</span>
            <img src="../assets/img/feuille.jpg" alt="Leaf decoration" class="decoration">
        </div>
        <span class="line"></span>
    </div>

    <div class="heures_images">
        <ul class="horaires_resto">
            <li>Monday<br>Tuesday<br>Wednesday<br>Thursday<br>Friday<br>Saturday<br>Sunday</li>
            <li class="heures">
                Closed<br>11:45 AM - 1:30 PM<br>11:45 AM - 1:30 PM<br>
                11:45 AM - 1:30 PM, 7:00 PM - 9:00 PM<br>
                11:45 AM - 1:30 PM, 7:00 PM - 10:00 PM<br>
                11:45 AM - 1:30 PM, 7:00 PM - 9:00 PM<br>
                11:45 AM - 1:30 PM, 7:00 PM - 9:00 PM
            </li>
        </ul>
        <img class="terrasse" src="../assets/img/terrasse-restaurant.jpg" alt="Terrasse du restaurant">
    </div>

    <div class="horaires-container">
        <span class="line"></span>
        <div class="title-container">
            <span class="title">Our Contacts</span>
            <img src="../assets/img/feuille.jpg" alt="Leaf decoration" class="decoration">
        </div>
        <span class="line"></span>
    </div>

    <div class="reseaux">
        <ul class="suivre">
            <li><h3 class="h3_resto">Follow us!</h3></li>
            <li class="insta">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="..." fill="#2B3C58" />
                </svg>levasion_barrestaurant
            </li>
            <li class="facebook">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="..." fill="#2B3C58" />
                </svg>L'Évasion Bar-Restaurant
            </li>
        </ul>

        <ul class="suivre">
            <li><h3 class="h3_restos">Contact us!</h3></li>
            <li class="instagram">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_94_277)">
                        <path d="..." fill="#2B3C58" />
                    </g>
                </svg>+33 6 12 34 56 78
            </li>
            <li class="email">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="..." fill="#2B3C58" />
                </svg>contact@levasion.com
            </li>
        </ul>
    </div>
</main>

<?php include 'footer_resto_en.php'; ?>
