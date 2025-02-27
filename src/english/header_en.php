<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../styles/style.css" />
  <title>Saône Valley Domain</title>
</head>

<body>
  <header>
    <div class="logo">
      <a href="../code/chargement_site.php?type=home"><img src="../assets/img/logo.png" alt="Saône Valley logo"></a>
    </div>
    <nav>
      <ul>
        <li class="menu dropdown">
          <a href="#">Discover</a>
          <ul class="submenu">
            <li><a href="../code/chargement_site.php?type=restaurant_en">Restaurant</a></li>
            <li><a href="../code/chargement_site.php?type=nautiques_en">Water Activities</a></li>
            <li><a href="../code/chargement_site.php?type=select_en">Local Activities</a></li>
          </ul>
        </li>
        <li class="menu"><a href="index.php#logements">Housing</a></li>
        <li class="menu"><a href="index.php#cartes_cadeaux">Gift Cards</a></li>
        <li class="menu dropdown">
          <a href="#">Languages</a>
          <ul class="submenu">
            <li><a href="../code/index.php"><img src="../assets/img/fr-FR 1.png" alt="French flag"></a></li>
            <li><a href="index_en.php"><img src="../assets/img/en-GB 1.png" alt="English flag"></a></li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>
  <nav class="cdpn-mobile-menu js-cdpn-mobile-menu">
    <div id="cdpn-mobile-menu" class="cdpn-mobile-menu__container">
      <ul class="cdpn-mobile-menu__list ra-list">
        <li>
          <a href="index_en.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Home</span>
          </a>
        </li>
        <li>
          <a href="restaurant_en.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Restaurant</span>
          </a>
        </li>
        <li>
          <a href="nautiques_en.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Water Activities</span>
          </a>
        </li>
        <li>
          <a href="select_en.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Local Activities</span>
          </a>
        </li>
        <li>
          <a href="#0" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Accommodations</span>
          </a>
        </li>
        <li>
          <a href="#0" class="cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group">Gift Cards</span>
          </a>
        </li>
        <li>
          <a href="../code/index.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group"><img src="../assets/img/fr-FR 1.png" alt="French flag"></span>
          </a>
        </li>
        <li>
          <a href="index_en.php" class="js-cdpn-mobile-menu__link uia-control ra-link">
            <span class="uia-control__group"><img src="../assets/img/en-GB 1.png" alt="English flag"></span>
          </a>
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
</body>
</html>