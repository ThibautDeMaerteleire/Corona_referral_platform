<?php 

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

class Register {
    function __construct($email, $password, $type) {
        global $db;
        $this->db = $db;
        $this->email = strtolower($email);
        $this->password = $password;
        $this->type = $type;
        $this->thumbnail = $this->GetThumbnail();
    }

    function GetThumbnail() {
        if(isset($_FILES['thumbnail'])) {
            $thumbnail = $_FILES['thumbnail'];
            $file_name = $thumbnail['name'];
            $file_size = $thumbnail['size'];
            $file_tmp = $thumbnail['tmp_name'];
            $file_type = $thumbnail['type'];

            $file_ext = explode('.',$file_name);
            $file_ext = strtolower(end($file_ext));

            $expensions = array("jpeg","jpg","png", "webp", "gif", "svg", "tif", "tiff", "raw");

            if(!in_array($file_ext,$expensions) || $file_size > 250*MB){
                return NULL;
            }

            $file_name = $this->email . "_" . $file_name;

            $file_location = "/assets/images/thumbnails/".$file_name;

            // Change location of file
            move_uploaded_file($file_tmp, __DIR__ . "/.." . $file_location);

            return $file_location;

        } else {
            return NULL;
        }
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
        $sql = "INSERT INTO `accounts` 
                (email, password, type, thumbnail) 
                VALUES 
                ('{$this->email}', '{$this->EncryptPassword()}', '{$this->type}', '{$this->thumbnail}')";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute();
        return true;
    }

    function __destruct() {
        if($this->CheckIfMailExists()) {
            return false;
        } else if ($this->CreateAccount()) {
            return true;
        }
    }
}