<?php

class shoppingCartModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function findProductsInShoppingCart($user_id)
    {
        try {
            $querySQL = '
                SELECT 
	                p.product_id, p.title, p.description, p.urllmage, p.price, p.status, p.updated, 		
                    p.created, sc.user_owner, sc.ammount, sc.id as itemID, sc.createdAt as itemDate,
                    IF(COUNT(pf.product_id) > 0, true, false) AS isFav
                FROM shopping_cart sc 
                INNER JOIN products p on (p.product_id = sc.item_id)
                LEFT JOIN products_favs pf ON (pf.product_id = p.product_id AND pf.user_id = :userID)
                WHERE p.status = 1
                GROUP BY p.product_id
            ';
            $query = $this->db->connect()->prepare($querySQL);
            $query->execute([
                'userID'=> $user_id
            ]);
            $arr_products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'itemID' => $row['itemID'],
                    'ammount' => $row['ammount'],
                    'id' => $row['product_id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'urllmage' => $row['urllmage'],
                    'price' => $row['price'],
                    'status' => $row['status'],
                    'updated' => $row['updated'],
                    'created' => $row['created'],
                    'isFav' => $row['isFav'],
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
