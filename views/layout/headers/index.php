<?php
    if(isset($_SESSION["type"]) && dirname($_SERVER['REQUEST_URI']) != '\\') {
        switch ($_SESSION["type"]) {
            case 'Patient':
                include_once  (__DIR__.'/patient.php');
                break;

            case 'Ziekenhuis':
                include_once (__DIR__.'/ziekenhuis.php');
                break;
            
            case 'Huisarts':
                include_once (__DIR__.'/huisarts.php');
                break;

            case 'Contacttracer':
                include_once (__DIR__.'/contacttracer.php');
                break;

            default:
                include_once (__DIR__.'/static.php');
                break;
        };
    } else {
        include_once (__DIR__.'/static.php');
    }

?>