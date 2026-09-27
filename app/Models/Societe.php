<?php
 require_once '../Core/Database.php';
require_once '../Models/Societe.php';
  class Societe{
    private PDO $db;

     public function __construct(PDO $db){
        $this->db = $db;
     }

     //methode pour recuperer la liste des societes
     public function listeSociete():array{
         $sql = "SELECT *
          FROM societe
          ORDER BY date_creation_societe DESC
         ";
         $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
     }

     //compter le nb de societe
     public function nombreSociete():int{
         $sql = "SELECT COUNT(id_societe) FROM societe";
        $stmt = $this->db->query($sql);
        return (int) $stmt->fetchColumn();
     }
     
     
      public function nombreNouveauxProspects(): int {
    $sql = "SELECT COUNT(id_societe) FROM societe 
            WHERE statut_societe = 'Prospect' 
            AND MONTH(date_creation_societe) = MONTH(CURRENT_DATE()) 
            AND YEAR(date_creation_societe) = YEAR(CURRENT_DATE())";
            
    $stmt = $this->db->query($sql);
    return (int) $stmt->fetchColumn();
}

   //creer une societe
   public function creerSociete(string $raison_sociale_societe,string $secteur_societe,string $ville_societe){
    $sql = "INSERT INTO societe(raison_sociale_societe,secteur_societe,ville_societe)
     VALUES(?,?,?)
    ";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([$raison_sociale_societe,$secteur_societe,$ville_societe]);
    
   }

    //update
    public function update(int $id_societe,string $raison_sociale_societe,string $secteur_societe,string $ville_societe){
        $sql = "
         UPDATE societe
         SET raison_sociale_societe = ?, secteur_societe =?, ville_societe=?
          WHERE id_societe = ?
        ";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_societe,$raison_sociale_societe,$secteur_societe,$ville_societe]);
    }

    //supprimer
    public function delete(int $id_societe){
        $sql = "
          DELETE FROM societe
          WHERE id_societe = ?
        ";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id_societe]);
    }

    

  }   
?>