<?php
    session_start();
    require_once (__DIR__.'/libs/index.php');
    require_once (__DIR__.'/models/Register.php');


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
            <a class="text-center w-100 d-block otherauth" href="/login.php">Login to your account</a>
        </div>
        <form action="/register.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1>Register</h1>
            <div class="form-group">
                <label for="email">Email</label>
                <input placeholder="Email" id="email" type="email" name="email" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input placeholder="Password" id="password" type="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <select name="type" id="type" class="custom-select custom-select-lg" required>
                    <option value="1">Patiënt</option>
                    <option value="2">Huisarts</option>
                    <option value="3">Ziekenhuis</option>
                    <option value="4">Contacttracer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="thumbnail" id="thumbnail">
                    <label class="custom-file-label font-weight-normal" for="thumbnail" data-browse="Afbeelding kiezen">
                        Voeg je afbeelding toe
                    </label>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="privacy" name="privacy" value="privacy" required>
                <label class="form-check-label" for="privacy">Ik ga akkoord met het <a href="/privacy.php" target="_blank" rel="noopener noreferrer">privacybeleid</a></label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="rules" name="rules" value="rules" required>
                <label class="form-check-label" for="rules">Ik ga akkoord met <a href="/rules&terms.php" target="_blank" rel="noopener noreferrer">regels & algemene voorwaarden</a></label>
            </div>
            <button type="submit">
                Register
            </button>
        </form>
    </section>
</main>
<?php 
    include_once (__DIR__.'/views/layout/end.php');
?>