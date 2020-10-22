<?php 
    session_start();

    require_once (__DIR__.'/../libs/db.php');
    require_once (__DIR__.'/../models/Patientspecific.php');

    $pagetitle = "Patienten";

    require_once (__DIR__.'/../libs/AuthRedirecter.php');

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container">
    <h2>Patiënt naam</h2>
    
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>