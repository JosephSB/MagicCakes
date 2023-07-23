<?php
class homeModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function getActiveProducts()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT COUNT(*) as total  FROM products WHERE STATUS=1 AND stock>0 AND isDelete=0;');
            $query->execute();
            while ($row = $query->fetch()) {
                return $row['total'];
            }
            return 0;
        } catch (PDOException $e) {
            //echo $e;
            return 0;
        }
    }

    public function getStatusOrders()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT SUM(total_productos) AS total FROM (
                SELECT COUNT(*) AS total_productos
                FROM orders
                WHERE status = 0 OR status = 1
                GROUP BY status
            ) AS subquery;');
            $query->execute();
            $row = $query->fetch();
            return $row['total'];
        } catch (PDOException $e) {
            //echo $e;
            return 0;
        }
    }

    public function getStatusDelivery()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT COUNT(*) AS total_delivery FROM orders WHERE STATUS=1');
            $query->execute();
            while ($row = $query->fetch()) {
                return $row['total_delivery'];
            }
            return 0;
        } catch (PDOException $e) {
            //echo $e;
            return 0;
        }
    }



    public function getClaimsStatus()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT COUNT(*)as total FROM contact_us WHERE status=0');
            $query->execute();
            while ($row = $query->fetch()) {
                return $row['total'];
            }
            return 0;
        } catch (PDOException $e) {
            //echo $e;
            return 0;
        }
    }


    public function getProductSell($month)
{
    try {
        $query = $this->db->connect()->prepare('
        SELECT 
        p.title, 
        p.urllmage, 
        p.description,
        COUNT(*) AS total_ventas
        FROM 
        orders AS o
        INNER JOIN products_orders AS po ON o.order_id = po.order_id
        INNER JOIN products p ON p.product_id = po.product_id
        WHERE MONTH(o.created) = :month
        GROUP BY p.title, p.urllmage, p.description
        ORDER BY total_ventas DESC;
        ');
        $query->bindParam(':month', $month, PDO::PARAM_INT);
        $query->execute();

        $productsSell = [];
        while ($row = $query->fetch()) {
            $produtcssell = [
                'title' => $row['title'],
                'urllmage' => $row['urllmage'],
                'description' => $row['description'],
                'total_ventas' => $row['total_ventas'],
            ];
            array_push($productsSell, $produtcssell);
        }
        return $productsSell;
    } catch (PDOException $e) {
        //echo $e
        return [];
    }
}
public function getSaleDayMonths() {
    try {
        $result = [];  // Arreglo para almacenar los resultados
        $query = $this->db->connect()->prepare("SELECT DATE_FORMAT(created, '%Y-%m-%d') AS dia, MONTH(created) AS mes, SUM(totalGrossPrice) AS ventas_diarias FROM orders WHERE YEAR(created) = YEAR(CURRENT_DATE()) GROUP BY dia, mes ORDER BY dia DESC LIMIT 10");
        $query->execute();
        while ($row = $query->fetch()) {
            $result[] = [
                //'dia' => $row['dia'],
                'mes' => $row['mes'],
                'ventas_diarias' => $row['ventas_diarias']
            ];
        }
        return $result;  // Devolver el arreglo con los resultados
    } catch (PDOException $e) {
        //echo $e;
        return 0;
    }
}


}
