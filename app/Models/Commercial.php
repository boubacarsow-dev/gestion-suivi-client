<?php
require_once __DIR__ . '/../Core/Database.php';
class Commercial{
    private PDO $db;

    public function __construct($db){
        $this->db = $db;
    }
  
    public function getCommercialByemail(string $email){
        $sql = "
         SELECT *
         FROM commercial
         WHERE email_com = ?
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_OBJ);
    }
}
?>