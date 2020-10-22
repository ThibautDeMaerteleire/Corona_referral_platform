<?php

class AddPatient {
    function __construct() {
        global $db;
        $this->db = $db;
        $this->voornaam = $_POST['voornaam'];
        $this->achternaam = $_POST['achternaam'];
        $this->rijksregisternummer = $_POST['rijksregisternummer'];
        $this->email = $_POST['email'];
        $this->telefoon = $_POST['telefoon'];
        $this->huisartsID = $_SESSION['id'];
    }

    function GetAccountID() {
        $sql = "SELECT id FROM `accounts` WHERE type='1' AND (rijksregisternummer = '{$this->rijksregisternummer}' OR email = '{$this->email}')";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetch();
        if(isset($data['id'])) {
            return $data['id'];
        } else {
            return NULL;
        }
    }

    function AddToDB($accountID) {
        $sql = 'INSERT INTO `patients` (huisartsID, accountID, rijksregisternummer, email, voornaam, achternaam, telefoon) VALUES (:huisartsID, :accountID, :rijksregisternummer, :email, :voornaam, :achternaam, :telefoon)';
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $this->huisartsID,
            ':accountID' => $accountID,
            ':rijksregisternummer' => $this->rijksregisternummer,
            ':email' => $this->email,
            ':voornaam' => $this->voornaam,
            ':achternaam' => $this->achternaam,
            ':telefoon' => $this->telefoon,
        ]);
    }

    function __destruct() {
        $accountID = $this->GetAccountID();
        $this->AddToDB($accountID);
        return true;
    }
}