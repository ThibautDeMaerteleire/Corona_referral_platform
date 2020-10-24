<?php 

class Patienten {
    function __construct() {
        global $db;
        $this->db = $db;
        $this->page = $this->SetPage();
    }

    function SetPage() {
        if(isset($_GET['page'])) {
            return $_GET['page'];
        } else {
            return 1;
        }
    }

    function GetPatient($id) {
        $sql = "SELECT * FROM `patients` WHERE huisartsID = '{$_SESSION['id']}' AND id = '{$id}'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetch();
        return $data;
    }

    function UpdatePatientData($id) {
        $sql = "UPDATE `patients` SET voornaam = '{$_POST['voornaam']}', achternaam = '{$_POST['achternaam']}', email = '{$_POST['email']}', rijksregisternummer = '{$_POST['rijksregisternummer']}', telefoon = '{$_POST['telefoon']}', test_result = '{$_POST['test_result']}', created_At = '{$_POST['created_At']}' WHERE huisartsID = '{$_SESSION['id']}' AND id = '{$id}'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return true;
    }

    function UpdateTestResultPatient($id) {
        $sql = "UPDATE `patients` SET test_result = '{$_POST['test_result']}' WHERE huisartsID = '{$_SESSION['id']}' AND id = '{$id}'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return true;
    }
    
    function GetAllProgressPatients() {
        $offset = ($this->page - 1) * 10;
        $sql = "SELECT * FROM `patients` WHERE huisartsID = '{$_SESSION['id']}' AND test_result = 'In progress' ORDER BY created_At DESC LIMIT 10 OFFSET {$offset}";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function CountAllProgressPatients() {
        $sql = "SELECT COUNT(id) FROM `patients` WHERE huisartsID = '{$_SESSION['id']}' AND test_result = 'In progress'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $pdo_statement->rowCount();
        return $pdo_statement->fetch()[0];
    }

    function GetAllPositivePatients() {
        $offset = ($this->page - 1) * 10;
        $sql = "SELECT * FROM `patients` WHERE huisartsID = '{$_SESSION['id']}' AND test_result = 'Positive' ORDER BY voornaam ASC LIMIT 10 OFFSET {$offset}";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function CountAllPositivePatients() {
        $sql = "SELECT COUNT(id) FROM `patients` WHERE huisartsID = '{$_SESSION['id']}' AND test_result = 'Positive'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $pdo_statement->rowCount();
        return $pdo_statement->fetch()[0];
    }

    function GetAllPatients() {
        $offset = ($this->page - 1) * 10;
        $sql = "SELECT * FROM `patients` WHERE huisartsID = '{$_SESSION['id']}' ORDER BY voornaam ASC LIMIT 10 OFFSET {$offset}";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function CountAllPatients() {
        $sql = "SELECT COUNT(id) FROM `patients` WHERE huisartsID = '{$_SESSION['id']}'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $pdo_statement->rowCount();
        return $pdo_statement->fetch()[0];
    }

    function __destruct() {
    
    }
}