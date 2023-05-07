<?php 

    class contactModel extends Model{
        function __construct(){
            parent::__construct();
        }
        
        public function createContact($data)
        {
            try {
                $query = $this->db->connect()->prepare(
                    '
                        INSERT INTO contact_us (id, name, lastname, email, phone, message, status, date) 
                        VALUES (:id, :name, :lastname, :email, :phone, :message, :status, CURRENT_TIME())
                    '
                );
                $id ="C".substr(uniqid(),3,8).substr($data['name'],0,2).substr($data['lastname'],0,2);
                $query->execute([
                    'id'=> $id,
                    'name' => $data["name"],
                    'lastname' => $data["lastname"],
                    'email' => $data["email"],
                    'phone' => $data["number"],
                    'message' => $data["area_message"],
                    'status' => 1,
                ]);
                return true;
            } catch (PDOException $e) {
                //echo $e;
                return false;
            }
        }

        
    }

?>