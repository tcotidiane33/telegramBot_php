
<?php
session_start();

// Récupérer les données JSON envoyées depuis index.php
$jsonData = file_get_contents('php://input');
$selectedBooks = json_decode($jsonData, true);

// Ajouter les livres sélectionnés à la session PHP
if (!isset($_SESSION['selectedBooks'])) {
    $_SESSION['selectedBooks'] = [];
}

foreach ($selectedBooks as $book) {
    $_SESSION['selectedBooks'][] = $book;
}

// Répondre avec un message de succès
echo json_encode(['success' => true]);
?>

<!-- 

<div class="container-fluid">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-12">
            <div class="card mx-auto">
                <p class="heading">COMMANDES LIBRARY_CI</p>
                <a href="payment.php">Passer au paiement</a>
            </div>
        </div>
    </div>
</div>

-->