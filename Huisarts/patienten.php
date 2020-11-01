<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Patienten";
    
    $patienten = new Patienten();
    $patientenlijst = $patienten->GetAllPatients();
    $totalPatients = $patienten->CountAllPatients();

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container-fluid wrapper">
    <h2>Patiënten</h2>
    <hr>
    <?php 
        include_once (__DIR__.'/../views/components/patienttable.php');
    ?>
    <?php 
        include_once (__DIR__.'/../views/components/paginering.php');
    ?>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>