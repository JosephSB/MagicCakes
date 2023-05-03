<?php 

    class userModel extends Model{
        function __construct(){
            parent::__construct();
        }
        
        public function createUser($data)
        {
            try {
                $query = $this->db->connect()->prepare(
                    '
                        INSERT INTO users (user_id, role, name, lastname, email, phone, address, password, status, created) 
                        VALUES (:user_id, :role, :name, :lastname, :email, :phone, :address, :password, :status, CURRENT_TIME())
                    '
                );
                $id ="U".substr(uniqid(),3,8).substr($data['Name'],0,2).substr($data['LastName'],0,2);
                $query->execute([
                    'user_id'=> $id,
                    'role'=> "user",
                    'name' => $data["name"],
                    'lastname' => $data["lastname"],
                    'email' => $data["email"],
                    'phone' => $data["number"],
                    'address' => $data["address"],
                    'password' => password_hash($data['password'], PASSWORD_BCRYPT),
                    'status' => 1,
                ]);
                return true;
            } catch (PDOException $e) {
                echo $e;
                return false;
            }
        }
    }

?>