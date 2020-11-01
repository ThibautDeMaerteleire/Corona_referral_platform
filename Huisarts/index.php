<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Navigation.php');

    $pagetitle = "Overview";

    include_once (__DIR__.'/../views/layout/starter.php');

    $Navigation = new Navigation();
    $navitems = $Navigation->GetNavBlocks();
?>
<main class="container-fluid">
    <section class="dashboard">
        <?php
            foreach ($navitems as $item) {
                include (__DIR__.'/../views/components/nav-block.php');
            }
        ?>
    </section>
</main>
<?php
    include_once (__DIR__.'/../views/layout/end.php');
?>