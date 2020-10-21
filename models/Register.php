<?php 

require_once 'config/index.php';

class Register {
    function __construct($email, $password, $type) {
        global $db;
        $this->db = $db;
        $this->email = strtolower($email);
        $this->password = $password;
        $this->type = $type;
    }

    function CheckIfMailExists() {
        $sql = "SELECT * FROM `accounts` WHERE email LIKE '{$this->email}'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $pdo_statement->fetchAll();
        $rows = $pdo_statement->rowCount();
        if($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function EncryptPassword() {
        $options = [
            'cost' => 12
        ];

        return password_hash($this->password, PASSWORD_BCRYPT, $options);
    }


    function CreateAccount() {
        $sql = "INSERT INTO `accounts` (email, password, type) VALUES ('{$this->email}', '{$this->EncryptPassword()}', '{$this->type}')";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return true;
    }

    function __destruct() {
        if($this->CheckIfMailExists()) {
            return false;
        }
        if($this->CreateAccount()) {
            return true;
        }
    }
}