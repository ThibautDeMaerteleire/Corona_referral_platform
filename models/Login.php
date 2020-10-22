<?php 

require_once (__DIR__.'/../libs/db.php');

class Login {
    function __construct($email, $password) {
        global $db;
        $this->db = $db;
        $this->email = strtolower($email);
        $this->password = $password;
    }

    function CheckIfMailExists() {
        $sql = "SELECT accounts.id, accounts.email, accounts.password, account_types.type  FROM `accounts` INNER JOIN `account_types` ON accounts.type = account_types.id WHERE accounts.email='{$this->email}'";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        $rows = $pdo_statement->rowCount();
        if($rows > 0) {
            return $data;
        } else {
            return false;
        }
    }

    function CheckPassword($hashed_pwd) {
        return password_verify($this->password, $hashed_pwd);
    }

    function __destruct() {
        if($this->CheckIfMailExists()) {
            $data = $this->CheckIfMailExists();
            if($this->CheckPassword($data[0]['password'])) {
                return $data;
            } else {
                return "Error password";
            }
        } else {
            return "Error email";
        }
        
    }
}