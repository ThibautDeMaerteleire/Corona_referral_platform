<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Tests in progress";
    
    $patienten = new Patienten();
    $patientenlijst = $patienten->GetAllTypePatients('In progress');
    $totalPatients = $patienten->CountAllTypePatients('In progress');

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container-fluid wrapper">
    <h2>Tests in afwachting</h2>
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