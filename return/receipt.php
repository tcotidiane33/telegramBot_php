<?php

function generateAndSaveReceipt($customer_name, $customer_surname, $amount, $currency, $description, $customer_email, $customer_phone, $customer_address, $customer_city, $customer_country, $customer_state, $id_transaction)
{
// Récupérer les données de $invoice_data
$invoice_data = array(
    "Data 1" => "",
    "Data 2" => "",
    "Data 3" => " "
);  // Générer le contenu HTML du reçu
    $receiptContent = "
        <!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Receipt</title>
        </head>
        <body>
            <h2>Receipt for Transaction ID: $id_transaction</h2>
            <p>Customer: $customer_name $customer_surname</p>
            <p>Amount: $amount $currency</p>
            <p>Description: $description</p>
            <p>Email: $customer_email</p>
            <p>Phone: $customer_phone</p>
            <p>Address: $customer_address, $customer_city, $customer_country, $customer_state</p>
            <p>Invoice Data: " . json_encode($invoice_data) . "</p>
            <p>Date: " . date('Y-m-d H:i:s') . "</p>        </body>
        </html>
    ";

    // Définir le chemin du fichier de reçu
    $receiptFilePath = __DIR__ . '/receipts/receipt_' . date('YmdHis') . '.html';

    // Enregistrez le contenu du reçu dans le fichier
    if (file_put_contents($receiptFilePath, $receiptContent) !== false) {
        echo "Receipt saved successfully at $receiptFilePath";
    } else {
        echo "Failed to save receipt.";
    }

    // Retournez le chemin du fichier de reçu
    return $receiptFilePath;
}

?>
