<?php
	require_once 'init.php'; // savienojums ar failu, kur notiek savienošana ar datu bāzi 


	if ((isset($_POST['name'], $_POST['meaning'])) and (isset($_GET['item']))) { // ja POST (ar izmainīto zīmi eksistē)
        if ($_POST['_token'] == $_SESSION['token']) {  // Drošība no CSFR
			$item = htmlspecialchars($_GET['item']);
			$name = htmlspecialchars(trim($_POST['name']));
			$meaning = htmlspecialchars(trim($_POST['meaning']));


			$change = $db->prepare("
				UPDATE items
				SET name=:name, meaning=:meaning
				WHERE id=:item
				AND user=:user
			"); // gatavojam izmaiņu


			$change->execute([
				'name' => $name,
				'user' => $_SESSION['user_id'],
				'meaning' => $meaning,
				'item' => $item
			]); // izpildam izmaiņu, drošība no SQL injekcijas
		}
	 }

	 header('Location: ../index.php'); // ejam uz sākumlapu
?>