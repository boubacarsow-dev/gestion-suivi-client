<?php

require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Contact.php';

 class ContactController{
     private Contact $modeleContact;

     public function __construct() {
        $db = Database::getInstance()->getConnection();
        $this->modeleContact = new Contact($db);
     }

     //contact par entreprise
     public function contact_de_societe($id_societe){
        $liste = $this->modeleContact->contactSociete($id_societe);
      return $liste;
    }
     //
     public function store(){
        $societe =(int) trim($_POST['id_societe']?? '');
        $nom = trim($_POST['nom_contact']?? '');
        $prenom = trim($_POST['prenom_contact']?? '');
        $email = trim($_POST['email_contact']?? '');
        $tel = trim($_POST['tel_contact']?? '');
        $post = trim($_POST['poste_contact']?? '');
        if(empty($nom) || empty($societe) || empty($prenom) || empty($email) ||empty($tel)|| empty($post)){
            throw new Exception("donnees manquantes", 1);
            
        }
        $this->modeleContact->creerContact($societe,$nom,$prenom,$email,$tel,$post);
        header("Location: fiche_societe.php?id=" . $societe);

    }

    public function update_Contact(){
        $code_contact = (int) $_POST['code_contact'];
         $nom = trim($_POST['nom_contact']?? '');
        $prenom = trim($_POST['prenom_contact']?? '');
        $email = trim($_POST['email_contact']?? '');
        $tel = trim($_POST['tel_contact']?? '');
        $post = trim($_POST['poste_contact']?? '');
        if(!empty($nom) && !empty($prenom) && !empty($email) && !empty($tel) && !empty($post)){
        $this->modeleContact->updateContact($code_contact,$nom,$prenom,$email,$tel,$post);
        }
        header('Location: index.php');
        exit();
    }

    public function delete_Contact(){ 
        $code_contact = (int) $_POST['code_contact'];
        $this->modeleContact->deleteContact($code_contact);
     header('Location: index.php');
     exit();
    }
 }
?>