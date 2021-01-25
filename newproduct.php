<?php
	session_start();
	require('connexion.php');
	require('securityAdmin.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nouveau produit</title>

	<link rel="stylesheet" type="text/css" href="style.css">
	
	<style type="text/css">
	.tab
	{
		position: static;
 		left: 50%;
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


	<form action= "insertproduct.php" method="post" enctype="multipart/form-data">
		<table class = 'tab' border="1" align="center">
			<tr><th colspan="2">Nouveau Produit</th></tr>
			<tr>
				<td>Designation</td>
				<td>
					<?php
						if(isset($_GET['des']))
							echo "<input type='text' name='pdesignation' value = ".$_GET['des']." required>";
						else
							echo "<input type='text' name='pdesignation' required>";
					?>
					
				</td>
			</tr>
			<tr>
				<td>Description</td>
				<td><textarea name="pdescription" required><?php if(isset($_GET['desc'])) echo $_GET['desc'];?></textarea></td>
			</tr>
			<tr>
				<td>Prix</td>
				<td><input type="text" id="prix" name="prix" onkeyup="ver()" value = '<?php if(isset($_GET['p'])) echo $_GET['p'];?>' required>
				<img src="#" id="img2" height="20px" hidden="yes">
				</td>

			</tr>
			<tr>
				<td>Photo</td>
				<td>
					<input type="file" name="photo" required>
					<?php
						if(isset($_GET['error']))
						{
							echo "<br>";
							switch ($_GET['error']) 
							{
								case 'err':
									echo "<font color='#d63031'>Problème lors du chargement de la photo</font>";
									break;
								case 'size':
									echo "<font color='#d63031'>La taille de la photo est très grande</font>";
									break;
								case 'ext':
									echo "<font color='#d63031'>Le fichier attaché doit  être une image</font>";
									break;

							}
						} 
					?>
				</td>
			</tr>
			<tr>
				<td>Livraison</td>
				<td>
					<input type="radio" name="pliv" value="g" <?php if(isset($_GET['pliv']) && $_GET['pliv'] == 'g') echo "checked"; ?> > Gratuite
					<input type="radio" name="pliv" value="p" <?php if(isset($_GET['pliv']) && $_GET['pliv'] == 'p') echo "checked"; ?>> Payante 
				</td>
			</tr>
			<tr>

				<td>Categorie </td>
				<td>
					<select name="cat" required="yes" id = "ops" onchange="ver()">
						<option  value = "0" checked>Clicker pour selectionner</option>
						<?php
							$query = "Select num, designation from categories";
							$result = mysqli_query($con,$query);

							while($cat = mysqli_fetch_row($result))
							{
								if(isset($_GET['cat']) && $_GET['cat'] == $cat[0])
									echo "<option value = ".$cat[0]." selected>".$cat[1]."</option>";
								else
									echo "<option value = ".$cat[0].">".$cat[1]."</option>";

							} 
						?>
					</select>
					<img src="#" id="img" height="20px" hidden="yes">
				</td>
			</tr>
			<tr>
				<td><input type="submit" id='sub' value="Ajouter"></td>
				<td><input type="reset" value="Annuler"></td>
			</tr>


		</table>
	</form>

	<script type="text/javascript">
		ver();


		function ver()
		{
			var ops = document.getElementById('ops');
			var prix = document.getElementById('prix');
			var val = ops.options[ops.selectedIndex].value;
			var img = document.getElementById('img');
			var img2 = document.getElementById('img2');
			if(val == 0 || isNaN(prix.value) || parseInt(prix.value) < 0)
			{
				document.getElementById('sub').disabled = true;
				if(val == 0)
				{
					img.src = "images/close.png";
					img.hidden = false;
				}
				else
				{
					img.hidden = true;
				}
				if(isNaN(prix.value) || parseInt(prix.value) < 0)
				{
					img2.src = "images/close.png";
					img2.hidden = false;
				}
				else
				{
					img2.hidden = true;
				}
			}
			else
			{
				document.getElementById('sub').disabled = false;
				img.hidden = true;
				img2.hidden = true;
			}
		}
	</script>

</body>
</html>