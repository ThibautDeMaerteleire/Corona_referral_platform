<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Addpatient.php');

    $pagetitle = "Settings";

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container wrapper">
    <?php include_once (__DIR__.'/../views/components/comingsoon.php'); ?>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>