<?php


require_once 'php/init.php'; // savienojums ar failu, kur notiek savienošana ar datu bāzi 

if (isset($_GET['item'])) {
	$item = htmlspecialchars($_GET['item']);

	$notequery = $db->prepare("
		SELECT name, meaning
		FROM items
		WHERE id=:item
		AND user = :user
	"); // sagatavo vaicajumu par maināmo piezīmi

	$notequery->execute([
		'item'=> $item,
		'user' => $_SESSION['user_id']
	]);// izpild vaicājumu ar drošību no SQL injekcijas
}
?>


<!DOCTYPE HTML>
<html>
<head>
	<title>To Do List</title>
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	
	<!--META TAGS -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--Bootstrap 4 -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>

	<!-- CSS -->
	<link rel="stylesheet" href="css/stylesheet.css" type="text/css" charset="utf-8" />
	
</head>
<body>
	<h1> To Do List </h1>
	<h2> Labot </h2>
	<div class="container text-xs-left form-block">
		<form role="form" action="php/changing.php?item=<?php echo $item // apstrāde notiek changing.php  ar query string dodam zīmes id ?>" method="POST">
			<?php foreach($notequery as $note): ?>
				<label class="form-label" > Virsraksts: </label><br />
				<input class="form-control" type="text" name="name" value="<?php echo $note['name']; ?>" required/> <br />
				<label class="form-label" > Apraksts: </label><br />
				<textarea class="form-control" name="meaning" maxlength="350" required><?php echo $note['meaning']; ?></textarea>
			<?php endforeach; ?>
			<div class="buttons">
				<a href="index.php"><div class="btn btn-info">Doties atpakaļ</div></a>
				<input type="submit" value="Labot" class="btn btn-warning change-btn" />				
				<a href="php/deleting.php?item=<?php echo $item // zīmes dzēšana failā deleting.php ?>">
				<div class="btn btn-danger delete-btn">Dzēst</div></a>
				<input type="hidden" name="_token" value="<?php echo $_token ?>" />
			</div>
		</form>
	</div>
	


</body>
</html>