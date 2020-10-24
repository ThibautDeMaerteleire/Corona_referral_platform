<?php 
    $pagetitle = "Over ons";

    include_once (__DIR__.'/views/layout/starter.php');
?>
<main class="container wrapper">
    <section class="d-flex justify-content-between align-items-center">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <img src="/assets/images/passion.jpg" alt="Passion">
        </div>
        <div class="d-flex flex-column col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <h1 class="special">Wie zijn we ?</h1>
            <p>
                Wij zijn de nieuwe digital creatives van morgen. Opgeleid in de richting graduaat programmeren te Arteveldehogeschool. Hier zijn we gevormd en verslaafd geraakt aan onze passie. <q>Addicted to code.</q> Voor elk probleem bieden wij een digitale oplossing. Wij staan voor het afleveren van kwaliteit en een open communicatie naar de klant toe.
            </p>
        </div>
    </section>
    <section class="col-12">
        <h1>Ons team</h1>
        <hr class="design_2">
        <div class="team">
            <div class="teammember" href="https://www.linkedin.com/in/thibaut-de-maerteleire-4131b0152/">
                <div class="teammember_thumbnail">
                    <div class="child" style="background-image: url('/assets/images/team/thibaut.jpg');"></div>
                </div>
                <h5>Thibaut</h5>
                <p>CEO</p>
            </div>
            <div class="teammember" href="https://www.linkedin.com/in/thibaut-de-maerteleire-4131b0152/">
                <div class="teammember_thumbnail">
                    <div class="child" style="background-image: url('/assets/images/passion.jpg');"></div>
                </div>
                <h5>Thibaut</h5>
                <p>Designer</p>
            </div>
            <div class="teammember" href="https://www.linkedin.com/in/thibaut-de-maerteleire-4131b0152/">
                <div class="teammember_thumbnail">
                    <div class="child" style="background-image: url('/assets/images/programming.jpg');"></div>
                </div>
                <h5>Thibaut</h5>
                <p>Developer</p>
            </div>
            <div class="teammember" href="https://www.linkedin.com/in/thibaut-de-maerteleire-4131b0152/">
                <div class="teammember_thumbnail">
                    <div class="child" style="background-image: url('/assets/images/think.jpg');"></div>
                </div>
                <h5>Thibaut</h5>
                <p>Product manager</p>
            </div>
        </div>
    </section>
</main>

<?php
    include_once (__DIR__.'/views/layout/end.php');
?>