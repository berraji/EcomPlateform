<?php
	session_start();
	require('connexion.php');
	require('securityAdmin.php');
	require('functions.php');
	$nump = $_GET['num'];
	$query = "SELECT * FROM produits where num = $nump";
	$result = mysqli_query($con,$query);
	if(mysqli_num_rows($result) == 0)
	{
		echo "Produit inexistant";
		header("refresh:2; url = allproduits.php");
		exit();
	}

	$query = "DELETE FROM produits where num = $nump";
	trace(basename(__FILE__, '.php') ,$query);

	if(mysqli_query($con,$query))
	{
		echo "le produit num $nump a été supprimé";
		header("refresh:2; url = allproduits.php");
	}

?>

