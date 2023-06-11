<?php

class userModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function createUser($data)
    {
        try {
            if ($this->isEmailExists($data['email'])) {
                return false;
            }
            $query = $this->db->connect()->prepare(
                '
                        INSERT INTO users (user_id, role, name, lastname, email, phone, address, password, status, created) 
                        VALUES (:user_id, :role, :name, :lastname, :email, :phone, :address, :password, :status, CURRENT_TIME())
                    '
            );
            $id = "U" . substr(uniqid(), 3, 8) . substr($data['Name'], 0, 2) . substr($data['LastName'], 0, 2);
            $query->execute([
                'user_id' => $id,
                'role' => "user",
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
            //echo $e;
            return false;
        }
    }

    private function isEmailExists($email)
    {
        try {
            $query = $this->db->connect()->prepare('
            SELECT COUNT(*) as count FROM users WHERE email = :email and status = 1
        ');
            $query->execute(['email' => $email]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['count'] > 0;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    //LOGIN
    public function findUserByEmail($email)
    {
        try {
            $query = $this->db->connect()->prepare(
                '
                        SELECT * FROM users WHERE email = :email and status = 1
                    '
            );
            $query->execute([
                'email' => $email,
            ]);

            while ($row = $query->fetch()) {
                $products = array(
                    'user_id' => $row['user_id'],
                    'role' => $row['role'],
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'address' => $row['address'],
                    'password' => $row['password'],
                    'status' => $row['status'],
                    'urlProfile' => $row['urlProfile'],
                );
                return $products;
            }

            return [];
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }
}

?>