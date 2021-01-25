<?php

	session_start();
	require('connexion.php');
	require('security.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Tous les produits</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>

	<?php 

		require('header.php')

	?>
<table id = "prods">
	<tr>
		<td>
			<div class = "prod"> 
				<div class = "img_prod">
					<img class = "pimg" src="testimg.jpg" height="185" width="185">
					<div class = "icons">
						<img src="images/edit.png" width = "20px">
						<img src="images/del.png" width = "20px">
					</div>
				<div>
				<div class = "info_prod">
					<br>
					Prod1
					<br>
					1 dhs
					<br>
					
				</div>
			</div>
		</td>



		<!--
		<td>
			<img src="testimg.jpg" height="185" width="185">
			<br>
			Prod1
			<br>
			1 dhs
		</td>
		<td>
			<img src="testimg.jpg" height="185" width="185">
			<br>
			Prod1
			<br>
			1 dhs
		</td>
		<td>
			<img src="testimg.jpg" height="185" width="185">
			<br>
			Prod1
			<br>
			1 dhs
		</td>
		<td>
			<img src="testimg.jpg" height="185" width="185">
			<br>
			Prod1
			<br>
			1 dhs
		</td>
		<td>
			<img src="testimg.jpg" height="185" width="185">
			<br>
			Prod1
			<br>
			1 dhs
		</td>
		-->
	</tr>
</table>



</body>
</html>