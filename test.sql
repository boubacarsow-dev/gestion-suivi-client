USE mini_crm;

CREATE TABLE IF NOT EXISTS commercial(
    matricule_com INT PRIMARY KEY AUTO_INCREMENT,
    nom_com VARCHAR(50) NOT NULL,
    prenom_com VARCHAR(80) NOT NULL,
    email_com VARCHAR(100) NOT NULL UNIQUE,
    mdp_com VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS societe (
    id_societe INT AUTO_INCREMENT PRIMARY KEY,
    raison_sociale_societe VARCHAR(100) NOT NULL,
    secteur_societe VARCHAR(50),
    ville_societe VARCHAR(50),
    statut_societe VARCHAR(20) DEFAULT 'Prospect',
    date_creation_societe DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contact(
    code_contact INT PRIMARY KEY AUTO_INCREMENT,
    nom_contact VARCHAR(50) NOT NULL,
    prenom_contact VARCHAR(50) NOT NULL,
    email_contact VARCHAR(200) NOT NULL UNIQUE,
    tel_contact VARCHAR(15) NOT NULL UNIQUE,
    poste_contact VARCHAR(50) NOT NULL,
    id_societe INT NOT NULL,
    FOREIGN KEY (id_societe) REFERENCES societe(id_societe) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS interaction(
    num_inter INT PRIMARY KEY AUTO_INCREMENT,
    date_inter TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    type_inter VARCHAR(20) NOT NULL,
    compterend_inter TEXT NOT NULL,
    code_contact INT NOT NULL,
    matricule_com INT NOT NULL,
    FOREIGN KEY (matricule_com) REFERENCES commercial(matricule_com),
    FOREIGN KEY (code_contact) REFERENCES contact(code_contact) ON DELETE CASCADE
);