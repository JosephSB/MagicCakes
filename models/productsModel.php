<?php

class productsModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getAllProducts($ORDER, $SEARCHTEXT,$userID)
    {
        try {
            $sWhere = "";
            $sOrder = "";
            if ($ORDER == "2") $sOrder = "ORDER BY p.price asc";
            if ($ORDER == "3") $sOrder = "ORDER BY p.price desc";
            if ($SEARCHTEXT) $sWhere = "and p.title like " . "'%" . $SEARCHTEXT . "%'";
            $querySQL = '
                SELECT 
                    p.product_id, p.title, p.description, p.urllmage, p.price, p.stock, p.status, p.updated, p.created,
                    IF(COUNT(pf.product_id) > 0, true, false) AS isFav
                FROM products p 
                LEFT JOIN products_favs pf ON pf.product_id = p.product_id AND pf.user_id = :userID
                WHERE p.status = 1' . ' ' . $sWhere . ' GROUP BY p.product_id ' . $sOrder;
            $query = $this->db->connect()->prepare($querySQL);
            $query->execute([
                'userID'=> $userID
            ]);
            $arr_products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'id' => $row['product_id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'urllmage' => $row['urllmage'],
                    'price' => $row['price'],
                    'stock' => $row['stock'],
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

    public function getPopularProducts($userID)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                SELECT 
                    p.product_id, p.title, p.description, p.urllmage, p.price, p.stock, p.status, p.updated, p.created,
                    IF(COUNT(pf.product_id) > 0, true, false) AS isFav
                FROM products p 
                LEFT JOIN products_favs pf ON pf.product_id = p.product_id AND pf.user_id = :userID
                WHERE p.status = 1 GROUP BY p.product_id LIMIT 3;
                '
            );
            $query->execute([
                'userID' => $userID,
            ]);
            $arr_products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'id' => $row['product_id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'urllmage' => $row['urllmage'],
                    'price' => $row['price'],
                    'stock' => $row['stock'],
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


    public function getMyFavs($userID)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                    SELECT 
                        p.product_id, p.title, p.description, p.urllmage, p.price, p.stock, p.status, p.updated, p.created
                    FROM products_favs pf
                    INNER JOIN products p on p.product_id = pf.product_id
                    WHERE p.status = 1 and pf.user_id = :userID;
                '
            );
            $query->execute([
                'userID' => $userID,
            ]);
            $arr_products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'id' => $row['product_id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'urllmage' => $row['urllmage'],
                    'price' => $row['price'],
                    'stock' => $row['stock'],
                    'status' => $row['status'],
                    'updated' => $row['updated'],
                    'created' => $row['created']
                );
                array_push($arr_products, $products);
            }
            return $arr_products;
        } catch (PDOException $e) {
            echo $e;
            return [];
        }
    }


    public function getDetailsProducts($id)
    {

        try {
            $query = $this->db->connect()->prepare('SELECT * FROM products WHERE product_id = :id;');
            $query->execute(['id' => $id]);
            $arr_products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'id' => $row['product_id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'urllmage' => $row['urllmage'],
                    'price' => $row['price'],
                    'stock' => $row["stock"] ? $row["stock"] : 0,
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

    public function createProducts($data)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                    INSERT INTO products (product_id, title, description, urllmage, price,stock, status, created, updated) 
                    VALUES (:product_id, :title, :description, :url, :price, :stock, :status, CURRENT_TIME(), CURRENT_TIME())
                '
            );
            $id ="P".substr(uniqid(),3,8).substr(uniqid(),0,2).substr(uniqid(),0,2);
            $query->execute([
                'product_id'=> $id,
                'title'=> $data["title"],
                'description' => $data["description"],
                'url' => $data["url"],
                'price' => $data["price"],
                'stock' => $data["stock"],
                'status' => $data["status"],
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    public function editProducts($idProduct, $data)
    {
        try {
            $query = $this->db->connect()->prepare(
                ' 
                  UPDATE products SET title = :title, description = :description, urllmage = :url, price = :price, stock = :stock, status = :status, updated = CURRENT_TIME() 
                  WHERE product_id = :id;
                '
            );
            $query->execute([
                'id' => $idProduct,
                'title' => $data["title"],
                'description' => $data["description"],
                'url' => $data["url"],
                'price' => $data["price"],
                'stock' => $data["stock"],
                'status' => $data["status"],
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    public function deleteProducts($idProduct)
    {
        try {
            $query = $this->db->connect()->prepare('DELETE FROM products WHERE product_id = :id');
            $query->execute([
                'id' => $idProduct
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    public function favProductByProductID($idProduct, $idUser)
    {
        $response["operation"] = false;
        $response["isFav"] = null;
        try {
            $checkQuery = $this->db->connect()->prepare('SELECT COUNT(*) as count FROM products_favs WHERE product_id = :productID AND user_id = :userID');
            $checkQuery->execute([
                'productID' => $idProduct,
                'userID' => $idUser,
            ]);
            $rowCount = $checkQuery->fetch(PDO::FETCH_ASSOC)['count'];

            $response["isFav"] = false;

            if ($rowCount > 0) {
                $deleteQuery = $this->db->connect()->prepare('DELETE FROM products_favs WHERE product_id = :productID AND user_id = :userID');
                $deleteQuery->execute([
                    'productID' => $idProduct,
                    'userID' => $idUser,
                ]);
                $response["isFav"] =  false;
            } else {
                $insertQuery = $this->db->connect()->prepare('INSERT INTO products_favs (product_id, user_id) VALUES (:productID, :userID)');
                $insertQuery->execute([
                    'productID' => $idProduct,
                    'userID' => $idUser,
                ]);
                $response["isFav"] =  true;
            }

            $response["operation"] = true;
            return $response;
        } catch (PDOException $e) {
            //echo $e;
            return $response;
        }
    }
}
