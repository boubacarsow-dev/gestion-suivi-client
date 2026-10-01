<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Societe.php';
 class SocieteController{
    private Societe $modeleSociete;
    
    public function __construct() {
        $db = Database::getInstance()->getConnection();
        $this->modeleSociete = new Societe($db);
    }
   public function index(){
   
    $liste_des_societes = $this->modeleSociete->listeSociete();
    $total_societe = $this->modeleSociete->nombreSociete();
    $nouveaux = $this->modeleSociete->nombreNouveauxProspects();

    require_once __DIR__ . '/../Views/societes/index.php';
   } 
    public function store(){
        $raison_social = trim($_POST['raison_sociale_societe']?? '');
        $secteur = trim($_POST['secteur_societe']?? '');
        $ville = trim($_POST['ville_societe']?? '');
        if(empty($raison_social) || empty($secteur) || empty($ville)){
            throw new Exception("donnees manquantes", 1);
            
        }
        $this->modeleSociete->creerSociete($raison_social,$secteur,$ville);

        header('Location: index.php');
        exit();
    }

    public function deleteSoc(){ 
        $id_societe = (int) $_POST['id_societe'];
        $this->modeleSociete->delete($id_societe);
        header('Location: index.php');
        exit();
    }

    public function updateSoci(){
        $id_societe = (int) $_POST['id_societe'];
        $raison_social = trim($_POST['raison_sociale_societe']?? '');
        $secteur = trim($_POST['secteur_societe']?? '');
        $ville = trim($_POST['ville_societe']?? '');
        if(!empty($raison_social) && !empty($secteur) && !empty($ville)){
        $this->modeleSociete->update($id_societe,$raison_social,$secteur,$ville);
        }
        header('Location: index.php');
        exit();
    }
 }
?>