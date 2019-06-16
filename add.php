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
	<div class="down-headline"> Pievienot jaunu </div>
	<div class="to-do-list">
			<form action="php/adding.php" method="POST">
				<label class="text-headline" > Virsraksts: </label><br />
				<input class="name-input" type="text" name="name" required/> <br />
				<label class="text-headline" > Apraksts: </label><br />
				<textarea class="meaning-input" maxlength="350" name="meaning" required></textarea>
				<a href="index.php"><div class="button begin-button">Doties atpakaļ</div></a>
				<input type="submit" value="Pievienot" class="button addbutton" />
			</form>
	</div>
	


</body>
</html>