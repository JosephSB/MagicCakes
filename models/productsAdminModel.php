<?php

class productsAdminModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getProductsAdmin()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM products WHERE isDelete = 0 ORDER BY updated DESC;');
            $query->execute();
            $products = array();
            while ($row = $query->fetch()) {
                $status = $row['status'] == 0 ? 'Inactivo' : 'Activo';
                $statusClass = $row['status'] == 0 ? 'inactive' : 'active';
                $product = array(
                    'product_id' => $row['product_id'],
                    'title' => $row['title'],
                    'description' => $row['description'],
                    'urllmage' => $row['urllmage'],
                    'price' => $row['price'],
                    'stock' => $row['stock'] ? $row['stock'] : 0,
                    'status' => $status,
                    'status_class' => $statusClass,
                    'updated' => $row['updated'],
                    'created' => $row['created'],
                );
                array_push($products, $product);
            }
            return $products;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }

    }

}