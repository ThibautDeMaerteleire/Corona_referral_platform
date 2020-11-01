<?php 

class Autocomplete {
    function __construct() {
        global $db;
        $this->db = $db;
        $this->huisartsID = $_POST['huisartsID'];
        $this->search = "%{$_POST['search']}%";
    }

    function GetPatientsFromSearch() {

        $sql = "SELECT id, voornaam, achternaam FROM `patients` WHERE huisartsID = :huisartsID AND (voornaam LIKE :search OR achternaam LIKE :search OR email LIKE :search OR rijksregisternummer LIKE :search) LIMIT 5";

        $pdo = $this->db->prepare($sql);
        $pdo->execute([
            ':huisartsID' => $this->huisartsID,
            ':search' => $this->search,
        ]);

        return $pdo->fetchALl(PDO::FETCH_OBJ);
    }

    function __destruct() {
        $data = $this->GetPatientsFromSearch();

        if(count($data) > 0) {
            http_response_code(200);
            echo json_encode($data);
        } else {
            http_response_code(404);
            echo "Nothing found ...";
        }
    }
}