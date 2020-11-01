<?php 
    $pagetitle = "Contact";

    include_once (__DIR__.'/views/layout/starter.php');

    include_once (__DIR__.'/models/Contact.php');
    $Contact = new Contact();
    if($Contact->SendEmail()) {
        $message = "<div style='margin-bottom: 2rem;' class='alert alert-success w-100 animate__animated animate__fadeInDown' role='alert'>Email send succesfully!</div>";
    } else {
        $message = '';
    }
?>
<main class="container wrapper">
    <?=$message?>
    <form action="/contact.php" method="POST">
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="Email" required>
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input id="subject" type="text" name="subject" placeholder="Subject" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="5" placeholder="Message" required></textarea>
        </div>
        <button type="submit">
            Send mail
        </button>
    </form>
</main>

<?php
    include_once (__DIR__.'/views/layout/end.php');
?>