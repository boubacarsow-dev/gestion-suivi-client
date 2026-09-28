<?php
require_once '../Core/Database.php';
 class Contact{
    private PDO $db;

    public function __construct($db){
        $this->db = $db;
    }

    //contact par entreprise
    public function contactSociete(int $id_societe){
        $sql = "
            SELECT * 
            FROM contact
            WHERE id_societe = ?
        ";

       $stmt = $this->db->prepare($sql);
       $stmt->execute([$id_societe]);
       return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function creerContact(int $id_societe,string $nom_contact, string $prenom_contact,string $email_contact, string $tel_contact, string $poste_contact){
        $sql = "
            INSERT INTO contact(id_societe,nom_contact,prenom_contact,email_contact,tel_contact,poste_contact)
            VALUES(?,?,?,?,?,?)
        ";
       $stmt = $this->db->prepare($sql);
       return $stmt->execute(([$id_societe,$nom_contact,$prenom_contact,$email_contact,$tel_contact,$poste_contact]));
    }


    public function updateContact(int $code_contact,string $nom_contact,string $prenom_contact,string $email_contact,string $tel_contact,string $poste_contact){
        $sql = "
         UPDATE contact
         SET nom_contact = ?, prenom_contact =?, email_contact=?, tel_contact=?, poste_contact =?
          WHERE code_contact = ?
        ";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$nom_contact,$prenom_contact,$email_contact,$tel_contact, $poste_contact,$code_contact]);
    }

    public function deleteContact(int $code_contact){
        $sql = "
          DELETE FROM contact
          WHERE code_contact = ?
        ";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$code_contact]);
    }
 }

?>