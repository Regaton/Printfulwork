<?php 
	

require_once 'php/init.php'; // savienojums ar datu bāzi 

$itemsQuery = $db->prepare("
	SELECT id, name, meaning, done, date 
	FROM items
	WHERE user = :user
"); // vaicājums par visām lietotāja piezīmēm


$itemsQuery->execute([
	'user' => $_SESSION['user_id']
]); // izpild vaicājumu

$items = $itemsQuery->rowCount() ? $itemsQuery : []; // parbaudām: lietotāja zīmju saraksts ir tukšs?
?>




<!DOCTYPE HTML>
<html>
<head>
	<title>To Do List</title>
	<!-- CSS -->
	<link rel="stylesheet" href="css/style7.css" type="text/css" charset="utf-8" />
	<link rel="stylesheet" href="css/adapt3.css" type="text/css" charset="utf-8" />
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="js/"></script>
	
	<!--META TAGS -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
</head>
<body>
	<h1> To Do List </h1>
	<div class="to-do-list">
		<?php if (!empty($items)): // Ja lietotājam ir piezīmes, ejam uz katru un rakstām to
			foreach ($items as $item):   	?>
				<div class="list"> 
					<input type="checkbox" id="<?php echo $item['id'] ?>" class="checkbox" name="done-list"  <?php echo $item['done'] ? 'checked' : '' ?> />
					<label class="text-headline <?php echo $item['done'] ? 'done' : '' ?>" > <?php echo $item['name']; ?></label>
					<div class="item-date"> <?php echo $item['date'] ?> </div>
					<div class="list-text"> 
						<?php echo $item['meaning']; ?>
					</div>
					<a href="change.php?item=<?php echo $item['id'];  // Query string ar zīmes id, lai to izmainītu?>"><input type="button" value="Labot" class="button change"  /></a>
				</div>
		<?php 
			endforeach; 

		else: // ja lietotājam nav zimju
			echo '<div class="no-notes"> Jums nav nevienas zīmes </div>'; 
		 endif; ?>
	
		<a href="add.php" >
			<button type="button" class="button submit">Pievienot jaunu</button>
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