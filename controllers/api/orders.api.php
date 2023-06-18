<?php 

    class OrdersApi extends Controller{
        function __construct(){
            parent::__construct();
        }

        public function createOrder(){
            session_start();

            if(!isset($_SESSION['user_id'])){
                echo $this->sendJson("No esta autenticado", false);
                return;
            }

            $user_id = $_SESSION['user_id'];
            $data = json_decode(file_get_contents('php://input'), true);
            if(count($data) !== 12){
                echo $this->sendJson("Parametros incompletos", false);
                return;
            }
            $form["name"] = isset($data['name']) ? $data['name'] : "";
            $form["lastname"] = isset($data['lastname']) ? $data['lastname'] : "";
            $form["address"] = isset($data['address']) ? $data['address'] : "";
            $form["detailAddress"] = isset($data['detailAddress']) ? $data['detailAddress'] : "";
            $form["department"] = isset($data['department']) ? $data['department'] : "";
            $form["province"] = isset($data['province']) ? $data['province'] : "";
            $form["district"] = isset($data['district']) ? $data['district'] : "";
            $form["postalCode"] = isset($data['postalCode']) ? $data['postalCode'] : "";
            $form["phoneNumber"] = isset($data['phoneNumber']) ? $data['phoneNumber'] : 0;
            $form["totalPrice"] = isset($data['totalPrice']) ? intval($data['totalPrice']) : 0;
            $form["lat"] = isset($data['lat']) ? strval($data['lat']) : "";
            $form["lng"] = isset($data['lng']) ? strval($data['lng']) : "";

            if($this->model->saveOrder($user_id,$form)){
                echo $this->sendJson("orden creada exitosamente", true);
                return;
            }
            echo $this->sendJson("ocurrio un error", false);

        }

    }

?>