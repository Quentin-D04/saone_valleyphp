<?php
session_start();
include 'config.php';

if (isset($_GET['chalet']) && is_numeric($_GET['chalet'])) {
    $id = (int) $_GET['chalet'];

    $requete = "SELECT prix FROM chalets WHERE id_chalet = :id_chalet";
    $reqsql = $pdo->prepare($requete);
    $reqsql->bindParam(':id_chalet', $id, PDO::PARAM_INT);
    $reqsql->execute();
    $prix = $reqsql->fetchColumn();

    if ($prix === false) {
        echo "<p style='color:red;'>Chalet non trouvé.</p>";
        exit;
    }
} else {
    echo "<p style='color:red;'>ID de chalet non spécifié ou invalide.</p>";
    exit;
}
include 'header.php';
?>

</head>
<body>
    <div class="containerss">
        <h1>Réservation</h1>
        <form id="reservationForm">
            <label for="name">Nom :</label>
            <input type="text" id="name" required>
            <label for="email">Email :</label>
            <input type="email" id="email" required>
            <label for="phone">Téléphone :</label>
            <input type="tel" id="phone" pattern="[0-9]{10}" required>
            <label for="start_date">Date de début:</label>
            <input type="date" id="start_date" min="<?php echo date('Y-m-d'); ?>" required>
            <label for="end_date">Date de fin:</label>
            <input type="date" id="end_date" required>
            <label for="time">Heure d'arrivée:</label>
            <input type="time" id="time" required>
            <label for="guests">Nombre de personnes :</label>
            <input type="number" id="guests" min="1" required><br>
            <button class="btn_res" type="button" onclick="addToCart()">Ajouter au panier</button>
        </form>
        <div class="cart">
            <h2>Panier</h2>
            <div id="cartItems"></div>
            <button class="btn_res" onclick="submitReservation()">Soumettre la réservation</button>
        </div>
    </div>

    <script>
    let cart = [];

    function addToCart() {
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const phone = document.getElementById('phone').value;
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);
        const time = document.getElementById('time').value;
        const guests = document.getElementById('guests').value;
        const prix = <?php echo $prix; ?>;
        
        const now = new Date();

        if (startDate >= endDate) {
            alert("La date de fin doit être après la date de début.");
            return;
        }

        if (startDate < now) {
            alert("La date de début doit être ultérieure à aujourd'hui.");
            return;
        }

        const days = Math.ceil((endDate - startDate) / (1000 * 60 * 60 * 24));
        const totalPrix = prix * days;
        
        const options = { day: '2-digit', month: 'long', year: 'numeric' };
        const formattedStartDate = startDate.toLocaleDateString('fr-FR', options);
        const formattedEndDate = endDate.toLocaleDateString('fr-FR', options);

        if (name && email && phone && startDate && endDate && time && guests) {
            cart.push({ name, email, phone, startDate: formattedStartDate, endDate: formattedEndDate, time, guests, totalPrix });
            updateCartDisplay();
            document.getElementById('reservationForm').reset();
        } else {
            alert("Veuillez remplir tous les champs.");
        }
    }

    function updateCartDisplay() {
        const cartItems = document.getElementById('cartItems');
        cartItems.innerHTML = '';
        cart.forEach((item, index) => {
            const itemDiv = document.createElement('div');
            itemDiv.className = 'cart-item';
            itemDiv.innerHTML = `
                <span>${item.name} - ${item.startDate} au ${item.endDate} à ${item.time} (${item.guests} pers) - ${item.totalPrix} €</span>
                <button class="btn_res" onclick="editReservation(${index})">Modifier</button>
                <button class="btn_res" onclick="removeFromCart(${index})">Supprimer</button>
            `;
            cartItems.appendChild(itemDiv);
        });
    }

    function editReservation(index) {
        const reservation = cart[index];
        document.getElementById('name').value = reservation.name;
        document.getElementById('email').value = reservation.email;
        document.getElementById('phone').value = reservation.phone;
        document.getElementById('start_date').value = reservation.startDate;
        document.getElementById('end_date').value = reservation.endDate;
        document.getElementById('time').value = reservation.time;
        document.getElementById('guests').value = reservation.guests;
        cart.splice(index, 1);
        updateCartDisplay();
    }

    function removeFromCart(index) {
        cart.splice(index, 1);
        updateCartDisplay();
    }

    function submitReservation() {
        if (cart.length === 0) {
            alert("Votre panier est vide.");
            return;
        }

        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'traitement.php';

        cart.forEach(item => {
            for (const key in item) {
                if (item.hasOwnProperty(key)) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = key + '[]';
                    input.value = item[key];
                    form.appendChild(input);
                }
            }
        });

        document.body.appendChild(form);
        form.submit();

        // Vider le panier après la soumission
        cart = [];
        updateCartDisplay();
    }
    
    window.onload = updateCartDisplay;
    </script>
<?php include 'footer.php'; ?>
</body>
</html>