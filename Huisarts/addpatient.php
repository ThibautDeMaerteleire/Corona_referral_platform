<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Add patient";

    if(isset($_POST['email']) && isset($_POST['rijksregisternummer']) && isset($_POST['voornaam']) && isset($_POST['achternaam']) && isset($_POST['telefoon'])) {
        $patienten = new Patienten();
        $addpatient = $patienten->AddPatient();
    }

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container">
    <?php 
        if(isset($addpatient)) {
            echo "<div class='alert alert-success' role='alert' style='margin-bottom: 3rem;'>Je hebt {$_POST['voornaam']} {$_POST['achternaam']} succesvol aan je patiëntenlijst toegevoegd.</div>";
        }
    ?>
    <h2>Patiënt toevoegen</h2>
    <hr>
    <form action="/Huisarts/addpatient.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="voornaam">Voornaam</label>
                <input placeholder="Voornaam" name="voornaam" type="text" id="voornaam" required>
            </div>
            <div class="form-group col-md-8 col-sm-12">
                <label for="achternaam">Achternaam</label>
                <input placeholder="Achternaam" name="achternaam" type="text" id="achternaam" required>
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input placeholder="Email" name="email" type="email" id="email" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6 col-sm-12">
                <label for="telefoon">Telefoon</label>
                <input placeholder="Telefoonnummer" name="telefoon" type="number" id="telefoon" maxlength="15" required>
            </div>
            <div class="form-group col-md-6 col-sm-12">
                <label for="rijksregisternummer">Rijksregisternummer</label>
                <input placeholder="Rijksregisternummer" name="rijksregisternummer" type="number" id="rijksregisternummer" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn-3">Patiënt toevoegen</button>
            </div>
        </div>
    </form>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>