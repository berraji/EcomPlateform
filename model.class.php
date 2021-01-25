<?php


class model
{
    private $db;

    public function __construct()
    {
        define('USER','root');
        define('PASS','');

        $this->db =new PDO('mysql:host=localhost;dbname = ecom1',USER,PASS);
    }
    public function allProds()
    {
        $query = $this->db->prepare('SELECT * FROM produits WHERE 1');
        $query->execute();
        $result = $query->fetchAll();
        print_r($result);
    }
}

$t = new model();

$t->allProds();

//print_r($produits);


?>

