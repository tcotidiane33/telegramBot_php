<?php
	include 'includes/session.php';

	if(isset($_POST['login'])){
		$student = $_POST['email'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password' ";
		$query = $conn->query($sql);
		if($query->num_rows > 0){
			$row = $query->fetch_assoc();
			$_SESSION['email'] = $row['email'];
			$_SESSION['password'] = $row['password'];
			header('location: transaction.php');
		}
		else{
			$_SESSION['error'] = 'Client introuvable';
			header('location: index.php');
		}

	}
	else{
		$_SESSION['error'] = 'Entrer l\'ID du Client';
		header('location: index.php');
	}


?>