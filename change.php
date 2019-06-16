<?php


require_once 'php/init.php';

if (isset($_GET['item'])) {
	$item = $_GET['item'];

	$notequery = $db->prepare("
		SELECT name, meaning
		FROM items
		WHERE id=:item
		AND user = :user
	");

	$notequery->execute([
		'item'=> $item,
		'user' => $_SESSION['user_id']
	]);
}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title>To Do List</title>
	<!-- CSS -->
	<link rel="stylesheet" href="css/styles.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="css/media.css" type="text/css" charset="utf-8" />
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/"></script>
	
	<!--META TAGS -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
</head>
<body>
	<h1> To Do List </h1>
	<div class="down-headline"> Labot </div>
	<div class="to-do-list">
		<form action="php/changing.php?item=<?php echo $item // apstrāde notiek changing.php  ar query string dodam zīmes id ?>" method="POST">
		<?php foreach($notequery as $note): ?>
				<label class="text-headline" > Virsraksts: </label><br />
				<input class="name-input" type="text" name="name" value="<?php echo $note['name']; ?>" required/> <br />
				<label class="text-headline" > Apraksts: </label><br />
				<textarea class="meaning-input" name="meaning" maxlength="350" required><?php echo $note['meaning']; ?></textarea>
		<?php endforeach; ?>
			<a href="index.php"><div class="button begin-button">Doties atpakaļ</div></a>
			<a href="php/deleting.php?item=<?php echo $item // zīmes dzēšana failā deleting.php ?>"><div class="button delete-button">Dzēst</div></a>
			<input type="submit" value="Labot" class="button changebutton" />
		</form>
	</div>
	


</body>
</html>