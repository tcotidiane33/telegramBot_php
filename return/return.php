<?php
require_once __DIR__ . '/../src/cinetpay.php';
require_once __DIR__ . '/../commande.php';
include('../marchand.php');

if (isset($_POST['transaction_id']) || isset($_POST['token'])) {

    $commande = new Commande();
    $id_transaction = $_POST['transaction_id'];


    // Récupérez les informations du client depuis la session
    $customer_name = isset($_SESSION['customer_name']) ? $_SESSION['customer_name'] : '';
    $customer_surname = isset($_SESSION['customer_surname']) ? $_SESSION['customer_surname'] : '';
    $description = isset($_SESSION['description']) ? $_SESSION['description'] : '';
    $amount = isset($_SESSION['amount']) ? $_SESSION['amount'] : '';
    $currency = isset($_SESSION['currency']) ? $_SESSION['currency'] : '';
    $customer_email = isset($_SESSION['customer_email']) ? $_SESSION['customer_email'] : '';
    $customer_phone = isset($_SESSION['customer_phone']) ? $_SESSION['customer_phone'] : '';
    $customer_address = isset($_SESSION['customer_address']) ? $_SESSION['customer_address'] : '';
    $customer_city = isset($_SESSION['customer_city']) ? $_SESSION['customer_city'] : '';
    $customer_country = isset($_SESSION['customer_country']) ? $_SESSION['customer_country'] : '';
    $customer_state = isset($_SESSION['customer_state']) ? $_SESSION['customer_state'] : '';
    try {
        // Verification d'etat de transaction chez CinetPay
        $CinetPay = new CinetPay($marchand["site_id"], $marchand["apikey"]);

        $CinetPay->getPayStatus($id_transaction, $marchand["site_id"]);
        $message = $CinetPay->chk_message;
        $code = $CinetPay->chk_code;

        //recuperer les info du clients pour personnaliser les reponses.
        $commande->getUserByPayment();

        // redirection vers une page en fonction de l'état de la transaction
        // ...
        if ($code == '00') {
            echo 'Félicitations, votre paiement a été effectué avec succès. Vous serez redirigé dans quelques secondes.';
            // Construire le message à envoyer sur le canal Telegram
                    $telegramMessage = "
                    Nouveau paiement reçu‼️
                    ________________________________
                    🟢 Montant: $amount $currency
                    -------------------------------
                    🟢 📚 Description: $description 
                    -------------------------------
                    🟢 Nom du client: $customer_name $customer_surname
                    ________________________________
                    🟢 Email du client: $customer_email
                    ________________________________
                    🟢 Téléphone du client: $customer_phone
                    ________________________________
                    🟢 Adresse du client: $customer_address 
                    ________________________________
                    🟢 Ville du client: $customer_city $customer_country $customer_state
                    ________________________________
                    Transaction_Id: $id_transaction
                ";

                // Construire l'URL de l'API Telegram
                $apiToken = "votre_token_bot"; // Remplacez par le vrai token de votre bot
                $chatId = "@votre_canal"; // Remplacez par le vrai nom de votre canal
                $telegramUrl = "https://api.telegram.org/bot$apiToken/sendMessage?chat_id=$chatId&text=" . urlencode($telegramMessage);

                // Effectuer la requête HTTP POST vers l'API Telegram
                $response = file_get_contents($telegramUrl);

                // Vérifier la réponse (peut être utile pour le débogage)
                if ($response === false) {
                    echo "Erreur lors de l'envoi du message Telegram.";
                } else {
                    echo "Notification Telegram envoyée avec succès.";
                }
            echo '<meta http-equiv="refresh" content="5;url=index.php">';
            die();
        } else {
            echo 'Echec, votre paiement a échoué.';
            // Vous pouvez également fournir des instructions supplémentaires ici.
            die();
        }
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }
} else {
    echo 'transaction_id non transmis';
    die();
}

