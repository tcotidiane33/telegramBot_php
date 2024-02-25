<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'cinet';

    // Créez une connexion
    $conn = new mysqli($host, $user, $password, $database);

    // Vérifiez la connexion
    if ($conn->connect_error) {
        die("La connexion a échoué : " . $conn->connect_error);
    }

    // Vous pouvez maintenant exécuter des requêtes SQL ici
    // ...

    // Fermez la connexion lorsque vous avez terminé
    $conn->close();
?>
