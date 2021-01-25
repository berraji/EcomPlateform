<?php

require('modelClass.php');

$m = new model();
$produits = $m->allProds();

print_r($produits);


?>