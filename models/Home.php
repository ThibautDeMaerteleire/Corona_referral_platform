<?php
class Home {
    function __construct() {
        global $db;
        $this->db = $db;
    }

    function GetAllInfoCards() {
        $sql = "SELECT * FROM `info-cards`";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        return $data;
    }
}