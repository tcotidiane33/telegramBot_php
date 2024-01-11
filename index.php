<?php
session_start();
define('BASE_PATH', __DIR__);

include_once BASE_PATH . '/src/navbar.php';
include_once BASE_PATH . '/src/header.php';
?>

<div class="container">
    <div class="mx-auto">
        <p class="heading card">WELCOME LIBRARY_CI</p>
        <a class="mx-auto btn btn-info" href="#" id="view-cart-btn">Voir le panier</a>

        <!-- Bouton pour passer la commande -->
        <main class="bookList">
            <section class="container-fluid mx-auto" id="book-list">
                <!-- La liste des livres sera ajoutée ici par JavaScript -->
            </section>
        </main>
    </div>
</div>

<!-- Include your JavaScript files here -->
<script type="module" src="src/data/data.js"></script>
<script type="module" src="src/data/app.js"></script>

<?php
include_once 'src/footer.php';
?>
