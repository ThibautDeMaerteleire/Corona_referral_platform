<?php
    session_start();
    require_once 'libs/AuthRedirecter.php';
    require_once 'models/Register.php';


    $pagetitle = "Register";

    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['type'])) {
        $registration = new Register($_POST['email'], $_POST['password'], $_POST['type']);
        if($registration->__destruct()) {
            $val = "success";
            $message = "Your account is created.";
        } else {
            $val = "danger";
            $message = "Email is already used.";
        }
    }


    include_once 'views/layout/starter.php';
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
            <a class="text-center w-100 d-block otherauth" href="/login.php">Login to your account</a>
        </div>
        <form action="/register.php" method="POST" class="d-flex flex-column col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1>Register</h1>
            <input placeholder="Email" type="email" name="email" required>
            <input placeholder="Password" type="password" name="password" required>
            <select name="type" class="custom-select custom-select-lg" required>
                <option value="1">Patiënt</option>
                <option value="2">Huisarts</option>
                <option value="3">Ziekenhuis</option>
                <option value="4">Contacttracer</option>
            </select>
            <button type="submit">
                Register
            </button>
        </form>
    </section>
</main>
<?php 
    include_once 'views/layout/end.php';
?>