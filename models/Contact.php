<?php

class Contact {
    function __construct() {
        global $db, $EMAIL;
        $this->db = $db;
        $this->email = $EMAIL;
    }

    function SendEmail() {
        if(isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
            $headers = 'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n" . 'From: '.$_POST['email']."\r\n". 'Reply-To: '.$_POST['email']."\r\n" . 'X-Mailer: PHP/' . phpversion();
            mail($this->email, $_POST['subject'], $_POST['message'], $headers);
            return true;
        }
    }


}