<?php
    session_start();

    $pagetitle = "Login";



    include_once 'views/layout/starter.php';
?>
<main>
    <section class="container d-flex justify-content-between align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <img src="/assets/images/privacy.png" alt="Corona privacy">
            <a class="text-center w-100 d-block otherauth" href="/register.php">Create an account</a>
        </div>
        <form action="/login.php" method="POST" class="d-flex flex-column col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1>Login</h1>
            <input placeholder="Email" type="email" name="email" required>
            <input placeholder="Password" type="password" name="password" required>
            <div class="d-flex justify-content-between align-items-center">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme" value="rememberme">
                    <label class="form-check-label" for="rememberme">Remember me</label>
                </div>
                <a href="/forgotpassword.php">Forgot password ?</a>
            </div>
            <button type="submit">
                Log In
            </button>
        </form>
    </section>
</main>
<?php 
    include_once 'views/layout/end.php';
?>