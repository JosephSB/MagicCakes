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
            $query = $this->db->connect()->prepare('SELECT COUNT(*) as total  FROM products WHERE STATUS=1 AND stock>0;');
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
}
?>
