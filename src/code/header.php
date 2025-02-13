<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/style.css" />
  <title>Domaine Saône Valley</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="index.php"><img src="../assets/img/logo.png" alt="logo de Saône valley"></a>
    </div>
    <nav>
      <ul>
      <li class="menu dropdown">
          <a href="#">Découvrir</a>
          <ul class="submenu">
            <li><a href="restaurant.php">Restaurant</a></li>
            <li><a href="nautiques.php">Activitées nautiques</a></li>
            <li><a href="select.php">Activitées Locales</a></li>
          </ul>
        </li>
        <li class="menu"><a href="index.php#logements">Logements</a></li>
        <li class="menu"><a href="index.php#cartes_cadeaux">Cartes cadeaux</a></li>
        <li class="menu dropdown">
          <a href="#">Langues</a>
          <ul class="submenu">
            <li><a href="index.php#fr"><img src="../assets/img/fr-FR 1.png" alt="drapeau français"></a></li>
            <li><a href="index.php#en"><img src="../assets/img/en-GB 1.png" alt="english flag"></a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <nav class="cdpn-mobile-menu js-cdpn-mobile-menu">
    <div id="cdpn-mobile-menu" class="cdpn-mobile-menu__container">
      <ul class="cdpn-mobile-menu__list ra-list">
        <li>
          <a href="index.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Accueil</span>
          </a>
        </li>
        <li>
          <a href="restaurant.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">restaurant</span>
          </a>
        </li>
        <li>
          <a href="nautiques.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Activités nautiques</span>
          </a>
        </li>
        <li>
          <a href="select.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Activités Locales</span>
          </a>
        </li>
        <li>
          <a href="#0" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Logements</span>
          </a>
        </li>
        <li>
          <a href="#0" class="cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Cartes Cadeaux</span>
          </a>
        </li>
        <li>
          <a href="#0" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group"><img src="../assets/img/fr-FR 1.png" alt=""></span>
          </a>
        </li>
        <li>
          <a href="#0" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group"><img src="../assets/img/en-GB 1.png" alt=""></a>
        </li>
      </ul>
    </div>
    <button class="cdpn-mobile-menu__toggle js-cdpn-mobile-menu__toggle uia-control ra-button" type="button" aria-controls="cdpn-mobile-menu" data-uia-hamburger-skin="2">
      <span class="uia-control__group">
        <span class="cdpn-mobile-menu__hamburger uia-control__icon uia-hamburger">
          <span class="uia-hamburger__group">
            <span class="uia-hamburger__label">
              <span class="js-cdpn-mobile-menu__toggle-hint ha-screen-reader">Open menu</span>
            </span>
          </span>
        </span>
      </span>
    </button>
  </nav>