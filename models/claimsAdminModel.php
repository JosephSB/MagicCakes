<?php

class claimsAdminModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getClaimsAdmin()
    {
        try {
            $query = $this->db->connect()->prepare('SELECT id, CONCAT(name, " ", lastname) AS full_name, email, phone, message,status, date FROM contact_us;');
            $query->execute();
            $claims = array();
            while ($row = $query->fetch()) {
                $status = '';
                switch ($row['status']) {
                    case 0:
                        $status = 0;
                        break;
                    case 1:
                        $status = 1;
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
                    default:
                        $status = -1;
                        break;
                }
                $claim = array(
                    'id' => $row['id'],
                    'name' => $row['full_name'],
                    'email' => $row['email'],
                    'phone' => $row['phone'],
                    'message' => $row['message'],
                    'status' => $status,
                    'status_class' => $statusClass,
                    'date' => $row['date'],
                );
                array_push($claims, $claim);
            }
            return $claims;
        } catch (PDOException $e) {
            //echo $e;
            return [];
        }

    }

}