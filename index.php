<?php 
    $pagetitle = "Home";

    include_once (__DIR__.'/views/layout/starter.php');

    include_once (__DIR__.'/models/Home.php');
    $Home = new Home();
    $data_smallcards = $Home->GetAllInfoCards(); 
?>
<main>
    <section class="container d-flex justify-content-between align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <img src="/assets/images/best-practices.png" alt="Corona vermijden">
        </div>
        <div class="d-flex flex-column col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1>Waarom ons platform ?</h1>
            <p>
                Ons platform zorgt voor een optimale communicatie tussen de patiënt, ziekenhuizen, huisartsen en contacttracers. Dankzij ons platform kan corona optimaal bestreden worden en kunnen we de verspreiding tegen gaan. 
            </p>
        </div>
    </section>
    <section style="padding: 5rem 0rem;" class="bg-light-green">
        <h1 class="text-center">Onze doelgroepen</h1>
        <div class="container d-flex justify-content-between align-items-center">
            <?php 
                foreach ($data_smallcards as $item) {
                    include (__DIR__.'/views/components/small-card.php');
                }
            ?>
        </div>
    </section>
    <form method="POST" id="subscribeform" class="container subscribe">
        <h1 class="text-center">Subscribe for updates</h1>
        <div class="d-flex justify-content-between align-items-center">
            <input name="email" type="email" placeholder="Email" id="subscribeEmail" required>
            <p id="subscribemessage"></p>
            <button class="btn-2" type="submit">Subscribe</button>
            <i class="succesfull far fa-check-circle"></i>
        </div>
    </form>
</main>

<?php
    include_once (__DIR__.'/views/layout/end.php');
?>