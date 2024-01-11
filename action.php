<?php
/*Commenter ses deux lines si vous êtes en production*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

// required libs
require_once __DIR__ . '/src/cinetpay.php';
include('marchand.php');
include('commande.php');

// Vérifiez si le formulaire a été soumis
if (isset($_POST['valider'])) {
    // Récupérez les informations du client depuis le formulaire
    $_SESSION['customer_name'] = $_POST['customer_name'];
    $_SESSION['customer_surname'] = $_POST['customer_surname'];
    $_SESSION['description'] = $_POST['description'];
    $_SESSION['amount'] = $_POST['amount'];
    $_SESSION['currency'] = $_POST['currency'];
    $_SESSION['customer_email'] = $_POST['customer_email'];
    $_SESSION['customer_phone'] = $_POST['customer_phone_number'];
    $_SESSION['customer_address'] = $_POST['customer_address'];
    $_SESSION['customer_city'] = $_POST['customer_city'];
    $_SESSION['customer_country'] = $_POST['customer_country'];
    $_SESSION['customer_state'] = $_POST['customer_state'];
    // Ajoutez d'autres informations du client selon vos besoins

    // Effectuez d'autres actions nécessaires, par exemple, la redirection vers la passerelle de paiement
} else {
    echo "Veuillez passer par le formulaire";
}
// La class gère la table "Commande"( A titre d'exemple)
$commande = new Commande();
try {
    if(isset($_POST['valider']))
    {
        $customer_name = $_POST['customer_name'];
        $customer_surname = $_POST['customer_surname'];
        $description = isset($_POST['bookDetails']) ? $_POST['bookDetails'] : '';
        $amount = isset($_POST['amount']) ? $_POST['amount'] : '';
        $currency = $_POST['currency'];
        $customer_email = $_POST['customer_email'];
        $customer_phone = $_POST['customer_phone'];	
        $customer_address = $_POST['customer_address'];
        $customer_city = $_POST['customer_city'];
        $customer_country = $_POST['customer_country'];
        $customer_state = $_POST['customer_state'];

    }
    else{
        echo "Veuillez passer par le formulaire";
    }
    //transaction id
    $id_transaction = date("YmdHis"); // or $id_transaction = Cinetpay::generateTransId()

    //Veuillez entrer votre apiKey
    $apikey = $marchand["apikey"];
    //Veuillez entrer votre siteId
    $site_id = $marchand["site_id"];

    //notify url
    $notify_url = $commande->getCurrentUrl().'cinetpay/notify/notify.php';
    //return url
    $return_url = $commande->getCurrentUrl().'cinetpay/return/return.php';
    $channels = "ALL";
    
    /*information supplémentaire que vous voulez afficher
     sur la facture de CinetPay(Supporte trois variables 
     que vous nommez à votre convenance)*/
    $invoice_data = array(
        "Data 1" => "",
        "Data 2" => "",
        "Data 3" => ""
    );

    //
    $formData = array(
        "transaction_id"=> $id_transaction,
        "amount"=> $amount,
        "currency"=> $currency,
        "customer_surname"=> $customer_name,
        "customer_name"=> $customer_surname,
        "description"=> $description,
        "notify_url" => $notify_url,
        "return_url" => $return_url,
        "channels" => $channels,
        "invoice_data" => $invoice_data,
        //pour afficher le paiement par carte de credit
        "customer_email" => "support@kondronetworks.com", //l'email du client
        "customer_phone_number" => "002250769469844", //Le numéro de téléphone du client
        "customer_address" => "Abidjan Cocody RI13", //l'adresse du client
        "customer_city" => "Abidjan", // ville du client
        "customer_country" => "CI",//Le pays du client, la valeur à envoyer est le code ISO du pays (code à deux chiffre) ex : CI, BF, US, CA, FR
        "customer_state" => "Lagunes", //L’état dans de la quel se trouve le client. Cette valeur est obligatoire si le client se trouve au États Unis d’Amérique (US) ou au Canada (CA)
        "customer_zip_code" => "01" //Le code postal du client 
    );
    // enregistrer la transaction dans votre base de donnée
    /*  $commande->create(); */

    $CinetPay = new CinetPay($site_id, $apikey , $VerifySsl=false);//$VerifySsl=true <=> Pour activerr la verification ssl sur curl 
    $result = $CinetPay->generatePaymentLink($formData);

    if ($result["code"] == '201')
    {
        $url = $result["data"]["payment_url"];

        // ajouter le token à la transaction enregistré
        // $commande->update(); 
        //redirection vers l'url de paiement
        header('Location:'.$url);

    }
} catch (Exception $e) {
    echo $e->getMessage();
}

