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
	

	<form action="editPhoto.php" method="post" enctype = "multipart/form-data">
		<?php
			$query = "Select * from produits where num = ".$_GET['num'];

			$result = mysqli_query($con,$query);
            $produit = mysqli_fetch_row($result);
            
		?>
		
		<table class='tab' border="1" align="center">
			<tr><th colspan="2" align="center">Modification de la photo</th></tr>
			
			<tr>
				<td>Ancienne Photo</td>
                <td>
                    <?php
                        if($produit[6] == "0")
                            echo "<img src='images/produit.png' width = '60px'>";
                        else
                            echo "<img src='Prodimgs/$produit[6].jpeg' width = '60px'>";
                    ?>
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
				<td>Nouvelle Photo</td>
                <td>
                    <input type = "file" name="photoProd" required>
                </td>
				
			</tr>
			
			<tr>
				<td><input id="sub" type="submit" value="Modifier"></td>
				<td><input type="reset" value="Annuler"></td>
			</tr>
			<input type="hidden" name = "nump" value = "<?php echo $_GET['num'];?>">


		</table>
	</form>
	

	
	

</body>
</html>