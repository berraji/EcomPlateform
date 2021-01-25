<!DOCTYPE html>
<html>
<head>
	<title>S'inscrire</title>
	<meta charset="utf-8">
	<link rel = "stylesheet" href = "lstyle.css">
</head>
<body>
	<form class = "box" action="verifSignUp.php" method="POST">
		<table align="center">
			
			
			<tr><th colspan="2" align="center">S'inscrire</th></tr>
			<?php
				if(isset($_GET['dispo']))
				{
					echo "<tr><td align = center colspan = '2' class = 'erreur'>Username n'est pas disponible</td></tr>";
				}
			?>
			<tr>
				<td colspan="2"><input type="text" name="login" placeholder = "Nom d'utilisateur"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="email" name="email" placeholder = "E-mail"></td>
			</tr>

			<tr>
				<td colspan="2"><input type="password" name="pass" id = "password" placeholder="Mot de passe"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="password" onkeyup="validatePassword()" name="pass2" id = "confirm_password" placeholder="Confirmer le mot de passe"></td>
			</tr>
			
			<tr>
				<td align="center"><input id = "val" type="submit" value="Valider"></td>
				<td align = "center"><input type="reset" value = "Annuler" ></td>
			</tr>
			<script type="text/javascript">
				

				function validatePassword()
				{
					var password = document.getElementById("password");
					var confirm_password = document.getElementById("confirm_password");
					var valider = document.getElementById("val");
					if(password.value != confirm_password.value)
					{
						
						confirm_password.style.borderColor = "#c0392b";
						val.style.opacity = 0.2;
						val.disabled = true;
						val.style.cursor = 'auto';

					}
					else
					{
						val.disabled = false;
						confirm_password.style.borderColor = "#2ecc71";
						val.style.opacity = 1;
						val.style.cursor = 'pointer';
					}
				}
			</script>
			<tr><td colspan="2" align="right"><a href = 'login.php'>S'identifier</a></td></tr>
		</table>
	</form>
</body>
</html>