<!-- $conn = new PDO("mysql:host=localhost;dbname=cinet", "root", ""); -->
<?php
	$conn = new mysqli('localhost', 'root', '', 'cinet');

	if ($conn->connect_error) {
	    die("La connexion a échoué: " . $conn->connect_error);
	}
	
?>