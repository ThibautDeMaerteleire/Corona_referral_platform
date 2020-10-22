<header>
    <section class="header_top">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="/" class="logo">Corona Referral</a>
            <p>&#9995;  Check out our new version  &#9995;</p>
            <div class="auth d-flex">
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
    </section>
    <nav class="header_nav">
        <ul class="container-fluid d-flex justify-content-center align-items-center">
            <li><a href="/">Home</a></li>
            <li><a href="/patient.php">Patiënt</a></li>
            <li><a href="/huisarts.php">Huisarts</a></li>
            <li><a href="/ziekenhuis.php">Ziekenhuis</a></li>
            <li><a href="/overons.php">Over ons</a></li>
            <li><a href="/contact.php">Contact</a></li>
        </ul>
    </nav>
</header>
