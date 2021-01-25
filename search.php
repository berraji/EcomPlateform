<?php
	session_start();
	require('connexion.php');
	require('security.php');

	
	header("location:allproduits.php?q=".$_GET['q']);

?>