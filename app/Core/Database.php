<?php
 require_once '../config/config.php';

 class Database{
    private static $instance = null;
    private  $connexion;
     private function __construct(){
        try {
            $this->connexion = new PDO(
             "mysql:host =".DB_HOST."dbname=".DB_NAME.";charset=utf8",DB_USER,DB_PASSWORD
            );
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Erreur critique de connexion : " . $e->getMessage());
        }
     }

     public static function getInstance(){
        if(self::$instance ===  null){
            self::$instance = new self();
        }
        return self::$instance;
     }

     public function getConnection() {
        return $this->connexion;
    }
 }
?>