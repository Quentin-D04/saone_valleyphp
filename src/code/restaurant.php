<?php include 'bdd.php';   
include 'header_resto.php';
    $requete = "SELECT * FROM restaurant";
    $reqsql = $mysqlClient->prepare($requete);
    $reqsql->execute();
    $carte = $reqsql->fetch(PDO::FETCH_ASSOC);
?>
<main>
    <img src="../assets/img/logo_resto.jpg" alt="logo restaurant l'évasion" class="logo_resto">
    <h1 class="h1_resto">Venez découvrir le nouveau Bar - Restaurant L'ÉVASION du Domaine Saône-Valley !</h1>
    <a class="carte" href="../img_cartes/<?php echo htmlspecialchars($carte['carte']); ?>" download="carte.pdf">Télécharger le PDF</a>
    <div class="horaires-container">
        <span class="line"></span>
        <div class="title-container">
            <span class="title">Nos horaires</span>
            <img src="../assets/img/feuille.jpg" alt="Décoration feuille" class="decoration">
        </div>
        <span class="line"></span>
    </div>
    <div class="heures_images">
        <ul class="horaires_resto">
            <li>Lundi<br>Mardi<br>Mercredi<br>Jeudi<br>Vendredi<br>Samedi<br>Dimanche</li>
            <li class="heures">Fermé<br>11:45-13:30<br>11:45-13:30<br>11:45-13:30, 19:00-21:00<br>11:45-13:30, 19:00-22:00<br>11:45-13:30, 19:00-21:00<br>11:45-13:30, 19:00-21:00</li>
        </ul>
        <img class="terrasse" src="../assets/img/terrasse-restaurant.jpg" alt="">
    </div>
    <div class="horaires-container">
        <span class="line"></span>
        <div class="title-container">
            <span class="title">Nos contacts</span>
            <img src="../assets/img/feuille.jpg" alt="Décoration feuille" class="decoration">
        </div>
        <span class="line"></span>
    </div>
    <div class="reseaux">
        <ul class="suivre">
            <li>
                <h3 class="h3_resto">Suivez-nous !</h3>
            </li>
            <li class="insta"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 0C10.925 0 10.4162 0.01875 8.81625 0.09C7.21875 0.165 6.13125 0.41625 5.175 0.7875C4.18875 1.17 3.35125 1.68375 2.5175 2.5175C1.68375 3.35125 1.16875 4.1875 0.7875 5.175C0.41625 6.13125 0.16375 7.21875 0.09 8.81625C0.015 10.4162 0 10.925 0 15C0 19.075 0.01875 19.5838 0.09 21.1838C0.165 22.78 0.41625 23.8688 0.7875 24.825C1.16411 25.8261 1.7545 26.733 2.5175 27.4825C3.2666 28.246 4.17362 28.8365 5.175 29.2125C6.1325 29.5825 7.22 29.8362 8.81625 29.91C10.4162 29.985 10.925 30 15 30C19.075 30 19.5838 29.9812 21.1838 29.91C22.78 29.835 23.8688 29.5825 24.825 29.2125C25.8258 28.8354 26.7326 28.2451 27.4825 27.4825C28.2463 26.7336 28.8368 25.8265 29.2125 24.825C29.5825 23.8688 29.8362 22.78 29.91 21.1838C29.985 19.5838 30 19.075 30 15C30 10.925 29.9812 10.4162 29.91 8.81625C29.835 7.22 29.5825 6.13 29.2125 5.175C28.8357 4.17402 28.2453 3.26716 27.4825 2.5175C26.7339 1.7533 25.8268 1.16274 24.825 0.7875C23.8688 0.41625 22.78 0.16375 21.1838 0.09C19.5838 0.015 19.075 0 15 0ZM15 2.7C19.0038 2.7 19.4813 2.72 21.0625 2.78875C22.525 2.8575 23.3187 3.1 23.8462 3.3075C24.5487 3.57875 25.0462 3.90375 25.5737 4.4275C26.0975 4.9525 26.4225 5.45125 26.6937 6.15375C26.8987 6.68125 27.1437 7.475 27.21 8.9375C27.2812 10.52 27.2975 10.995 27.2975 15C27.2975 19.005 27.2787 19.4813 27.205 21.0625C27.1287 22.525 26.885 23.3187 26.6788 23.8462C26.4347 24.4972 26.0512 25.0868 25.555 25.5737C25.0702 26.0704 24.4809 26.4529 23.83 26.6937C23.305 26.8987 22.4988 27.1437 21.0363 27.21C19.4438 27.2812 18.975 27.2975 14.9625 27.2975C10.9488 27.2975 10.48 27.2787 8.88875 27.205C7.425 27.1287 6.61875 26.885 6.09375 26.6788C5.44238 26.4377 4.85335 26.0537 4.37 25.555C3.86823 25.0734 3.48339 24.4833 3.245 23.83C3.03875 23.305 2.79625 22.4988 2.72 21.0363C2.66375 19.4613 2.64375 18.975 2.64375 14.9812C2.64375 10.9862 2.66375 10.4988 2.72 8.905C2.79625 7.4425 3.03875 6.6375 3.245 6.1125C3.5075 5.4 3.84375 4.9125 4.37 4.38625C4.89375 3.8625 5.3825 3.525 6.09375 3.26375C6.61875 3.05625 7.4075 2.8125 8.87 2.7375C10.4638 2.68125 10.9325 2.6625 14.9437 2.6625L15 2.7ZM15 7.2975C13.9885 7.2975 12.9869 7.49673 12.0524 7.88382C11.1179 8.27091 10.2688 8.83827 9.55351 9.55351C8.83827 10.2688 8.2709 11.1179 7.88382 12.0524C7.49673 12.9869 7.2975 13.9885 7.2975 15C7.2975 16.0115 7.49673 17.0131 7.88382 17.9476C8.2709 18.8821 8.83827 19.7312 9.55351 20.4465C10.2688 21.1617 11.1179 21.7291 12.0524 22.1162C12.9869 22.5033 13.9885 22.7025 15 22.7025C17.0428 22.7025 19.002 21.891 20.4465 20.4465C21.891 19.002 22.7025 17.0428 22.7025 15C22.7025 12.9572 21.891 10.998 20.4465 9.55351C19.002 8.10901 17.0428 7.2975 15 7.2975ZM15 20C12.2375 20 10 17.7625 10 15C10 12.2375 12.2375 10 15 10C17.7625 10 20 12.2375 20 15C20 17.7625 17.7625 20 15 20ZM24.8075 6.99375C24.7901 7.45953 24.5929 7.90045 24.2572 8.22384C23.9216 8.54723 23.4736 8.72791 23.0075 8.72791C22.5414 8.72791 22.0934 8.54723 21.7578 8.22384C21.4221 7.90045 21.2249 7.45953 21.2075 6.99375C21.2075 6.51636 21.3971 6.05852 21.7347 5.72096C22.0723 5.38339 22.5301 5.19375 23.0075 5.19375C23.4849 5.19375 23.9427 5.38339 24.2803 5.72096C24.6179 6.05852 24.8075 6.51636 24.8075 6.99375Z" fill="#2B3C58" />
                </svg>levasion_barrestaurant</li>
            <li class="facebook"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.5088 30H19.8905C19.8233 27.3868 19.7385 23.6341 19.6926 20.514L23.8127 20.4313L24.5972 15.7584L19.6714 16.1179C19.7597 12.3005 20.4558 11.5816 22.894 11.5816C23.6572 11.5816 24.4417 11.5816 24.9611 11.5816V6.72178C23.6036 6.53929 22.2349 6.4564 20.8657 6.47376C15.8481 6.47376 14.2827 9.66211 14.2827 15.9849V16.4666L11.7491 16.6427L11.7138 20.6686L14.2721 20.6183C14.2721 23.9396 14.2438 27.4479 14.2332 29.9065C12.0742 29.8598 9.94346 29.8131 8.22615 29.8131C1.75618 29.8131 0 25.9202 0 20.9705C0 16.0208 0.0954052 10.5464 0.0954052 8.67002C0.0954052 3.10928 2.5159 0.0215677 8.5159 0.0215677C10.735 0.0215677 19.0813 0 21.9223 0C27.3816 0 30 2.29331 30 9.00791C30 10.665 29.8799 13.7671 29.8799 22.3688C29.8693 27.7786 27.3569 30 20.5088 30Z" fill="#2B3C58" />
                </svg>L’Évasion Bar-Restaurant
            </li>
        </ul>
        <ul class="suivre">
            <li>
                <h3 class="h3_restos">Contactez-nous !</h3>
            </li>
            <li class="instagram"><svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_94_277)">
                        <path d="M27.4492 18.7837L22.5891 16.2872C21.3994 15.674 19.861 15.8831 18.8748 16.7897L18.3076 17.309C17.7573 17.8153 16.8994 17.9325 16.2329 17.5875C14.5754 16.7344 13.2498 15.4088 12.3957 13.755C12.0461 13.0762 12.1576 12.2437 12.676 11.6812L13.1964 11.115C13.7541 10.5084 14.0607 9.72093 14.0607 8.89877C14.0607 8.38127 13.9351 7.86377 13.6979 7.4025L11.1986 2.54627C10.3895 0.976863 8.79101 0 7.02758 0C5.99072 0 5.00822 0.331912 4.18694 0.959069L2.70949 2.08593C0.389198 3.85407 -0.564282 6.9075 0.334787 9.68343C3.32915 18.9178 10.5864 26.3653 19.7476 29.6063C20.4873 29.8678 21.2607 30 22.0454 30C23.8801 30 25.6689 29.2547 26.9542 27.9525L28.6464 26.2416C29.5201 25.3584 30.0001 24.1903 30.0001 22.9519C30.0001 21.1884 29.0223 19.5919 27.4492 18.7837ZM26.6439 24.2672L24.9526 25.9781C23.867 27.0769 22.1476 27.4734 20.6851 26.9559C12.3441 24.0066 5.73665 17.2247 3.01042 8.81721C2.47886 7.17377 3.04229 5.36721 4.41572 4.32L5.89415 3.19221C6.22136 2.94284 6.61322 2.81064 7.02758 2.81064C7.73258 2.81064 8.37288 3.20157 8.69631 3.8325L11.1947 8.68873C11.2285 8.75436 11.2463 8.82559 11.2463 8.89966C11.2463 9.04966 11.1788 9.15373 11.1217 9.21559L10.6023 9.78088C9.29165 11.2059 9.00758 13.32 9.89543 15.0422C11.0167 17.219 12.7642 18.9627 14.9439 20.0859C16.6361 20.9577 18.8092 20.6644 20.2089 19.38L20.777 18.8587C20.8689 18.7743 21.1069 18.6862 21.3039 18.7865L26.1639 21.2831C26.7958 21.6075 27.1876 22.2468 27.1876 22.9519C27.1867 23.4459 26.9936 23.9128 26.6439 24.2672Z" fill="#2B3C58" />
                    </g>
                    <defs>
                        <clipPath id="clip0_94_277">
                            <rect width="30" height="30" fill="white" />
                        </clipPath>
                    </defs>
                </svg><a class="tel" href="tel:+33 7 49 16 85 62">07 49 16 85 62</a></li>
            <li class="facebook"><svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.2832 6.15174C17.9761 6.11953 17.7071 6.33131 17.6744 6.62574L17.6351 6.98035C16.9765 6.55036 16.075 6.51873 15.2126 6.88893C14.4592 7.21181 13.8141 7.88431 13.3905 8.6833C12.9668 9.48244 12.7617 10.4137 12.8946 11.2587C12.9944 11.8936 13.2776 12.4186 13.7154 12.8052C14.1529 13.1916 14.742 13.4373 15.4504 13.5189L15.4505 13.5189C16.0906 13.5921 16.8711 13.4166 17.4623 13.013C17.5433 13.1184 17.6365 13.2147 17.7396 13.2971L17.7396 13.2971C18.1687 13.6392 18.7318 13.7354 19.3225 13.5717L19.3225 13.5717C19.8403 13.4277 20.331 13.0637 20.7298 12.6195C21.1288 12.1751 21.4396 11.646 21.5954 11.1657L21.5954 11.1657C22.4282 8.59515 21.7648 6.95214 21.0557 6.02554L21.0201 6.05282L21.0557 6.02554C20.0828 4.75424 18.3844 3.99907 16.516 3.99907H16.5146C14.0938 3.99907 12.0349 5.2127 10.8681 7.32743L10.8681 7.32744C9.70632 9.43344 9.74887 11.9269 10.9846 13.6797C12.0702 15.2197 13.9451 16.0326 16.3266 16.0326C16.7121 16.0327 17.1109 16.0113 17.522 15.9684C17.824 15.9369 18.0455 15.6748 18.0122 15.3798C17.9789 15.0848 17.705 14.8766 17.4027 14.9068L17.4025 14.9069C14.1506 15.2456 12.6153 14.0946 11.8994 13.0792C10.896 11.6557 10.8709 9.59519 11.8448 7.82947C12.8139 6.07313 14.5149 5.06691 16.5146 5.06691H16.5161C18.0415 5.06691 19.4043 5.66524 20.1654 6.6598L20.2051 6.62941L20.1654 6.6598C20.9581 7.69538 21.0923 9.14017 20.539 10.8471L20.539 10.8471C20.4324 11.1762 20.2037 11.5597 19.9234 11.8828C19.6423 12.2067 19.3155 12.4625 19.0161 12.5457L19.016 12.5458C18.7706 12.6147 18.5867 12.5871 18.4448 12.4742L18.4137 12.5133M18.2832 6.15174C18.5852 6.18253 18.8072 6.4441 18.7745 6.73919C18.7745 6.73922 18.7745 6.73926 18.7745 6.7393L18.2232 12.0395L18.2231 12.0403L18.2231 12.0404C18.2227 12.0449 18.2222 12.0507 18.2212 12.057C18.2198 12.0919 18.2321 12.1612 18.2678 12.241C18.3037 12.3213 18.3612 12.4074 18.4449 12.4743L18.4137 12.5133M18.2832 6.15174C18.2832 6.15174 18.2832 6.15175 18.2833 6.15175L18.2781 6.20133L18.2831 6.15173C18.2831 6.15174 18.2832 6.15174 18.2832 6.15174ZM18.4137 12.5133C18.5719 12.6393 18.7739 12.6657 19.0295 12.5939L18.1734 12.0351C18.1729 12.0408 18.1724 12.046 18.1714 12.0517C18.166 12.1412 18.2313 12.3675 18.4137 12.5133ZM17.0342 7.87764L17.0342 7.87766C17.3307 8.08249 17.468 8.45678 17.4164 8.97677L17.1311 11.8396C16.9914 12.0536 16.7406 12.223 16.4543 12.3321C16.1641 12.4427 15.8442 12.4886 15.5811 12.4588C15.1094 12.4044 14.7431 12.2615 14.4795 12.0356C14.2166 11.8103 14.0516 11.4988 13.9887 11.0987C13.8939 10.4959 14.0488 9.79935 14.3616 9.1955C14.6745 8.59133 15.1413 8.08771 15.662 7.86453C15.915 7.75609 16.1698 7.70246 16.4026 7.70246C16.648 7.70246 16.8674 7.76226 17.0342 7.87764Z" fill="#2B3C58" stroke="#2B3C58" stroke-width="0.1" />
                    <path d="M29.8703 10.7788L29.8703 10.7787L26.3367 8.67487V1.48387C26.3367 1.06951 25.9904 0.75 25.5834 0.75H6.17455C5.76793 0.75 5.42128 1.06943 5.42128 1.48387V8.60891C3.74184 9.62953 2.59314 10.3856 2.03156 10.8475C1.20554 11.5265 0.75 12.4971 0.75 13.5729V27.6172C0.749946 29.6297 2.44961 31.25 4.51822 31.25H27.482C28.4894 31.25 29.4051 30.8651 30.0822 30.2411C30.0891 30.2356 30.0967 30.2291 30.1043 30.2214L30.1044 30.2214L30.108 30.2175C30.1086 30.217 30.1092 30.2164 30.1097 30.2158C30.8099 29.5575 31.25 28.6376 31.25 27.6172V13.5729C31.2501 12.6902 30.909 11.3976 29.8703 10.7788ZM15.5076 23.2642L15.5077 23.2644C15.6498 23.3833 15.8254 23.4417 15.9989 23.4417C16.1723 23.4417 16.3484 23.3834 16.4906 23.2638C16.4906 23.2637 16.4907 23.2637 16.4907 23.2637L19.0515 21.1162L28.3496 29.6098C28.0817 29.7198 27.7897 29.7823 27.482 29.7823H4.51822C4.41471 29.7823 4.31279 29.774 4.21226 29.7589L13.3091 21.4215L15.5076 23.2642ZM26.3367 13.0705V10.395L28.2025 11.5058L26.3367 13.0705ZM29.4384 12.4059C29.6394 12.7316 29.7435 13.1739 29.7435 13.5729V27.6172C29.7435 27.9816 29.6466 28.3246 29.4768 28.6275L20.1999 20.1531L29.4384 12.4059ZM6.92783 2.21774H24.8301V14.3335L15.999 21.7396L6.92778 14.1359L6.92783 2.21774ZM5.42128 10.3438V12.8739L3.71749 11.4458C4.15311 11.1465 4.72447 10.7768 5.42128 10.3438ZM2.25651 27.6172V13.5729C2.25651 13.1444 2.37287 12.7631 2.5897 12.437L12.1607 20.459L2.81175 29.0275C2.46569 28.6465 2.25651 28.1548 2.25651 27.6172Z" fill="#2B3C58" stroke="#2B3C58" stroke-width="0.5" />
                </svg><a class="mailto" href="mailto:barrestaurant.levasion@gmail.com">barrestaurant.levasion@gmail.com</a>
            </li>
        </ul>

    </div>
</main>
<?php include 'footer_resto.php' ?>