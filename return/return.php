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
    $result = $commande->select();
    $formData = array(
        "transaction_id" => $result['TRANSID'],
        "amount" => $result['MONTANT'],
        "currency" => $result['CURRENCY'],
        "customer_surname" => $result['BUYERSURNAME'],
        "customer_name" => $result['BUYERNAME'],
        "description" => $result['DESCRIPTION'],
        "channels" => $result['CHANNELS'],
        "customer_email" => $result['EMAIL'],
        "customer_phone_number" => $result['PHONE'],
        "customer_address" => $result['BUYERADDRESS'],
        "customer_city" => $result['CITY'],
        "customer_country" => $result['COUNTRY'],
        "customer_state" => $result['BUYERSTATE'],
        // "customer_zip_code" => $result['CUSTOMER_ZIP_CODE'] // Assurez-vous d'ajuster cela en fonction de votre schéma de base de données
    );

    try {
        $CinetPay = new CinetPay($marchand["site_id"], $marchand["apikey"]);
        $CinetPay->getPayStatus($id_transaction, $marchand["site_id"]);
        $message = $CinetPay->chk_message;
        $code = $CinetPay->chk_code;

        // $commande->getUserByPayment();

        if ($code == '00') {
            echo 'Félicitations, votre paiement a été effectué avec succès. Vous serez redirigé dans quelques secondes.';

            // Construire le message à envoyer sur le canal Telegram
            // Construire le message à envoyer sur le canal Telegram
            $telegramMessage = urlencode(
                "Nouveau paiement reçu ‼ ✅ 🎁

                -Nom:{$formData['customer_name']} {$formData['customer_surname']}
                -💲 Montant:{$formData['amount']} {$formData['currency']}
                -📚 Description:{$formData['description']}
                -📩 Email:{$formData['customer_email']}
                -📲 Téléphone:{$formData['customer_phone_number']}
                -✅ Adresse:{$formData['customer_address']}
                -🗺 Ville:{$formData['customer_city']}
                -🌍 Pays:{$formData['customer_country']}
                -🔻 Région:{$formData['customer_state']}
                -🟢Transaction ID:{$formData['transaction_id']}
                " 
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
            
            die();
        }
    } catch (Exception $e) {
        echo "Erreur :" . $e->getMessage();
    }
} else {
    echo 'Données de paiement non disponibles.';
    die();
}
