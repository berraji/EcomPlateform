<?php
	session_start();
	require('connexion.php');
	require('securityAdmin.php');
	require('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		

		$designation = mysqli_real_escape_string($con,$_POST['pdesignation']);
		$description = mysqli_real_escape_string($con,$_POST['pdescription']);
		$prix = mysqli_real_escape_string($con,$_POST['prix']);
		$liv = mysqli_real_escape_string($con,$_POST['pliv']);
		$categ = mysqli_real_escape_string($con,$_POST['cat']);

		$query = "UPDATE produits SET designation = '$designation', description = '$description' ,prix = '$prix', livraison = '$liv', numcat = '$categ' WHERE num = ".$_POST['nump'].";";
		trace(basename(__FILE__, '.php') ,$query);

		if (mysqli_query($con, $query)) {
		    echo "modification faite";
			header("refresh:2; url = allproduits.php");

		} 
		else 
		{
    		echo "Error: <br>" . mysqli_error($con);
		}

		mysqli_close($con);





	?>

</body>
</html>