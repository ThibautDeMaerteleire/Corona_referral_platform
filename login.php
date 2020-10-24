<?php
    session_start();

    require_once (__DIR__.'/libs/db.php');

    require_once 'models/Login.php';

    $pagetitle = "Login";

    if(isset($_POST['email']) && isset($_POST['password'])) {
        $login = new Login($_POST['email'], $_POST['password']);
        $data = $login->__destruct();
        if($data == 'Error email') {
            $val = "danger";
            $message = "Email is incorrect.";
        } else if($data == 'Error password') {
            $val = 'danger';
            $message = "Password is incorrect.";
        } else if(is_array($data) || is_object($data)) {
            $_SESSION['id'] = $data[0]['id'];
            $_SESSION['email'] = $data[0]['email'];
            $_SESSION['type'] = $data[0]['type'];
            $_SESSION['thumbnail'] = $data[0]['thumbnail'];
        } else {
            $val = 'danger';
            $message = "Something went wrong.";
        }
    } else if(isset($_GET['logout'])) {
        $val = 'success';
        $message = "Succesfully logged out.";
    }

    require_once (__DIR__.'/libs/AuthRedirecter.php');


    include_once (__DIR__.'/views/layout/starter.php');
?>
<main>
    <?php 
        if(isset($message)) {
            echo "<div class='alert alert-{$val}' role='alert' style='margin-bottom: 3rem;'>{$message}</div>";
        }
    ?>
    <section class="container d-flex justify-content-between align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <img src="/assets/images/privacy.png" alt="Corona privacy">
            <a class="text-center w-100 d-block otherauth" href="/register.php">Create an account</a>
        </div>
        <form action="/login.php" method="POST" class="d-flex flex-column col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1>Login</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input placeholder="Email" id="email" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input placeholder="Password" id="password" type="password" name="password" required>
            </div>
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
    include_once (__DIR__.'/views/layout/end.php');
?>