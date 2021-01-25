<?php
	

	session_start();
	require('connexion.php');
	require('security.php');
	if($_GET['login'] != $_SESSION['login'] && $_SESSION['type'] != 'admin')
	{
		echo "Vous n'avez pas le droit de consulter cette page";
		header("refresh:2; url = allproduits.php");
		exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Informations de <?php echo $_SESSION['login'];?></title>
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
	<form action = "editUser.php" method = "POST">
		<?php
			$query = "Select * from users where login = '".$_GET['login']."'";
			$result = mysqli_query($con,$query);
			$user = mysqli_fetch_row($result);
		?>
		<table class='tab' border="1" align="center">
			<tr><th colspan="2" align="center">Informations de <?php echo $_SESSION['login'];?></th></tr>
			<tr>
				<td>Nom d'utilisateur (Inchangeable)</td>
				<td><?php echo $_SESSION['login']; ?> </td>
			</tr>
			<tr>
				<td>E-mail</td>
				<td><input type="text" name="email" value = "<?php echo $user[3]; ?>" required> </td>
			</tr>
			<tr>
				<td><input id="sub" type="submit" value="Modifier"></td>
				<td><input type="reset" value="Annuler"></td>
			</tr>


		</table>
		
	</form>

</body>
</html>