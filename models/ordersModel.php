<?php 

    class ordersModel extends Model{
        function __construct(){
            parent::__construct();
        }

        public function getMyOrders($user_id){
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

                while($row = $query->fetch()){
                        $status = $row['status'] == 0 ? 'En proceso' : 'Entregado';
                        $created = $this->formatSpanishDate($row['created']); // Formatear la fecha en español
                        $shipDate = $row['shipDate'] ? 'Llegó el '.$this->formatSpanishDate($row['shipDate']) : 'Se entregará pronto';
                        
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
                    $orders[]=$order;
                }
                

                return $orders;
            } catch (PDOException $e) {
                //echo $e;
                return [];
            }
        }
        private function formatSpanishDate($date){
            $englishMonths = array('January','February','March','April','May','June','July','August','September','October','November','December');
            $spanishMonths = array('enero','febrero','marzo','abril','mayo','junio','julio','agosto','septiembre','octubre','noviembre','diciembre');
            $date = str_replace($englishMonths, $spanishMonths, $date);
            return $date;
        }

    }

    ?>