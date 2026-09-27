<?php

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

    require_once '../Views/societes/index.php';
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

    public function deleteSoc(int $id_societe){

        $this->modeleSociete->delete($id_societe);
    }

    public function updateSoci(int $id_societe){
        $raison_social = trim($_POST['raison_sociale_societe']?? '');
        $secteur = trim($_POST['secteur_societe']?? '');
        $ville = trim($_POST['ville_societe']?? '');
        if(!empty($raison_social) && !empty($secteur) && !empty($ville)){
        $this->modeleSociete->update($raison_social,$secteur,$ville,$id_societe);
        }
        header('Location: index.php');
        exit();
    }
 }
?>