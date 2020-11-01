<?php 
    include_once (__DIR__.'/../../models/Navigation.php');
    if(!isset($db)) include_once (__DIR__.'/../../libs/db.php');

    $Navigation = new Navigation();
    $navitems = $Navigation->GetTypeNavigation();
    $type = $Navigation->GetCurrentDirectoryType();

?>

<nav class="header_nav container-fluid <?php if($type !== "Static") echo 'd-flex justify-content-between align-items-center'; ?>">
    <ul class="d-flex <?php if($type === "Static") echo 'justify-content-center'; ?> align-items-center">
        <?php
            foreach ($navitems as $item) {
                echo "<li><a href='{$item['path']}?page=1'>{$item['name']}</a></li>";
            }
        ?>
    </ul>
    <?php if($type !== "Static") include_once (__DIR__.'/searchform.php') ?>
</nav>