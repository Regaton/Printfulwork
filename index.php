<?php 
	

require_once 'php/init.php'; // savienojums ar failu, kur notiek savienošana ar datu bāzi 

$itemsQuery = $db->prepare("
	SELECT id, name, meaning, done, date 
	FROM items
	WHERE user = :user
"); // vaicājums par visām lietotāja piezīmēm


$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]); // izpild vaicājumu ar drošību no SQL injekcijas

$items = $itemsQuery->rowCount() ? $itemsQuery : []; // parbaudām: lietotāja zīmju saraksts ir tukšs


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
	<h1 class="text-center"> To Do List </h1>
	<div class="container-fluid">
		<?php if (!empty($items)): // Ja lietotājam ir piezīmes, ejam uz katru un rakstām to
			foreach ($items as $item):   	?>
				<div class="row m-x-auto item"> 
					<div class="row w-100">
						<div class="col-md-9 text-xs-left">
							<input type="checkbox" class="checkbox" id="<?php echo $item['id'] ?>"  name="done-list"  <?php echo $item['done'] ? 'checked' : '' ?> />
							<label class="item-headline  <?php echo $item['done'] ? 'done' : '' ?>" > <?php echo $item['name']; ?></label>
						</div>
						<div class="item-date col-md-3 text-xs-right"> <?php echo $item['date'] ?> </div>
					</div>
					<div class="row">
						<div class="col-md-10 item-text"> 
						<?php echo $item['meaning']; ?>
						</div>
					</div>
					<div class="row w-100">
						<div class="col-md-2 main-change-btn" style="float: right" ><a href="change.php?item=<?php echo $item['id'];  // Query string ar zīmes id, lai to izmainītu?>"><input type="button" value="Labot" class="btn btn-warning"  /></a></div>
				  </div>
				</div>
		<?php 
			endforeach; 

		else: // ja lietotājam nav zimju
			echo '<div class="no-notes"> Jums nav nevienas zīmes </div>'; 
		 endif; ?>
	
		<a href="add.php" >
			<button type="button" class="btn btn-success main-add-btn">Pievienot jaunu</button>
		</a>
	</div>
	


</body>
</html>

<script>
	$(document).ready(function() {
		$('input[type="checkbox"]').click(function(){
			var noteid = $(this).attr('id');
			if ( this.checked ) {
				window.location.replace("php/mark.php?mark=done&item="+noteid);
			}
			else window.location.replace("php/mark.php?mark=notdone&item="+noteid);
		});
	});
</script>