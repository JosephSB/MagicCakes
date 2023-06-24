<?php 

    class claimModel extends Model{
        function __construct(){
            parent::__construct();
        }
        
        public function createClaim($data)
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

        public function updateClaimStatus($claimId, $status){
            try {
                $pdo = $this->db->connect();
                $pdo->beginTransaction();
                $query = $pdo->prepare('UPDATE contact_us SET status = :status WHERE id = :id');
                $query->bindValue(':status', $status, PDO::PARAM_INT);
                $query->bindValue(':id', $claimId, PDO::PARAM_INT);
                $query->execute();

                $pdo->commit();
                return true;

            } catch (PDOException $e) {
                $pdo->rollback();
                //echo "Error al actualizar el estado de la orden: " . $e->getMessage();
                return false;
            }
        }

        
    }

?>