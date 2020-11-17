<?php 

class Contacts {
    function __construct() {
        global $db;
        $this->db = $db;
    }

    function AddContact() {
        $email = $_POST['email'];
        $rijksregisternummer = $_POST['rijksregisternummer'];
        $telefoon = $_POST['telefoon'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $datecontact = $_POST['date'];
        $accountID = $_SESSION['id'];

        require (__DIR__.'/Patienten.php');
        $Patient = new Patienten();
        $patientID = $Patient->GetPatientWithEmailOrRijksregister($email, $rijksregisternummer);

        $sql = "INSERT INTO `contacts` 
                (patientID, voornaam, achternaam, email, rijksregisternummer, date_of_contact, accountID, telefoon) 
                VALUES 
                (:patientID, :voornaam, :achternaam, :email, :rijksregisternummer, :datecontact, :accountID, :telefoon)";

        $pdo = $this->db->prepare($sql);
        $pdo->execute([
            ':patientID' => $patientID,
            ':voornaam' => $voornaam,
            ':achternaam' => $achternaam,
            ':telefoon' => $telefoon,
            ':email' =>  $email,
            ':rijksregisternummer' => $rijksregisternummer,
            ':datecontact' =>  $datecontact,
            ':accountID' =>  $accountID,
        ]);

        return "{$voornaam} {$achternaam} is succesvol aan je contacten toegevoegd.";
    }

    function GetAllContacts() {
        $sql = "SELECT contacts.*, covid_tests.created_At AS covidTestDate, covid_tests.test_result FROM `contacts` LEFT JOIN `covid_tests` ON contacts.patientID = covid_tests.patientID WHERE contacts.accountID = :accountID ORDER BY created_At, covid_tests.created_At DESC";

        $pdo = $this->db->prepare($sql);
        $pdo->execute([
            ":accountID" => $_SESSION['id'],
        ]);

        return $pdo->fetchAll();
    }

}