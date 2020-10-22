<?php 
    $pagetitle = "Home";

    $ziekenhuizen = (object) [
        'title' => 'Voor Ziekenhuizen',
        'text' => 'Geef jouw cijfers van de ziekenhuizen door, hou bij wie besmet is en onderhoud direct contact met de contacttracers door de besmette patiënten direct door te geven.',
        'img' => 'hospital_healthcare.jpg',
        'url' => 'ziekenhuizen.php',
    ];

    $huisartsen = (object) [
        'title' => 'Voor Huisartsen',
        'text' => 'Hoe ga je als huisarts om met corona? Hoe geef ik mijn coronapatiënten snel en efficiënt door aan andere huisartsen, contacttracers en andere patiënten die in contact zijn geweest met de besmette persoon? Je vindt alle info op de pagina voor huisartsen.',
        'img' => 'digital_doctor.jpg',
        'url' => 'huisartsen.php',
    ];

    $patienten = (object) [
        'title' => 'Voor Patiënten',
        'text' => 'Hoe ga ik correct om met corona? Waar kan ik doorgeven met wie ik in contact gekomen ben? Wat te doen bij besmetting? Vindt alle info op de pagina die zich specifiek naar de patiënt toe richt.',
        'img' => 'strong.jpg',
        'url' => 'patients.php',
    ];

    $data_smallcards = [$patienten, $huisartsen, $ziekenhuizen]; 

    include_once (__DIR__.'/views/layout/starter.php');
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
                foreach ($data_smallcards as $value) {
                    $title = $value->title;
                    $text = $value->text;
                    $img = $value->img;
                    $url = $value->url;
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