<?php
	require_once 'init.php'; // savienojums ar datu bāzi 


	if ((isset($_POST['name'], $_POST['meaning'])) and (isset($_GET['item']))) { // ja POST (ar izmainīto zīmi eksistē)

		$item = $_GET['item'];
		$name = trim($_POST['name']);
		$meaning = trim($_POST['meaning']);


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
		]); // izpildam izmaiņu
	 }

	 header('Location: ../index.php'); // ejam uz sākumlapu
?>