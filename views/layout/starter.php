<?php

    // Check if session is already started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Giving default pagetitle
    if(!isset($pagetitle)) {
        $pagetitle = "COVID";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="/assets/images/coronavirus.webp">
    <!-- Loading fontawesome logo kit -->
    <script src="https://kit.fontawesome.com/301a2cd1c0.js" crossorigin="anonymous"></script>
    <!-- Loading library animate.css -->
    <link defer rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- Loading Bootstrap javascript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Loading css -->
    <link rel="stylesheet" href="/main.css">
    <!-- Loading js -->
    <script defer type="module" src="/assets/scripts/main.js"></script>
    <!-- Setting title of the page -->
    <title><?=$pagetitle?> | Corona Referral Platform</title>
</head>
<body class="<?=str_replace(' ', '', $pagetitle)?>page">
    <!-- Javascript added alerts -->
    <div id="alert">

    </div>
    <!-- Adding header -->
    <?php 
        include_once (__DIR__.'/header.php');
    ?>