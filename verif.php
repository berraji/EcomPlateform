<?php
	session_start();
	require('connexion.php');

	$username = $_POST['login'];
	$password = md5($_POST['pass']);

	$query = "SELECT * FROM users where login = '$username' AND pass = '$password'";

	$result = mysqli_query($con, $query);
	$isUser = mysqli_num_rows($result);

	
	if($isUser)
	{

		$_SESSION['login'] = $username;
		$_SESSION['type'] = mysqli_fetch_array($result)['type'];
		$_SESSION['time'] = time();
		header("location:allproduits.php");
	}
	else
	{
		header("location:login.php?attempt=1");
	}
	

?>