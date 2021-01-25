<!DOCTYPE html>
<html>
<head>
	<title>Espace d'authentification</title>
	<meta charset="utf-8">
	<link rel = "stylesheet" href = "lstyle.css">
</head>
<body>
	<form class = "box" action="verif.php" autocomplete="off" method="POST">
		<table align="center" >
			<?php
				if(isset($_GET['attempt']))
				{
					echo "<tr><td align = center colspan = '2' class = 'erreur'>Erreur de connexion</td></tr>";
				}
			?>

			<tr><th colspan="2" align="center">Espace d'authentification</th></tr>
			<tr>
				<td colspan="2"><input type="text" name="login" placeholder = "Nom d'utilisateur"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="password" name="pass" placeholder="Mot de passe"></td>
			</tr>
			<tr>
				<td align="center"><input type="submit" value="Valider"></td>
				<td align = "center"><input type="reset" value = "Annuler" ></td>
			</tr>
			<tr><td colspan="2" align="right"><a href = 'signup.php'>S'inscrire</a></td></tr>
		</table>
	</form>

</body>
</html>