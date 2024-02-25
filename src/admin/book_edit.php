<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
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

		$sql = "UPDATE books SET isbn = '$isbn', title = '$title', category_id = '$category', author = '$author', descriptions = '$description', montant = '$montant', publisher = '$publisher', publish_date = '$pub_date' WHERE id = '$id', photo1='$photo1', photo2='$photo2'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Livre mis à jour avec succès';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Remplissez d\'abord le formulaire de modification';
	}

	header('location:book.php');

?>