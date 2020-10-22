<header>
    <section class="header_top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="/Huisarts/" class="logo">Corona Referral</a>
            <p>&#9995; Check out our new version &#9995;</p>
            <div class="auth d-flex">
                <div class="auth dropdown">
                    <?php 
                        if(isset($_SESSION['email']) && isset($_SESSION['type'])) {
                            echo "<div class='btn-group'>
                            <a type='button' class='dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                {$_SESSION['email']}
                            </a>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item' type='button' href='/{$_SESSION['type']}/'>Dashboard</a>
                                <a class='dropdown-item' type='button' href='/settings.php'>Settings</a>
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
        </div>
    </section>
    <nav class="header_nav d-flex justify-content-between align-items-center container-fluid ">
        <ul class="d-flex align-items-center">
            <li><a href="/Huisarts/index.php">Dashboard</a></li>
            <li><a href="/Huisarts/addpatient.php">Patiënt toevoegen</a></li>
            <li><a href="/Huisarts/patienten.php">Patiënten</a></li>
            <li><a href="/Huisarts/positive_cases.php">Positieve tests</a></li>
            <li><a href="/Huisarts/tests_progress.php">Tests in progress</a></li>
        </ul>
        <form action="/Huisarts/searchpatients.php" method="POST">
            <input class="form-control" placeholder="Search ..." type="text">
        </form>
    </nav>
</header>