<?php

	require('connexion.php');

	$login = mysqli_real_escape_string($con,$_POST['login']);
	$pass = md5(mysqli_real_escape_string($con,$_POST['pass']));
	$email = mysqli_real_escape_string($con,$_POST['email']);

	$query = "SELECT * FROM users WHERE login = '$login'";
	$result = mysqli_query($con,$query);
	$isUser = mysqli_num_rows($result);
	if($isUser != 0)
	{
		echo $isUser."<br>";
		echo $query;
		header("location:signup.php?dispo=false");
	}
	else
	{
		$query = "INSERT INTO users (login,pass,email,type) 
	VALUES
	('$login','$pass','$email','client')";
		if(mysqli_query($con,$query))
		{
			echo "Inscription faite";
			header('refresh:2; url=login.php');
		}

	}


?>