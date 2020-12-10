<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Wikipedia</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	</head>
	<body>

				<?php

			$connect = mysqli_connect("127.0.0.1", "root", "", "wiki");

		if ($connect->connect_error) 
			{
			die("Connection failed: " . $connect->connect_error);
			}
		?>

	 <section id="content">
			<section id="border">
			<img id="logo" src="./photos/ae86.jpeg">
			<div id="tlogo">
				<h1>FanWikipedia</h1>
				<h3>L'encyclopedie libre</h3>
			</div>
			<nav>
				<?php echo '<a href="index.php">Lire</a>'; ?>
				<button id="save" style="display:none;">Save Changes</button>		
				<button id="cd">modifier</button>
				
			</nav>

		</section>
			<span id="result"><section id="content2">

		<?php
			  $sql = "SELECT * FROM content ORDER BY id DESC LIMIT 1";
				$result = mysqli_query($connect, $sql);
			  	$row = mysqli_fetch_row($result);
			  	echo html_entity_decode($row[1], ENT_QUOTES);
		?>
		</section>
		</section>
	</section>	
	</span>


	<script type="text/javascript"> 

				var theContent = $('#content2');
 
				$('#save').on('click', function(){
  					var editedContent   = theContent.html();
  					localStorage.newContent = editedContent;


  					$.ajax({
  						url :'edit.php',
  						dataType :'html',
  						type: "POST",
  						data: {
  							newContent: editedContent,
  						},
  						success: function (result, status) {
  							console.log("Success : " + result);
  						},
  						error: function (result, status, error) {
  							console.log("Error : " + result);
  						},
  					});
				});
				if (localStorage.getItem('newContent')) {
  					//theContent.html(localStorage.getItem('newContent'));
				}
	</script>

	<script
	 type="text/javascript">
		$("#cd").click(function(){
		    $("#content2").attr('contenteditable',true);
		    $("#cd").attr("style","display:none;");
		    $("#save").attr("style","visibility:visible");
    	});
    	$("#save").click(function(){
    		$("#save").attr("style","display:none;");
		    $("#cd").attr("style","visibility:visible");
		    });
	</script>
	</body>
</html>