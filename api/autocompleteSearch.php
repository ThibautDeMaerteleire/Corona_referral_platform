<?php 

require_once (__DIR__.'/models/AutocompleteSearch.php');
require_once (__DIR__.'/../libs/db.php');

if(isset($_POST["search"]) && isset($_POST['huisartsID'])) {
    new Autocomplete($_POST["search"]);
} else {
    http_response_code(406);
    echo "No search input was given.";
}