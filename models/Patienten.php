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
        return $this->GetAllPatients();
    }
}