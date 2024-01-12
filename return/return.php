<?php
require_once __DIR__ . '/../src/cinetpay.php';
require_once __DIR__ . '/../commande.php';
include('../marchand.php');
include('success_page.php');
include('receipt.php'); // Ajoutez cette ligne pour inclure receipt.php

session_start();

//...
if (isset($_POST['transaction_id']) || isset($_POST['token'])) {
    $commande = new Commande();
    $id_transaction = $_POST['transaction_id'];
    $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
    $currency = isset($_POST['currency']) ? $_POST['currency'] : '';
    $customer_name = isset($_POST['customer_name']) ? $_POST['customer_name'] : '';
    $customer_surname = isset($_POST['customer_surname']) ? $_POST['customer_surname'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $customer_email = isset($_POST['customer_email']) ? $_POST['customer_email'] : '';
    $customer_phone = isset($_POST['customer_phone']) ? $_POST['customer_phone'] : '';
    $customer_address = isset($_POST['customer_address']) ? $_POST['customer_address'] : '';
    $customer_city = isset($_POST['customer_city']) ? $_POST['customer_city'] : '';
    $customer_country = isset($_POST['customer_country']) ? $_POST['customer_country'] : '';
    $customer_state = isset($_POST['customer_state']) ? $_POST['customer_state'] : '';
  // Stocker les variables dans $invoice_data
    $invoice_data = array(
        "Data 1" => "",
        "Data 2" => "",
        "Data 3" => " "
    );

    // var_dump($_POST);

    try {
        $CinetPay = new CinetPay($marchand["site_id"], $marchand["apikey"]);
        $CinetPay->getPayStatus($id_transaction, $marchand["site_id"]);
        $message = $CinetPay->chk_message;
        $code = $CinetPay->chk_code;

        // $commande->getUserByPayment();

        if ($code == '00') {
            echo 'Félicitations, votre paiement a été effectué avec succès. Vous serez redirigé dans quelques secondes.';

            // Construire le message à envoyer sur le canal Telegram
            $telegramMessage = urlencode("Nouveau paiement reçu:
                Nom: $customer_name $customer_surname
                Montant: $amount $currency
                Description: $description
                Email: $customer_email
                Téléphone: $customer_phone
                Adresse: $customer_address
                Ville: $customer_city
                Pays: $customer_country
                Région: $customer_state
                Transaction ID: $id_transaction
                Invoice Data: " . json_encode($invoice_data)

            );

            $apiToken = "6465240701:AAEMjbjOjot0IcMYVjDBhbOLs21pl1RPMdQ";
            $chatId = "@library_ci";
            $telegramUrl = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chatId&text=" . $telegramMessage;
            $response = file_get_contents($telegramUrl);

            if ($response === false) {
                echo "Erreur lors de l'envoi du message Telegram.";
                $response = file_get_contents($telegramUrl);
            } else {
                // Appeler la fonction qui génère le reçu HTML et enregistre le fichier
                $receiptFilePath = generateAndSaveReceipt($customer_name, $customer_surname, $amount, $currency, $description, $customer_email, $customer_phone, $customer_address, $customer_city, $customer_country, $customer_state, $id_transaction);

                // Vous pouvez également rediriger vers la page du reçu si nécessaire
                // header("Location: $receiptFilePath");
                // exit();
            }

            echo '<meta http-equiv="refresh" content="10;url=success_page.php">';
            die();
        } else {
            echo 'Echec, votre paiement a échoué.';
            // $response = file_get_contents($telegramUrl);
            // $receiptFilePath = generateAndSaveReceipt($customer_name, $customer_surname, $amount, $currency, $description, $customer_email, $customer_phone, $customer_address, $customer_city, $customer_country, $customer_state, $id_transaction);
            die();
        }
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }
} else {
    echo 'Données de paiement non disponibles.';
    die();
}
