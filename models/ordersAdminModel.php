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
                $province = '';
                switch ($row['province']) {
                    case 1:
                        $province = 'Lima';
                        break;
                }
                $status = '';
                switch ($row['status']) {
                    case 0:
                        $status = 'En curso';
                        break;
                    case 1:
                        $status = 'Entregado';
                        break;
                    case 2:
                        $status = 'Cancelado';
                        break;
                    default:
                        $status = 'Desconocido';
                        break;
                }
                $statusClass = '';
                switch ($row['status']) {
                    case 0:
                        $status = 'En curso';
                        $statusClass = 'status-primary';
                        break;
                    case 1:
                        $status = 'Entregado';
                        $statusClass = 'status-success';
                        break;
                    case 2:
                        $status = 'Cancelado';
                        $statusClass = 'status-danger';
                        break;
                    default:
                        $status = 'Desconocido';
                        break;
                }
                $district = '';
                switch ($row['district']) {
                    case 1:
                        $district = 'Villa Maria del Triunfo';
                        break;
                    case 2:
                        $district = 'San Juan de Miraflores';
                        break;
                    case 3:
                        $district = 'Villa Maria del Triunfo';
                        break;
                    case 4:
                        $district = 'Lurin';
                        break;
                    case 5:
                        $district = 'Barranco';
                        break;
                    case 6:
                        $district = 'Pachacamac';
                        break;
                    case 7:
                        $district = 'Chorrillos';
                        break;
                    case 8:
                        $district = 'San Miguel';
                        break;
                    case 9:
                        $district = 'Santa Anita';
                        break;
                    case 10:
                        $district = 'Santiago de Surco';
                        break;
                    case 11:
                        $district = 'Miraflores';
                        break;
                    case 12:
                        $district = 'San Borja';
                        break;
                    case 13:
                        $district = 'San Isidro';
                        break;

                }
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
                ];
                array_push($orders, $order);
            }
            return $orders;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }

}
?>