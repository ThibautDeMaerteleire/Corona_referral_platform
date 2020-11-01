<?php 
    session_start();

    $pagetitle = "Error 404";

    include_once (__DIR__.'/views/layout/starter.php');

?>
<main class="container">
    <section class="wrapper text-center">
       <h1 style="font-size: 5rem; font-weight: 700; margin-bottom: 1rem; ">Error 500</h1>
       <p style="font-size: 3rem; font-weight: 500; color: var(--danger)">Internal server error</p>
    </section>
</main>
<?php
    include_once (__DIR__.'/views/layout/end.php');
?>