<?php
	session_start();
	require('connexion.php');
	require('securityAdmin.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modification du produit num <?php $_GET['num']?></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<style type="text/css">
		.tab
		{
			position: fixed;
  			top: 50%;
 	 		left: 50%;
  			transform: translate(-50%, -50%);
  			margin-top: 30px;

		}
		th
		{
			text-align: center;
		}
		
	</style>

</head>
<body>

	<?php
		require('header.php');

	?>
	

	<form action="edit.php" method="post">
		<?php
			$query = "Select * from produits where num = ".$_GET['num'];

			$result = mysqli_query($con,$query);
			$produit = mysqli_fetch_row($result);
		?>
		
		<table class='tab' border="1" align="center">
			<tr><th colspan="2" align="center">Modification du produit</th></tr>
			<tr>
				<td>Designation</td>
				<td><input type="text" name="pdesignation" value = "<?php echo $produit[1]; ?>" required></td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="pdescription"   required><?php echo $produit[2]; ?></textarea></td>
			</tr>
			<tr>
				<td>Prix</td>
				<td><input type="text" name="prix"  value = "<?php echo $produit[3]; ?>" required></td>
			</tr>
			<tr>
				<td>Livraison</td>
				<td>
					<input type="radio" name="pliv" value="g" <?php if($produit[4] == 'g') echo "checked";?>> Gratuit
					<input type="radio" name="pliv" value="p" <?php if($produit[4] == 'p') echo "checked";?>> Payante
				</td>
			</tr>
			<tr>
				<td>Categorie </td>
				<td>
					<select class="form-control" id = "ops" name="cat" required="yes" onchange="ver()">
						<option  value = "0" checked>Clicker pour selectionner</option>
						<?php
							$query = "Select num, designation from categories";
							$result = mysqli_query($con,$query);

							while($cat = mysqli_fetch_row($result))
							{
								if($cat[0] == $produit[5])
									echo "<option value = ".$cat[0]." selected>".$cat[1]."</option>";
								else
									echo "<option value = ".$cat[0]." >".$cat[1]."</option>";

							} 
						?>
					</select> 
					<img src="#" id="img" height="20px" hidden="yes">
				</td>
			</tr>
			<tr>
				<td><input id="sub" type="submit" value="Modifier"></td>
				<td><input type="reset" value="Annuler"></td>
			</tr>
			<input type="hidden" name = "nump" value = "<?php echo $_GET['num'];?>">


		</table>
	</form>
	

	
	<script type="text/javascript">
		


		function ver()
		{
			var ops = document.getElementById('ops');
			var val = ops.options[ops.selectedIndex].value;
			var img = document.getElementById('img');
			if(val == 0)
			{
				document.getElementById('sub').disabled = true;
				img.src = "images/close.png";
				img.hidden = false;
			}
			else
			{
				document.getElementById('sub').disabled = false;
				img.hidden = true;
			}
		}
	
	</script>

</body>
</html>