<?php 

    class productsModel extends Model{
        function __construct(){
            parent::__construct();
        }

        public function getAllProducts(/*$filters*/)
        {
            try {
                $query = $this->db->connect()->prepare(
                    'SELECT * FROM products p WHERE p.status = 1'
                );
                $query->execute(/*[
                    'user'=>$user,
                    'pass'=> md5($pass)
                ]*/);
                $arr_products = array();
                while($row = $query->fetch()){
                    $products = array(
                        'id' => $row['product_id'],
                        'title' => $row['title'],
                        'description' => $row['description'],
                        'urllmage' => $row['urllmage'],
                        'price' => $row['price'],
                        'status' => $row['status'],
                        'updated' => $row['updated'],
                        'created' => $row['created'],
                    );
                    array_push($arr_products, $products);
                }
                return $arr_products;
            } catch (PDOException $e) {
                echo $e;
                return [];
            }
        }
    }

?>