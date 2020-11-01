<?php 
class Subscribe {
    function __construct($email) {
        global $db;
        $this->db = $db;
        $this->email = $email;
    }

    function CheckIfSubscribed() {
        $sql = "SELECT * FROM `subscribers` WHERE email LIKE :email";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':email' => $this->email,
        ]);
        $pdo_statement->fetchAll();
        $rows = $pdo_statement->rowCount();
        if($rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    function SubscribeEmail() {
        $sql = "INSERT INTO `subscribers` (email) VALUES (:email)";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':email' => $this->email
        ]);
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