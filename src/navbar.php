<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">LIBRARY_CI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class=" p-3 navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="home.php">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Panier</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link" href="order.php">Commande</a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" href="payment.php">Paiement</a>
        </li>
      </ul>

      </div>
      <div class="collapse navbar-collapse navbar-nav" id="navbarNav">
        <button class="nav-item btn-flat"><a class="nav-link" href='#login' data-toggle='modal'><i class='fa fa-sign-in'></i> CONNEXION</a></button>
        <button class="nav-item btn"><a class="nav-link" href='src/admin/index.php' data-toggle='modal'><i class='fa fa-key'></i> ADMIN LOGIN</a></button>
      </div>
  </div>
</nav>