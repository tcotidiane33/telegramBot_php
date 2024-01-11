<?php
define('BASE_PATH', __DIR__);
include_once BASE_PATH . '/src/navbar.php';
include_once BASE_PATH . '/src/header.php';

// Récupérer les livres sélectionnés de l'URL
$selectedBooks = isset($_GET['selectedBooks']) ? json_decode(urldecode($_GET['selectedBooks']), true) : [];
// Lire le contenu de db.json
$booksData = file_get_contents('src/data/db.json');

// Décoder les données JSON
$books = json_decode($booksData, true);

// Récupérer le montant total de l'URL
$totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : 0;

// Initialisation des variables intermédiaires
$totalAmount = 0;
$bookDetails = '';

// Calcul du montant total et construction de la description
foreach ($selectedBooks as $selectedBook) {
    $matchingBook = array_values(array_filter($books, function ($book) use ($selectedBook) {
        return $book['id'] == $selectedBook['id'];
    }));

    if (!empty($matchingBook)) {
        $matchingBook = $matchingBook[0];

        // Calcul du montant total
        $totalAmount += $matchingBook['price'] * $selectedBook['quantity'];

        // Construction de la description
        $bookDetails .= '<div class="book-details bg-light p-2 mb-3">';
        $bookDetails .= '<h4>' . $matchingBook['BookTitle'] . ' (x' . $selectedBook['quantity'] . ')</h4>';
        $bookDetails .= '<p>Author: ' . $matchingBook['BookAuthor'] . '</p>';
        $bookDetails .= '</div>';
    }
}
?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Désactiver tous les champs de formulaire
        var formFields = document.querySelectorAll('#payment-form input, #payment-form select');
        formFields.forEach(function(field) {
            field.readOnly = true;
        });
    });
</script>

<!-- Navbar -->
<div class="container-fluid mt-3">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card p-3">
                <h2 class="text-center mb-4">Test pay By KondroNetworks</h2>
                <form action="action.php" method="post" class="card-details ">


                    <!-- Informations personnelles -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_name" class="form-label">Nom</label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="super">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_surname" class="form-label">Prénom</label>
                                <input type="text" class="form-control" id="customer_surname" name="customer_surname" value="nova">
                            </div>
                        </div>
                    </div>

                    <!-- Montant et Devise -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="amount" class="form-label">Montant</label>
                                <div class="mb-3 btn-danger">
                                    <h4>Montant Total: <?php echo $totalAmount; ?> XOF</h4>
                                    <!-- Ajoutez un champ caché pour le montant total -->
                                    <input type="hidden" name="amount" value="<?php echo $totalAmount; ?>">
                                </div>
                                <!-- <input type="number" class="form-control" id="amount" name="amount" value="100"> -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="currency" class="form-label">Devise</label>
                                <select class="form-select" id="currency" name="currency">
                                    <option value="XOF">XOF</option>
                                    <option value="XAF">XAF</option>
                                    <option value="CDF">CDF</option>
                                    <option value="GNF">GNF</option>
                                    <option value="USD">USD</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Descriptions des livres -->
                    <div class="mb-3">
                        <label class="form-label">Descriptions :</label>
                        <?php echo $bookDetails; ?>
                        <!-- Ajoutez un champ caché pour la description -->
                        <input type="hidden" name="bookDetails" value="<?php echo htmlentities($bookDetails); ?>">
                    </div>

                    <!-- Informations du client -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_email" class="form-label">Email du client</label>
                                <input type="email" class="form-control" id="customer_email" name="customer_email" value="support@kondronetworks.com">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_phone_number" class="form-label">Numéro de téléphone du client</label>
                                <input type="tel" class="form-control" id="customer_phone_number" name="customer_phone_number" value="002250769469844">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="customer_address" class="form-label">Adresse du client</label>
                        <input type="text" class="form-control" id="customer_address" name="customer_address" value="Abidjan Cocody RI13">
                    </div>

                    <!-- Informations de localisation du client -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_city" class="form-label">Ville du client</label>
                                <input type="text" class="form-control" id="customer_city" name="customer_city" value="Abidjan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="customer_country" class="form-label">Pays du client</label>
                                <input type="text" class="form-control" id="customer_country" name="customer_country" value="CI">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="customer_state" class="form-label">Région du client</label>
                        <input type="text" class="form-control" id="customer_state" name="customer_state" value="Lagunes">
                    </div>

                    <!-- Bouton de validation -->
                    <div class="pt-0"> <button type="submit" name="valider" class="btn btn-success">Valider<i class="fas fa-arrow-right px-3 py-2"></i></button> </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include_once 'src/footer.php';
?>