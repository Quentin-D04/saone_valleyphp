<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'config.php';
session_start();

if ($_POST && !empty($_POST['name'])) {
    try {
        $reqsql = $pdo->prepare("
            INSERT INTO reservations (name, email, phone, start_date, end_date, time, guests)
            VALUES (:name, :email, :phone, :start_date, :end_date, :time, :guests)
        ");

        $currentDate = date('Y-m-d');

        foreach ($_POST['name'] as $index => $name) {
            $startDate = date('Y-m-d', strtotime($_POST['startDate'][$index]));
            
            if ($startDate < $currentDate) {
                header('Location: error.php?error=La date de début ne peut pas être antérieure à aujourd\'hui.');
                exit;
            }

            $endDate = date('Y-m-d', strtotime($_POST['endDate'][$index]));
            
            if ($startDate >= $endDate) {
                header('Location: error.php?error=La date de fin doit être après la date de début.');
                exit;
            }

            $reqsql->execute([
                ':name' => $name,
                ':email' => $_POST['email'][$index],
                ':phone' => $_POST['phone'][$index],
                ':start_date' => $startDate,
                ':end_date' => $endDate,
                ':time' => $_POST['time'][$index],
                ':guests' => $_POST['guests'][$index]
            ]);
        }


        header('Location: valid.php');
        exit;

    } catch (PDOException $e) {

        header('Location: error.php?error=' . urlencode('Erreur : ' . $e->getMessage()));
        exit;
    }
} else {
    header('Location: error.php?error=Erreur : Données invalides.');
    exit;
}
?>