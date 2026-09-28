<?php

require_once '../Core/Database.php';


class Interaction{
    private PDO $db;

    public function __construct($db){
        $this->db = $db;
    }

   public function listeInteractions(int $code_contact):array{
     $sql = "SELECT *
          FROM interaction
          WHERE code_contact =?
          ORDER BY date_inter DESC
         ";
         $stmt = $this->db->prepare($sql);
         $stmt->execute([$code_contact]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

   public function creerInteraction(int $code_contact,int $matricule_com,string $type_inter, string $compterend_inter){
     $sql = "
      INSERT INTO interaction(code_contact,matricule_com,type_inter,compterend_inter)
       VALUES(?,?,?,?)
     ";

     $stmt = $this->db->prepare($sql);
     return $stmt->execute([$code_contact,$matricule_com,$type_inter, $compterend_inter]);
   }
}
?>