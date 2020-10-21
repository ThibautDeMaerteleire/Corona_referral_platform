<?php 
class Subscribe {
    function __construct($email) {
        $this->email = $email;
    }

    function CheckIfSubscribed() {
        global $db;
        $sql = "SELECT * FROM `subscribers` WHERE email LIKE '{$this->email}'";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        $pdo_statement->fetchAll();
        $rows = $pdo_statement->rowCount();
        if($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function SubscribeEmail() {
        global $db;
        $sql = "INSERT INTO `subscribers` (email) VALUES ('{$this->email}')";
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        // $pdo_statement->fetchAll();
    }

    function __destruct() {
        $mailExists = $this->CheckIfSubscribed();
        if($mailExists) {
            http_response_code(406);
            echo "Your email is already on our subscribers list.";
        } else {
            http_response_code(200);
            $this->SubscribeEmail();
            echo "Your email is succesfully added to our mailing list.";
        }
    }
}