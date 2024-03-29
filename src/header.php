<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <title>LIBRARY_CI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="/cinetpay/src/interface.css">
    <link rel="stylesheet" href="/interface.css">

    <link rel="stylesheet" href="/cinetpay/src/style.css">
    	<!-- Tell the browser to be responsive to screen width -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="/cinetpay/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="/cinetpay/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Font Awesome -->
  	<link rel="stylesheet" href="/cinetpay/bower_components/font-awesome/css/font-awesome.min.css">
  	<!-- Theme style -->
  	<link rel="stylesheet" href="/cinetpay/dist/css/AdminLTE.min.css">
  	<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="/cinetpay/dist/css/skins/_all-skins.min.css">

    <!-- Google Font -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

        body {
            background: linear-gradient(to right, rgb(255, 145, 0) 3%, rgb(255, 255, 255) 5%, #04CF74 120%);            
            font-family: 'Roboto', sans-serif;
            margin: 0;
        }

        .container {
            width: 100%;
        }

        .bookList {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            justify-content: center;
            align-items: center;
            display: flex;
            overflow: hidden;
            /* Empêche le débordement des éléments enfants */
            transition: transform 0.3s ease-in-out;
            /* Ajoute une transition fluide pour un effet d'animation */
        }

        .card:hover {
            transform: scale(1.05);
            /* Zoom sur la carte au survol */
        }

        .card-body {
            padding: 10px;
        }

        .card-title {
            font-size: 16px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
        }

        .card-img-top {
            width: 150px;
            height: 100px;
            padding: auto;

            position: relative;
        }

        #book-list {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 20px;
            /* Ajoute un espace en haut de la liste de livres */
        }

        .footer {
            margin-bottom: 20px;
        }

        /* Ajustements Bootstrap */
        .container-fluid {
            padding: 0;
        }

        .card {
            max-width: none;
            /* Pour que la carte prenne toute la largeur disponible */
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col-sm-12 {
            flex: 0 0 auto;
        }

        @media (min-width: 576px) {
            .col-sm-12 {
                flex: 0 0 100%;
            }
        }



        .thumbnail-container {
            position: relative;
        }

        /* Styles pour les boutons et le voyant */
        .buttons-container {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 10px;
        }

        .increment-button {
            background-color: #f39c12;
            /* Jaune */
            color: #fff;
            padding: 8px 12px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .decrement-button {
            background-color: #e74c3c;
            /* Rouge */
            color: #fff;
            padding: 8px 12px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .increment-button:hover {
            background-color: #d68910;
            /* Jaune plus foncé au survol */

        }

        .decrement-button:hover {
            background-color: #c73a2d;
            /* Rouge plus foncé au survol */
        }

        .indicator {
            width: 20px;
            height: 20px;
            background-color: #2ecc71;
            border-radius: 50%;
            margin-top: 5px;
        }

        /* Styles supplémentaires pour la disposition des éléments */
        .book-card {
            display: flex;
            flex-direction: column;
            max-width: 250px;
            /* Ajustez la largeur maximale selon votre préférence */
            margin: 10px;
        }

        /* Ajoutez ces styles à votre fichier CSS */

        .counter {
            font-size: 14px;
            color: #fff;
            display: inline-block;
            margin-left: 5px;
        }

        .counter-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 10px;
            padding: 1rem;
        }

        button {
            padding: 5px 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .count {
            font-size: 18px;
            margin: 0 10px;
        }
    </style>

</head>


<body>