<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    if(isset($_GET['id'])) {
        $patient = new Patienten();
        $deletedpatient = $patient->DeletePatient();
    } else {
        redirect('/404.php');
    }

    $pagetitle = "Delete patient";

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container wrapper">
    <?php 
        if(isset($deletedpatient)) {
            if(!!$deletedpatient) {
                echo "<div class='alert alert-danger w-100' role='alert'>Deleted patient {$deletedpatient} succesfully.</div>";
            } else {
                echo "<div class='alert alert-danger w-100' role='alert'>Something went wrong.</div>";
            }

        }
    ?>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>