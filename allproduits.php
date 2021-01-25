<?php

	session_start();
	require('connexion.php');
	require('security.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tous les produits</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>




<?php 

require('header.php')

?>

<br>
<br>

<table width = "100%">
<tr>
	<th>Photo</th>
	<th>Designation</th>
	<th>Description</th>
	<th>Prix</th>
	<th>Livraison</th>
	<th>Categorie</th>
	<?php
		
		if($_SESSION['type'] == 'admin')
		{
			echo "<th><a href = 'newproduct.php'><img src='images/plus.png' align = 'left' alt = 'Ajouter un produit' ></a></th>";
		}
	?>
	
</tr>
	<?php
		require("functions.php");
		$query = "Select * from produits";
		if(isset($_GET['q']))
		{
			$query = "Select * from produits WHERE designation like '%".$_GET['q']."%' OR description like '%".$_GET['q']."%'";

		}

		//Sauvegarde des requetes excutées
		trace(basename(__FILE__, '.php') ,$query);
		
			

		$result = mysqli_query($con,$query);
		if(mysqli_num_rows ($result) == 0)
			echo "<tr ><td class = 'noprod' colspan = 6>Aucun produit ne correspond à votre recherche</td></tr>";

		while($produit = mysqli_fetch_row($result))
		{
			if($produit[4] == 'G')
				$liv = "Livraison gratuite";
			else
				$liv = "Livraison payante";
			/*
				Une autre solution pour afficher la designation de la categorie est de changer query vers "Select .. from produits, categories where produits.numcat = categories.num";
			*/
			$query2 = "Select designation frowm categories where num = ".$produit[5];
			$result2 = mysqli_query($con,$query2);
			$nomcat = mysqli_fetch_row($result2)[0];
			echo "<tr>";
		
			
			if($produit[6] != 0)
				echo "<td><a href = 'modifPhoto.php?num=$produit[0]'><img src = 'Prodimgs/$produit[6].jpeg' height = 50px width = 50px></a></td>";
			else
				echo "<td><a href = 'modifPhoto.php?num=$produit[0]'><img src = 'images/produit.png' height = 50px width = 50px></a></td>";
			
			//echo "<td>".$produit[0]."</td>";
			echo "<td>".$produit[1]."</td>";
			echo "<td>".$produit[2]."</td>";
			echo "<td>".$produit[3]." Dhs</td>";
			echo "<td>".$liv."</td>";
			echo "<td>".$nomcat."</td>";
			
			if($_SESSION['type'] == 'admin')
			{
				echo "<td><a href = 'modif.php?num=".$produit[0]."'><img width = '30' hight = '30' src = 'images/edit.png'></a>";
				//echo "<a href = 'delprod.php?num=".$produit[0]."'><img width = '30' hight = '30' src = 'images/del.png'></a></td>";
				echo "<a onclick = 'conf($produit[0])' id = 'del'><img width = '30' hight = '30' src = 'images/del.png'></a></td>";
			}
			
			
			echo "</tr>";

		}


?>


</table>

<script type="text/javascript">
	function conf(num)
	{
		var c = confirm("êtes-vous sûr ?");
		if(c)
			window.location.href = 'delprod.php?num=' + num;

	}
</script>
</body>
</html>




