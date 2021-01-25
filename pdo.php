<?php


$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'ecom1';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$pdo = new PDO($dsn,$host,$password);

$query = $pdo->query("SELECT * FROM produits");

while($row = $query->fetch(PDO::FETCH_ASSOC))
{
    print_r($row);
}
?>