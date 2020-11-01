<?php 

class Patienten {
    function __construct() {
        global $db;
        $this->db = $db;
        $this->page = $this->SetPage();
        $this->offset = ($this->page - 1) * 10;
    }

    function SetPage() {
        if(isset($_GET['page'])) {
            return $_GET['page'];
        } else {
            return 1;
        }
    }

    function GetAllPatientNamesRijksRegister() {
        $sql = "SELECT id, voornaam, achternaam, rijksregisternummer 
                FROM `patients` 
                WHERE huisartsID = :huisartsid";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsid' => $_SESSION['id'],
        ]);
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function GetLastIDOfTable($tablename) {
        $sql = "SELECT AUTO_INCREMENT 
                FROM information_schema.TABLES 
                WHERE TABLE_SCHEMA = :dbname AND TABLE_NAME = :tablename";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':tablename' => $tablename,
            ':dbname' => DB_NAME
        ]);
        return $pdo_statement->fetch()[0];
    }

    function GetPreviousDateCovidTest($patientID) {
        $sql = "SELECT covid_tests.created_At 
                FROM `patients` 
                LEFT JOIN `covid_tests` ON patients.`last_covid-test_id` = covid_tests.id 
                WHERE patients.huisartsID = :huisartsID AND covid_tests.patientID = :patientID";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $_SESSION['id'],
            ':patientID' => $patientID,
        ]);
        return $pdo_statement->fetch()[0];
    }

    function AddCovidTest() {
        $lastid = $this->GetLastIDOfTable('covid_tests');
        $previousdate = $this->GetPreviousDateCovidTest($_POST['id']);

        $sql = "INSERT INTO `covid_tests` 
                (test_result, patientID, created_At) 
                VALUES 
                (:testresult, :patientID, :date);";

        if(!!$previousdate) {
            if(strtotime($previousdate) <= strtotime($_POST['date'])) $sql .= "UPDATE `patients` SET `last_covid-test_id` = :lastid WHERE id = :patientID";
        }

        $pdo_statement = $this->db->prepare($sql);

        $pdo_statement->bindParam(':testresult', $_POST['testresult']);
        $pdo_statement->bindParam(':date', $_POST['date']);
        $pdo_statement->bindParam(':patientID', $_POST['id'], PDO::PARAM_INT);

        if(!!$previousdate) {
            if(strtotime($previousdate) <= strtotime($_POST['date'])) $pdo_statement->bindParam(':lastid', $lastid, PDO::PARAM_INT);
        }

        $pdo_statement->execute();
        return true;
    }

    function GetPatient($id) {
        $sql = "SELECT * FROM `patients` WHERE huisartsID = :huisartsid AND id = :patientid";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsid' => $_SESSION['id'],
            ':patientid' => $id,
        ]);
        $data = $pdo_statement->fetch();
        return $data;
    }

    function GetPatientCovidTests($id) {
        $sql = "SELECT * FROM `covid_tests` WHERE patientID = :patientid";
        $pdo_statement = $this->db->prepare($sql);
        
        $pdo_statement->execute([
            ':patientid' => $id,
        ]);
        $data = $pdo_statement->fetchAll();
        return $data;
    }


    function UpdatePatientData($id) {
        $sql = "UPDATE `patients` 
                SET voornaam = :voornaam, achternaam = :achternaam, email = :email, rijksregisternummer = :rijksregisternummer, telefoon = :telefoon, created_At = :createdAt 
                WHERE huisartsID = :huisartsID AND id = :id";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':voornaam' => $_POST['voornaam'],
            ':achternaam' => $_POST['achternaam'],
            ':email' => $_POST['email'],
            ':rijksregisternummer' => $_POST['rijksregisternummer'],
            ':telefoon' => $_POST['telefoon'],
            ':createdAt' => $_POST['created_At'],
            ':huisartsID' => $_SESSION['id'],
            ':id' => $id,
        ]);
        return true;
    }

    function UpdateTestResultPatient($id) {
        $sql = "UPDATE `patients` SET test_result = :testresult WHERE huisartsID = :huisartsID AND id = :id";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':testresult' => $_POST['test_result'],
            ':huisartsID' => $_SESSION['id'],
            ':id' => $id
        ]);
        return true;
    }

    function CountAllProgressPatients() {
        $sql = "SELECT COUNT(id) FROM `patients` WHERE huisartsID = :huisartsID AND test_result = :testresult";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $_SESSION['id'],
            ':testresult' => 'In progress',
        ]);
        $pdo_statement->rowCount();
        return $pdo_statement->fetch()[0];
    }

    function GetAllTypePatients($type) {
        $sql = "SELECT patients.*, covid_tests.created_At AS `testdate`, covid_tests.test_result 
                FROM `patients` 
                LEFT JOIN `covid_tests` ON patients.`last_covid-test_id` = covid_tests.id 
                WHERE patients.huisartsID = :huisartsID AND covid_tests.test_result = :testresult 
                ORDER BY `testdate` ASC 
                LIMIT 10 OFFSET :offset";
        $pdo_statement = $this->db->prepare($sql);

        $pdo_statement->bindParam(':huisartsID', $_SESSION['id']);
        $pdo_statement->bindParam(':testresult', $type);
        $pdo_statement->bindParam(':offset', $this->offset, PDO::PARAM_INT);

        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();

        return $data;
    }

    function CountAllTypePatients($type) {
        $sql = "SELECT patients.*, covid_tests.created_At AS `testdate`, covid_tests.test_result 
                FROM `patients` 
                LEFT JOIN `covid_tests` ON patients.`last_covid-test_id` = covid_tests.id 
                WHERE patients.huisartsID = :huisartsID AND covid_tests.test_result = :testresult";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $_SESSION['id'],
            ':testresult' => $type,
        ]);
        return $pdo_statement->rowCount();
    }

    function GetAllPatients() {
        $sql = "SELECT patients.*, covid_tests.created_At AS `testdate`, covid_tests.test_result 
                FROM `patients` LEFT JOIN `covid_tests` ON patients.`last_covid-test_id` = covid_tests.id 
                WHERE patients.huisartsID = :huisartsID LIMIT 10 OFFSET :offset";
        $pdo_statement = $this->db->prepare($sql);

        $pdo_statement->bindParam(':offset', $this->offset, PDO::PARAM_INT);
        $pdo_statement->bindParam(':huisartsID', $_SESSION['id']);
        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function CountAllPatients() {
        $sql = "SELECT COUNT(id) FROM `patients` WHERE huisartsID = :huisartsID";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $_SESSION['id']
        ]);
        $pdo_statement->rowCount();
        return $pdo_statement->fetch()[0];
    }

    function GetAllSearchPatients() {
        $offset = ($this->page - 1) * 9;
        $search = "%{$_GET['search']}%";

        $sql = "SELECT * FROM `patients` 
                WHERE huisartsID = :huisartsID AND (voornaam LIKE :search OR achternaam LIKE :search OR email LIKE :search OR rijksregisternummer LIKE :search) LIMIT 9 OFFSET :offset";

        $pdo_statement = $this->db->prepare($sql);

        $pdo_statement->bindParam(':huisartsID', $_SESSION['id']);
        $pdo_statement->bindParam(':search', $search);
        $pdo_statement->bindParam(':offset', $offset, PDO::PARAM_INT);

        $pdo_statement->execute();
        $data = $pdo_statement->fetchAll();
        return $data;
    }

    function CountAllSearchPatients() {
        $sql = "SELECT COUNT(id) FROM `patients` 
                WHERE huisartsID = :huisartsID AND (voornaam LIKE :search OR achternaam LIKE :search OR email LIKE :search OR rijksregisternummer LIKE :rijksregisternummer) ";
        $pdo_statement = $this->db->prepare($sql);
        $pdo_statement->execute([
            ':huisartsID' => $_SESSION['id'],
            ':search' => "%{$_GET['search']}%",
            ':rijksregisternummer' => "{$_GET['search']}%",
        ]);
        $pdo_statement->rowCount();
        return $pdo_statement->fetch()[0];
    }

    function __destruct() {
    
    }
}