<?php

	require_once 'init.php'; // savienojums ar failu, kur notiek savienošana ar datu bāzi 


	if (isset($_GET['item'])) { //Ja GET (ar zīmes id) eksistē
		$item = htmlspecialchars($_GET['item']);// Sagrajamies no XXS 
  
		$deleting = $db->prepare("
			DELETE 
			FROM items
			WHERE id=:item
			AND user=:user
		"); // gatavojam dzešanu 

		$deleting->execute([
			'item' => $item,
			'user' => $_SESSION['user_id']
		]); // izpild dzēšanu, sargajamies no SQL injekcijas 

	}

	header('Location: ../index.php'); // ejam uz sākumlapu
?>