<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Search";

    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container-fluid wrapper">
    <?php 
        if(isset($_GET['search'])) {
            $patienten = new Patienten();
            $patientenlijst = $patienten->GetAllSearchPatients();
            $totalPatients = $patienten->CountAllSearchPatients();
            if(strlen($_GET['search'])>0) {
                if($totalPatients == 0) {
                    echo "<p>No records found.</p>";
                } else {
    ?>
    <p>All of the results for <b><?=$_GET['search']?></b> : </p>
    <?php
                include_once (__DIR__.'/../views/components/search.php');
                include_once (__DIR__.'/../views/components/paginering.php');
                }
            } else {
                echo "<p>No search input was given/</p>";
            }
        } else {
    ?>
    <p>No records found.</p>
    <?php
        }
    ?>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>