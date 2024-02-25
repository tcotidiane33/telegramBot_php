<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$category = $_POST['category'];
		$author = $_POST['author'];
		$description = $_POST['description'];
		$montant = $_POST['montant'];
		$publisher = $_POST['publisher'];
		$pub_date = $_POST['pub_date'];
		$photo1 = $_POST['photo1'];
		$photo2 = $_POST['photo2'];

		$sql = "INSERT INTO books (isbn, category_id, title, author, descriptions, montant, publisher, publish_date) VALUES ('$isbn', '$category', '$title', '$author', '$description', '$montant', '$publisher', '$pub_date')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Livre ajouté avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Remplissez d\'abord le formulaire d\'ajout';
	}

	header('location: book.php');

?>