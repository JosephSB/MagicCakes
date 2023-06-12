<?php

class usersAdminModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getDetailUser($id)
    {
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM users WHERE user_id = :id;');
            $query->execute(['id' => $id]);
            $arr_users = array();
            while ($row = $query->fetch()) {
                $user = array(
                    'user_id' => $row['user_id'],
                    'role' => $row['role'],
                    'name' => $row['name'],
                    'lastname' => $row['lastname'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'address' => $row['address'],
                    'status' => $row['status'],
                );
                array_push($arr_users, $user);
            }
            return $arr_users;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }
    }

    public function getUsersAdmin()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT user_id, role, CONCAT(name, " ", lastname) AS full_name, email, phone, address, status FROM users;');
            $query->execute();
            $users = array();
            while ($row = $query->fetch()) {
                $status = $row['status'] == 0 ? 'Inactivo' : 'Activo';
                $statusClass = $row['status'] == 0 ? 'inactive' : 'active';
                $user = array(
                    'user_id' => $row['user_id'],
                    'role' => $row['role'],
                    'name' => $row['full_name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'address' => $row['address'],
                    'status' => $status,
                    'status_class' => $statusClass,
                );
                array_push($users, $user);
            }
            return $users;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }

    }

    public function editUsers($idUser, $data)
    {
        try {
            $query = $this->db->connect()->prepare(
                ' 
                  UPDATE users SET role = :role, name = :name, lastname = :lastname, email = :email, phone = :phone, address = :address, status = :status 
                  WHERE user_id = :id;
                '
            );
            $query->execute([
                'id' => $idUser,
                'role' => $data["role"],
                'name' => $data["name"],
                'lastname' => $data["lastname"],
                'email' => $data["email"],
                'phone' => $data["phone"],
                'address'=> $data["address"],
                'status' => $data["status"],
                
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

    public function deleteUsers($idUser)
    {
        try {
            $query = $this->db->connect()->prepare('DELETE FROM users WHERE user_id = :id');
            $query->execute([
                'id' => $idUser
            ]);
            return true;
        } catch (PDOException $e) {
            //echo $e;
            return false;
        }
    }

}