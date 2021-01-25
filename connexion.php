<?php
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('BASE','ecom1');
$con = mysqli_connect(HOST,USER,PASS,BASE);
if($con == false)
{
	echo "FAILED TO CONNECT";
	exit();
}
?>