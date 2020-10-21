<?php 
    if(isset($_SESSION["type"])) {
        switch ($_SESSION["type"]) {
            case 'patient':
                include_once 'patient.php';
                break;

            case 'ziekenhuis':
                include_once 'ziekenhuis.php';
                break;
            
            case 'huisarts':
                include_once 'huisarts.php';
                break;

            case 'contacttracer':
                include_once 'contacttracer.php';
                break;

            default:
                include_once 'static.php';
                break;
        };
    } else {
        include_once 'static.php';
    }

?>