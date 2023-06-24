<?php
class homeModel extends models
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

    public function getStatusOrders($user_id)
    {
        try {
            $query = $this->db->connect()->prepare('SELECT status, COUNT(*) AS total_productos
        FROM orders
        WHERE status = 0 OR status = 1
        GROUP BY status;');
            $query->execute();
            $order = [];
            while ($row = $query->fetch()) {
                $order = [
                    'total' => $row['total_productos'],
                    'status' => $row['status'],
                ];
            }
            return $order;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }
    public function getClaimsStatus()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT COUNT(*)as total FROM orders WHERE status=0');
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
