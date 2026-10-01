<?php
require_once __DIR__ . '/../Core/Database.php';
require_once __DIR__ . '/../Models/Interaction.php';
class InteractionController {
    private Interaction $modeleInteraction;

    public function __construct() {
        $db = Database::getInstance()->getConnection();
        $this->modeleInteraction = new Interaction($db);
    }

    public function liste_interactions(int $code_contact) {
        return $this->modeleInteraction->listeInteractions($code_contact);
    }

    public function store() {
        $code_contact = (int) trim($_POST['code_contact'] ?? '');
        $type_inter = trim($_POST['type_inter'] ?? '');
        $compterend_inter = trim($_POST['compterend_inter'] ?? '');
        
        $matricule_com = (int) ($_SESSION['matricule_com'] ?? 0);

        if (empty($code_contact) || empty($type_inter) || empty($compterend_inter) || empty($matricule_com)) {
            throw new Exception("Données manquantes", 1);
        }

        $this->modeleInteraction->creerInteraction($code_contact, $matricule_com, $type_inter, $compterend_inter);
        
        header('Location: index.php');
        exit();
    }
}
?>