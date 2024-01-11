<?php
define('BASE_PATH', __DIR__);
include_once BASE_PATH . '/src/navbar.php';
include_once BASE_PATH . '/src/header.php';
?>


<div class="container">
    <div class="col-md-4 bg-light p-5 mt-5">
        <h2>Libracy_ci v0.2</h2>
        <p>Learn by mistake</p>
        <p>admin@mail.com</p>
    </div>
</div>
<!-- Include your JavaScript files here -->
<script type="module" src="src/data/data.js"></script>
<script type="module" src="src/data/app.js"></script>

<?php
include_once 'src/footer.php'
?>