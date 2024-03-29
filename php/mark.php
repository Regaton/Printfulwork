<?php

 
	require_once 'init.php'; // savienojums ar failu, kur notiek savienošana ar datu bāzi 

	if(isset($_GET['mark'], $_GET['item'])) { // ja GET (ar zīmes numuru un checkbox stāvokli) eksistē

		$mark = htmlspecialchars($_GET['mark']);
		$item =  htmlspecialchars($_GET['item']);




		if($mark == "done" ) { // ja vajag izmanīt stāvokli uz "izpildīto"
			$updatequery = $db->prepare("
				UPDATE items 
				SET done=1
				WHERE id=:itemid
				AND user = :user
			"); // izmaina uz izpildīto
		}
		else { // ja vajag izmanīt stāvokli uz "neizpildīto"
			$updatequery = $db->prepare(" 
				UPDATE items 
				SET done=0
				WHERE id=:itemid
				AND user = :user
			"); // izmaina uz neizpildīto, drošība no SQL injekcijas
		}


		$updatequery->execute([
			'itemid' => $item,
			'user' => $_SESSION['user_id']
		]); // izpilda gatavu izmaiņu, sargajamies no SQL injekcijas

	}

	header('Location: ../index.php'); // ejam uz sakulapu

?>