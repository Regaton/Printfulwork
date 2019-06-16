<?php

	require_once 'init.php'; // savienojums ar datu bāzi 


	if (isset($_GET['item'])) { //Ja GET (ar zīmes id) eksistē
		$item = $_GET['item'];


		$deleting = $db->prepare("
			DELETE 
			FROM items
			WHERE id=:item
			AND user=:user
		"); // gatavojam dzešanu 

		$deleting->execute([
			'item' => $item,
			'user' => $_SESSION['user_id']
		]); // izpild dzēšanu

	}

	header('Location: ../index.php'); // ejam uz sākumlapu
?>