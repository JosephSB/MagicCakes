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
                    p.created, sc.user_owner, sc.ammount, sc.id as itemID, sc.createdAt as itemDate
                FROM shopping_cart sc 
                INNER JOIN products p on (p.product_id = sc.item_id)
                WHERE p.status = 1 and sc.user_owner = :userID
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
                );
                array_push($arr_products, $products);
            }
            return $arr_products;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }

    public function findTotalProductsInShoppingCart($user_id)
    {
        try {
            $querySQL = '
                SELECT 
	                count(*) as total
                FROM shopping_cart sc 
                INNER JOIN products p on (p.product_id = sc.item_id)
                WHERE p.status = 1 and sc.user_owner = :userID
            ';
            $query = $this->db->connect()->prepare($querySQL);
            $query->execute([
                'userID'=> $user_id
            ]);
            $products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'total' => $row['total'],
                );
            }
            return $products["total"];
        } catch (PDOException $e) {
            //echo $e;
            return 0;
        }
    }

    public function addItemToShoppingCart($user_id, $ammount, $item_id)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                    INSERT INTO shopping_cart (item_id, user_owner, ammount, createdAt) 
                    VALUES (:item_id, :user_owner, :ammount, CURRENT_TIME())
                '
            );
            $query->execute([
                'item_id'=> $item_id,
                'user_owner'=> $user_id,
                'ammount' => $ammount,
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    public function updateItemFromShoppingCart($user_id, $ammount, $rowID)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                    UPDATE shopping_cart SET ammount = :ammount
                    WHERE user_owner=:userID and id=:ID
                '
            );
            $query->execute([
                'userID'=> $user_id,
                'ID'=> $rowID,
                'ammount' => $ammount,
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    public function removeItemFromShoppingCart($user_id, $id)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                    DELETE FROM shopping_cart WHERE user_owner=:userID and id=:ID
                '
            );
            $query->execute([
                'userID'=> $user_id,
                'ID'=> $id
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

}
