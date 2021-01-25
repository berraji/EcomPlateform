

<?php
session_start();
require('connexion.php');
require('securityAdmin.php');
require('functions.php');



$ph = $_FILES['photo'];

if($ph['error'] != 0)
{
	$url = "location:newproduct.php?error=err&des=".$_POST['pdesignation']."&desc=".$_POST['pdescription']."&p=".$_POST['prix']."&pliv=".$_POST['pliv']."&cat=".$_POST['cat'];
	header($url);
	exit();
}


if($ph['type'] != 'image/jpeg') 
{
	$url = "location:newproduct.php?error=ext&des=".$_POST['pdesignation']."&desc=".$_POST['pdescription']."&p=".$_POST['prix']."&pliv=".$_POST['pliv']."&cat=".$_POST['cat'];
	header($url);
	exit();
}



if($ph['size'] > PHOTO_SIZE_MAX)
{
	$url = "location:newproduct.php?error=size&des=".$_POST['pdesignation']."&desc=".$_POST['pdescription']."&p=".$_POST['prix']."&pliv=".$_POST['pliv']."&cat=".$_POST['cat'];
	header($url);
	exit();
} 









$designation = mysqli_real_escape_string($con,$_POST['pdesignation']);
$description = mysqli_real_escape_string($con,$_POST['pdescription']);
$prix = mysqli_real_escape_string($con,$_POST['prix']);
$liv = mysqli_real_escape_string($con,$_POST['pliv']);
$categ = mysqli_real_escape_string($con,$_POST['cat']);
$t = time();



$query = "INSERT INTO produits (designation,description,prix, livraison,numcat,url)
VALUES ('$designation','$description','$prix','$liv','$categ','$t');";

trace(basename(__FILE__, '.php') ,$query);



if (mysqli_query($con, $query)) {
	$query = "SELECT MAX(num) FROM produits WHERE 1";
	$result = mysqli_query($con,$query);
	$num = mysqli_fetch_row($result)[0];
	$source = $ph['tmp_name'];
	$dest = "Prodimgs/".$t.'.jpeg';
	move_uploaded_file($source, $dest);
	echo $source."<br>".$dest;
	header('location:allproduits.php');

} else {
    echo "Error: <br>" . mysqli_error($con);
}


mysqli_close($con);






?>