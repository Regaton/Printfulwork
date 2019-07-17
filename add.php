<?php
  require_once 'php/init.php'; // savienojums ar failu, kur notiek savienošana ar datu bāzi 
//echo "<pre>".$_SESSION['token']."</pre>";
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
	<h2> Pievienot jaunu </h2>
	<div class="container text-xs-left form-block">
			<form action="php/adding.php" method="POST">
				<label class="form-label" > Virsraksts: </label><br />
				<input class="form-control" type="text" name="name" required/> <br />
				<label class="form-label" > Apraksts: </label><br />
				<textarea class="form-control" maxlength="350" name="meaning" required></textarea>
				<div class="buttons">
					<a href="index.php"><div class="btn btn-info">Doties atpakaļ</div></a>
					<input type="submit" value="Pievienot" class="btn btn-success add-btn" />
					<input type="hidden" name="_token" value="<?php echo $_token ?>" />
				</div>
			</form>
	</div>
	


</body>
</html>