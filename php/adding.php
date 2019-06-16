<?php
	require_once 'init.php'; // savienojums ar datu bāzi 


	if (isset($_POST['name'], $_POST['meaning'])) { // ja POST (ar jaunu lietotāja zīmi) eksistē
		$name = trim($_POST['name']); 
		$meaning = trim($_POST['meaning']);


		$add = $db->prepare("
			INSERT INTO items (name, user, done, meaning, date) 
			VALUES (:name, :user, 0, :meaning, NOW())
		"); // pievienojam jaunu zīmi 


		$add->execute([
			'name' => $name,
			'user' => $_SESSION['user_id'],
			'meaning' => $meaning
		]); // izpild pievienošanu
	 }

	 header('Location: ../index.php'); // ejam uz sākumlapu
?>