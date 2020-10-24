<?php 
    session_start();

    require_once (__DIR__ . '/../libs/index.php');

    $pagetitle = "Overview";

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container-fluid">
    <section class="dashboard">
        <a href="/Huisarts/addpatient.php" class="dashboard_block">
            <i class="fas fa-plus"></i>
            <h4>Patiënt toevoegen</h4>
        </a>
        <a href="/Huisarts/patienten.php" class="dashboard_block">
            <i class="fas fa-users"></i>
            <h4>Patiënten</h4>
        </a>
        <a href="/Huisarts/positive_cases.php" class="dashboard_block">
            <i class="fas fa-vial"></i>
            <h4>Positieve tests</h4>
        </a>
        <a href="/Huisarts/tests_progress.php" class="dashboard_block">
            <i class="fas fa-vials"></i>
            <h4>Tests in afwachting</h4>
        </a>
        <a href="/logout.php" class="dashboard_block">
            <i class="fas fa-power-off"></i>
            <h4>Logout</h4>
        </a>
    </section>
</main>
<?php
    include_once (__DIR__.'/../views/layout/end.php');
?>