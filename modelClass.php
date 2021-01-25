<?php
class model
{    
        private $db;
        public function __construct()
        {
            define('USER','root');
            define('PASS','');
            $this->db = new PDO('mysql:host=localhost;dbname=ecom1',USER,PASS);

        }

        public function allProds()
        {
            $query = $this->db->prepare('select * from produits');
            $query->execute();
            return $query->fetchAll();
        }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        
    </script>
</head>
<body>
    
</body>
</html>