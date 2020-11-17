<?php

class Account {
    function __construct() {
        global $db;
        $this->db = $db;
    }

    function GetAccountWithEmailOrRijksregister($email, $rijksregister, $type = false) {
        $sql = "SELECT id FROM `accounts` WHERE (rijksregisternummer = :rijksregisternummer OR email = :email)";

        if(!!$type) $sql .= " AND type = :type";

        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':rijksregisternummer' => $rijksregister,
            ':email' => $email,
            ':type' => $type,
        ]);
        $data = $pdo_statement->fetch();
        if(!$data) return NULL;
        return $data['id'];
    }
}