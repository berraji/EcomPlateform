<?php
session_start();
require('connexion.php');
require('securityAdmin.php');
require('functions.php');



$ph = $_FILES['photoProd'];



/*add security part here*/

if($ph['error'] != 0)
{
	$url = "location:modifPhoto.php?error=err";
	header($url);
	exit();
}


if($ph['type'] != 'image/jpeg' && $ph['type'] != 'image/png') 
{
	$url = "location:modifPhoto.php?error=ext";
	header($url);
	exit();
}



if($ph['size'] > PHOTO_SIZE_MAX)
{
	$url = "location:modifPhoto.php?error=size";
	header($url);
	exit();
} 


$t = time();

$query = "SELECT url FROM produits WHERE num = ".$_POST['nump'];
$result = mysqli_query($con,$query);
$url = mysqli_fetch_row($result)[0];

$query = "UPDATE produits SET url = $t WHERE num = ".$_POST['nump'];
$result = mysqli_query($con,$query);
$source = $ph['tmp_name'];
$dest = "Prodimgs/".$t.".jpeg";

move_uploaded_file($source, $dest);
if($url != "0")
    unlink("Prodimgs/".$url.".jpeg");

header("location:allproduits.php");



