<?php

class AddPatient {
    function __construct() {
        global $db;
        $this->db = $db;
    }

    function GetAccountID() {
        $sql = "SELECT id FROM `accounts` WHERE type='1' AND (rijksregisternummer = :rijksregisternummer OR email = :email)";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':rijksregisternummer' => $_POST['rijksregisternummer'],
            ':email' => $_POST['email']
        ]);
        $data = $pdo_statement->fetch();
        if(isset($data['id'])) {
            return $data['id'];
        } else {
            return NULL;
        }
    }

    function AddToDB($accountID) {
        $sql = 'INSERT INTO `patients` 
                (huisartsID, accountID, rijksregisternummer, email, voornaam, achternaam, telefoon) 
                VALUES 
                (:huisartsID, :accountID, :rijksregisternummer, :email, :voornaam, :achternaam, :telefoon)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $_SESSION['id'],
            ':accountID' => $accountID,
            ':rijksregisternummer' => $_POST['rijksregisternummer'],
            ':email' => $_POST['email'],
            ':voornaam' => $_POST['voornaam'],
            ':achternaam' => $_POST['achternaam'],
            ':telefoon' => $_POST['telefoon'],
        ]);
    }

    function __destruct() {
        $accountID = $this->GetAccountID();
        $this->AddToDB($accountID);
        return true;
    }
}