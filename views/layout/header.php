<?php
    if(isset($_SESSION['type'])) {
        $homeurl = "/{$_SESSION['type']}/";
    } else {
        $homeurl = '/';
    }
?>
<header class="">
    <section class="header_top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="<?=$homeurl?>" class="logo">Corona Referral</a>
            <p>&#9995;  Check out our new version  &#9995;</p>
            <div class="auth d-flex">
                <?php 
                    if(isset($_SESSION['thumbnail'])) {
                        $displayThumbnail = "<img class='thumbnail' src='{$_SESSION['thumbnail']}'>";
                    } else {
                        $displayThumbnail = "";
                    }

                    if(isset($_SESSION['email']) && isset($_SESSION['type'])) {
                        echo "<div class='btn-group'>
                        <a type='button' class='dropdown-toggle d-flex align-items-center' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            {$displayThumbnail} {$_SESSION['email']}
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                            <a class='dropdown-item' type='button' href='/{$_SESSION['type']}/'>Dashboard</a>
                            <a class='dropdown-item' type='button' href='/{$_SESSION['type']}/settings.php'>Settings</a>
                            <a class='dropdown-item' type='button' href='/logout.php'>Log out</a>
                        </div>
                    </div>";
                    } else {
                        echo "
                            <a href='/login.php'>login</a>
                            <span class='slash'>/</span>
                            <a href='/register.php'>register</a>";
                    }
                ?>
            </div>
        </div>
    </section>
<?php
    include_once 'navigation.php';
?>
</header>