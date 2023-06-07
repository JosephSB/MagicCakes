<?php

class usersAdminModel extends Model
{
    function __construct()
    {
        parent::__construct();
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

}