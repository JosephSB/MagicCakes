<?php 

    class productsModel extends Model{
        function __construct(){
            parent::__construct();
        }

        public function getAllProducts($ORDER, $SEARCHTEXT)
        {
            try {
                $sWhere = "";
                $sOrder = "";
                if($ORDER == "2") $sOrder = "ORDER BY price asc";
                if($ORDER == "3") $sOrder = "ORDER BY price desc";
                if($SEARCHTEXT) $sWhere = "and title like "."'%".$SEARCHTEXT."%'";
                $querySQL = 'SELECT * FROM products p WHERE p.status = 1'.' '.$sWhere.' '.$sOrder;
                $query = $this->db->connect()->prepare($querySQL);
                $query->execute(/*[
                    'order'=> $ORDER,
                    'txt'=> $SEARCHTEXT
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
                //echo $e;
                return [];
            }
        }

        public function getPopularProducts(/*$filters*/)
        {
            try {
                $query = $this->db->connect()->prepare(
                    'SELECT * FROM products p WHERE p.status = 1 LIMIT 3;'
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
                //echo $e;
                return [];
            }
        }
    }
