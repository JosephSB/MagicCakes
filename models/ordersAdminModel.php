<?php

class ordersAdminModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getOrdersAdmin()
    {
        try {
            $query = $this->db->connect()->prepare('
                SELECT 
                o.order_id AS order_id, 
                SUM(po.ammount) AS ammount, 
                o.shippingPrice AS shippingPrice, 
                o.totalNetPrice AS totalNetPrice, 
                d.province AS province, 
                d.district AS district, 
                d.lat AS lat,
                d.lng AS lng,
                CONCAT(d.name, " ", d.lastname) AS client, 
                d.phoneNumber AS phoneNumber, 
                o.status AS status,
                o.created AS created
                FROM 
                orders AS o 
                INNER JOIN detail_orders AS d ON o.order_id = d.order_id 
                INNER JOIN products_orders AS po ON o.order_id = po.order_id 
                GROUP BY o.order_id
                ORDER BY o.created DESC;
                ');
            $query->execute();
            $orders = [];
            while ($row = $query->fetch()) {
                $province = $row['province'];
                $status = '';
                switch ($row['status']) {
                    case 0:
                        $status = 0;
                        break;
                    case 1:
                        $status = 1;
                        break;
                    case 2:
                        $status = 2;
                        break;
                    default:
                        $status = -1;
                        break;
                }
                $statusClass = '';
                switch ($row['status']) {
                    case 0:
                        $status = 0;
                        $statusClass = 'status-primary';
                        break;
                    case 1:
                        $status = 1;
                        $statusClass = 'status-success';
                        break;
                    case 2:
                        $status = 2;
                        $statusClass = 'status-danger';
                        break;
                    default:
                        $status = -1;
                        break;
                }
                $district = $row['district'];
                $order = [
                    'order_id' => $row['order_id'],
                    'ammount' => $row['ammount'],
                    'shippingPrice' => $row['shippingPrice'],
                    'totalNetPrice' => $row['totalNetPrice'],
                    'province' => $province,
                    'district' => $district,
                    'client' => $row['client'],
                    'phoneNumber' => $row['phoneNumber'],
                    'status' => $status,
                    'status_class' => $statusClass,
                    'created' => $row['created'],
                    "lat" => $row["lat"],
                    "lng" => $row["lng"],
                ];
                array_push($orders, $order);
            }
            return $orders;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }

    public function getDetailOrder($id)
    {

        try {
            $query = $this->db->connect()->prepare('
            SELECT 
                o.order_id AS order_id, 
                SUM(po.ammount) AS ammount, 
                o.shippingPrice AS shippingPrice, 
                o.totalNetPrice AS totalNetPrice, 
                d.province AS province, 
                d.district AS district, 
                d.address AS address, 
                d.detail_address AS detail_address,
                d.lat AS lat,
                d.lng AS lng,
                CONCAT(d.name, " ", d.lastname) AS client, 
                d.phoneNumber AS phoneNumber, 
                o.status AS status,
                o.created AS created
            FROM 
            orders AS o 
            INNER JOIN detail_orders AS d ON o.order_id = d.order_id 
            INNER JOIN products_orders AS po ON o.order_id = po.order_id 
            WHERE o.order_id = :id;
            ');
            $query->execute(['id' => $id]);
            $arr_products = array();
            while ($row = $query->fetch()) {
                $products = array(
                    'order_id' => $row['order_id'],
                    'ammount' => $row['ammount'],
                    'shippingPrice' => $row['shippingPrice'],
                    'totalNetPrice' => $row['totalNetPrice'],
                    'province' => $row['province'],
                    'district' => $row["district"],
                    'address' => $row['address'],
                    'detail_address' => $row['detail_address'],
                    'lat' => $row['lat'],
                    'lng' => $row['lng'],
                    'client' => $row['client'],
                    'phoneNumber' => $row['phoneNumber'],
                    'status' => $row['status'],
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
?>