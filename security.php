<?php
	require('params.php');

	if(!isset($_SESSION['login']))
	{
		echo "Vous n'avez pas le droit de consulter cette page";
		header("refresh:2; url = login.php");
		exit();
	}
	if(time() - $_SESSION['time'] > $ttl)
	{
		header("location:logout.php");
	}
	else
	{
		$_SESSION['time'] = time();
	}

?>