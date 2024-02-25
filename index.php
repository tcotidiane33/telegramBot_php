<?php
    session_start();
    define('BASE_PATH', __DIR__);

    include_once BASE_PATH . '/src/navbar.php';
    include_once BASE_PATH . '/src/header.php';

    include BASE_PATH . '/src/config.php';
    include BASE_PATH . '/src/scripts.php';

    // Pagination
    $records_per_page = 6;
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $start_from = ($page - 1) * $records_per_page;

    // Récupérer les livres depuis la base de données avec pagination
    $sql = "SELECT * FROM Books LIMIT $start_from, $records_per_page";
    $result = $conn->query($sql);
?>

<div class="container">
    <div class="mx-auto">
        <div class="box-header mt-2  with-border">
            <div class="input-group">
                <input type="text" class="form-control input-lg" id="searchBox" placeholder="Rechercher un ISBN, un titre ou un auteur">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-primary btn-flat btn-lg"><i class="fa fa-search"></i> </button>
                </span>
            </div>
            <p class="heading card">LIBRARY_CI News Pubs Notifications ...</p>
        </div>
        <!-- Bouton pour passer la commande -->
        <div class="modal-footer">
            <a class=" m-1 btn bg-green" href="#" id="view-cart-btn">Voir le panier</a>
        </div>

        <main class="container">
            <!-- Affichage des cartes des livres -->
            <div class="container-fluid">
                <div class="row">
                    <?php
                    echo '<div class="container">';
                    echo '<div class="row">';
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-lg-3 col-md-6 mb-2">';
                            echo '<div class="card">';
                            echo '<img src="' . $row['photo1'] . '" class="card-img-top mt-1 " alt="' . $row['title'] . '">';
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">' . $row['title'] . '</h5>';
                            echo '<p class="card-text ">Auteur: ' . $row['author'] . '</p>';
                            echo '<p class="card-text">Description: ' . $row['descriptions'] . '</p>';
                            echo '<p class="card-text">Publisher: ' . $row['publisher'] . '</p>';
                            echo '<p class="card-text">Publish Date: ' . $row['publish_date'] . '</p>';
                            echo '<p class="card-text btn bg-orange p-2">Montant: ' . $row['montant'] . '</p>';
                            echo '<p class="card-text center  bg-green p-2 btn m-1">Status: ' . ($row['status'] == 0 ? 'Disponible' : 'Sur Commande !') . '</p>';
                            echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_description" data-title="' . $row['title'] . '" data-description="' . $row['descriptions'] . '">Voir plus</button>';
                            // echo '<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal_description" data-title="' . $row['title'] . '" data-description="' . $row['descriptions'] . '">Voir plus</a>';
                            echo '</div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p>Aucun livre trouvé.</p>';
                    }
                    echo '</div>';
                    echo '</div>';  
                    ?>
                </div>
                <?php include BASE_PATH . '/modal_pages/modal_descriptio.php'; ?>
            </div>

            <!-- Pagination -->
            <div class="container-fluid">
                <ul class="pagination">
                    <?php
                    $sql = "SELECT COUNT(*) AS total_records FROM Books";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $total_pages = ceil($row["total_records"] / $records_per_page);

                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </main>
    </div>
</div>

<!-- Include your JavaScript files here -->

<?php
include_once 'src/footer.php';
?>