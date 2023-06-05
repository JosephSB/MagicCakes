<?php

class ordersModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getMyOrders($user_id)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                    SELECT o.order_id, o.client_id, o.status, o.paymentMethod, o.idPayment, o.totalGrossPrice, o.totalNetPrice, o.igv, o.shippingPrice, DATE_FORMAT(o.created, "%d de %M de %Y") AS created, DATE_FORMAT(o.shipDate, "%d de %M de %Y") AS shipDate, p.urllmage AS image, p.title AS name, po.ammount
                    FROM orders o
                    JOIN products_orders po ON o.order_id = po.order_id
                    JOIN products p ON po.product_id = p.product_id
                    WHERE o.client_id = :user_id
                    '
            );
            $query->execute([
                'user_id' => $user_id,
            ]);

            $orders = array();

            while ($row = $query->fetch()) {
                $status = $row['status'] == 0 ? 'En proceso' : 'Entregado';
                $created = $this->formatSpanishDate($row['created']); // Formatear la fecha en español
                $shipDate = $row['shipDate'] ? 'Llegó el ' . $this->formatSpanishDate($row['shipDate']) : 'Se entregará pronto';

                $order = array(
                    'order_id' => $row['order_id'],
                    'user_id' => $row['client_id'],
                    'status' => $status,
                    'paymentMethod' => $row['paymentMethod'],
                    'idPayment' => $row['idPayment'],
                    'totalGrossPrice' => $row['totalGrossPrice'],
                    'totalNetPrice' => $row['totalNetPrice'],
                    'igv' => $row['igv'],
                    'shippingPrice' => $row['shippingPrice'],
                    'created' => $created,
                    'shipDate' => $shipDate,
                    'image' => $row['image'],
                    'name' => $row['name'],
                    'units' => $row['ammount'],
                );
                $orders[] = $order;
            }


            return $orders;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }

    public function saveOrder($user_id, $data)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                        INSERT INTO orders (order_id, client_id, status, paymentMethod, idPayment,totalGrossPrice,totalNetPrice,igv, shippingPrice,created) 
                        VALUES (:order_id, :client_id, :status, :paymentMethod, :idPayment,:totalGrossPrice,:totalNetPrice,:igv, :shippingPrice, CURRENT_TIME())
                    '
            );
            $queryDetail = $this->db->connect()->prepare(
                '
                        INSERT INTO detail_orders ( order_id, name, lastname, address,detail_address,department,province, district,postalCode, phoneNumber) 
                        VALUES (:order_id, :name, :lastname, :address,:detail_address,:department,:province, :district,:postalCode, :phoneNumber)
                    '
            );
            $order_id = "O" . substr(uniqid(), 3, 8) . substr(uniqid(), 0, 2) . substr(uniqid(), 0, 2);
            $query->execute([
                'order_id' => $order_id,
                'client_id' => $user_id,
                "status" => 0,
                "paymentMethod" => "paypal",
                "idPayment" => uniqid(),
                "totalGrossPrice" => ($data["totalPrice"] - 10) / 1.18,
                "totalNetPrice" => $data["totalPrice"],
                "igv" => 0.18,
                "shippingPrice" => 10,

            ]);
            $queryDetail->execute([
                'order_id' => $order_id,
                'name' => $data["name"],
                "lastname" => $data["lastname"],
                "address" => $data["address"],
                "detail_address" => $data["detailAddress"],
                "department" => $data["department"],
                "province" => $data["province"],
                "district" => $data["district"],
                "postalCode" => $data["postalCode"],
                "phoneNumber" => $data["phoneNumber"],
            ]);

            // migrate products shopping cart to products order

            $queryProductsInSC = $this->db->connect()->prepare(
                '
                        SELECT 
                            p.product_id, p.price, sc.ammount
                        FROM shopping_cart sc 
                        INNER JOIN products p on (p.product_id = sc.item_id)
                        WHERE p.status = 1 and sc.user_owner = :userID
                    '
            );
            $queryProductsInSC->execute([
                'userID' => $user_id
            ]);

            $bulkQuery = "INSERT INTO products_orders (order_id, product_id, ammount, unitPrice, created) VALUES ";

            $values = array();
            $params = array();

            while ($row = $queryProductsInSC->fetch()) {
                $values[] = "(?, ?, ?, ?, CURRENT_TIME())";
                $params[] = $order_id;
                $params[] = $row['product_id'];
                $params[] = $row['ammount'];
                $params[] = $row['price'];
            }

            $bulkQuery .= implode(", ", $values);


            $migrate = $this->db->connect()->prepare($bulkQuery);
            $migrate->execute($params);

            $deleteItemsCart = $this->db->connect()->prepare(
                'DELETE FROM shopping_cart WHERE user_owner = :user_id'
            );
            $deleteItemsCart->execute([
                'user_id' => $user_id
            ]);

            return true;
        } catch (PDOException $e) {
            //echo "Error de consulta SQL: " . $e->getMessage();
            return true;
        }
    }

    private function formatSpanishDate($date)
    {
        $englishMonths = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $spanishMonths = array('enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre');
        $date = str_replace($englishMonths, $spanishMonths, $date);
        return $date;
    }



    public function getDetailsOrders($id)
    {

        try {
            $query = $this->db->connect()->prepare('
                SELECT 
                    d.name AS name,
                    d.lastname AS lastname,
                    o.created AS created,
                    o.status AS status
                FROM 
                    orders AS o 
                INNER JOIN detail_orders AS d ON o.order_id = d.order_id 
                WHERE o.order_id = :id;
            ');

            $query->execute(['id' => $id]);

            $arr_orders = array();

            while ($row = $query->fetch()) {
                $orders = array(
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'created' => $row['created'],
                    'status' => $row['status'],
                );
                array_push($arr_orders, $orders);
            }

            return $arr_orders;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }

    public function editOrders($idOrder, $data)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                UPDATE orders AS o
                INNER JOIN detail_orders AS d ON o.order_id = d.order_id
                SET o.status = :status,
                    o.created = :created,
                    d.name = :name,
                    d.lastname = :lastname
                WHERE o.order_id = :id;
                '
            );

            $query->execute([
                'id' => $idOrder,
                'status' => $data['status'],
                'created' => $data['created'],
                'name' => $data['name'],
                'lastname' => $data['lastname'],
            ]);

            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }


}