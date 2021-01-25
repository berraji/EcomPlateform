<?php

function trace($filename, $query)
{
	$f = fopen("traces/$filename.log","a+");
	$ch = $_SESSION['login']." | ".$query." | ".date("Y:m:d H:i:s")." | ".$_SERVER['REMOTE_ADDR'];
	fputs($f,$ch);
	fputs($f,"\r\n");
	fclose($f);

}


?>