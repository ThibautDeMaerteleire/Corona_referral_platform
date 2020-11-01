<?php 

class Navigation {
    function __construct($dir = 'Static') {
        global $db;
        $this->db = $db;
        $this->accounttype = $this->GetType();
        $this->directory = $this->GetCurrentDirectoryType();
    }

    function GetCurrentDirectoryType() {
        $dirname = explode('/', $_SERVER['PHP_SELF'])[1];
        if($dirname === 'Patient' || $dirname === 'Huisarts' || $dirname === 'Contacttracer' || $dirname === 'Ziekenhuis' || $dirname === 'Labo') {
            return $this->accounttype;
        } else {
            return 'Static';
        }
    }

    function GetType() {
        if(isset($_SESSION['type'])) {
            return $_SESSION['type'];
        } else {
            return 'Static';
        }
    }

    function GetTypeNavigation() {
        $sql = "SELECT name, path FROM `navigation` WHERE type = :type";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':type' => $this->directory,
        ]);
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function GetNavBlocks() {
        $sql = "SELECT * FROM `navigation` WHERE (type = :type OR name = :name) AND LENGTH(icon) > 0";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':type' => $this->accounttype,
            ':name' => 'Logout',
        ]);
        $data = $pdo_statement->fetchAll();
        return $data;
    }
}