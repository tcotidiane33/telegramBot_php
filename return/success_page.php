<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paiement Réussi</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, rgba(24, 106, 58, 1) 52%, rgba(48, 179, 74, 1) 53%, rgba(48, 179, 74, 1) 100%);
            color: #fff;
            text-align: center;
            padding: 50px;
        }

        .success-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            margin: 0 auto;
        }

        .success-icon {
            font-size: 60px;
            color: #5cb85c;
            margin-bottom: 20px;
        }

        h2 {
            color: #5cb85c;
        }

        p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #5cb85c;

        }

        a {
            color: #fff;
            background-color: #5cb85c;
            text-decoration: none;  
            font-weight: bold;

        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon">&#10004;</div>
        <?php echo '<meta http-equiv="refresh" content="10;url=success_page.php">';  ?>
        <h2>Paiement Réussi!</h2>
        <p>Merci pour votre paiement. Vous recevrez une confirmation par e-mail.</p>
        <p>Vous serez redirigé automatiquement dans quelques secondes. Si ce n'est pas le cas, <a href="/../../cinetpay/index.php">cliquez ici</a>.</p>
    </div>
</body>
</html>
