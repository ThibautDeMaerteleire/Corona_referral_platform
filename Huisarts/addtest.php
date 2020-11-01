<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Add COVID test";

    $Patienten = new Patienten();
    $mypatients = $Patienten->GetAllPatientNamesRijksRegister();

    if(isset($_POST['id']) && isset($_POST['testresult']) && isset($_POST['date'])) {
        $addtest = $Patienten->AddCovidTest();
    }

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container wrapper covidtest">
    <?php 
        if(isset($addtest)) {
            echo "<div class='alert alert-success' role='alert' style='margin-bottom: 3rem;'>Je hebt succesvol een COVID test toegevoegd.</div>";
        }
    ?>
    <h2>COVID test toevoegen</h2>
    <hr>
    <form action="/Huisarts/addtest.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4 col-sm-12">
                <label for="patient">Selecteer je patiënt</label>
                <select id="patient" name="id" class="custom-select" size="5" required>
                    <?php
                        foreach ($mypatients as $key => $patient) {
                            echo "<option rijksregisternummer='{$patient['rijksregisternummer']}' value='{$patient['id']}'>{$patient['voornaam']} {$patient['achternaam']}</option>";
                        }
                        $mypatients
                    ?>
                </select>
            </div>
            <div class="form-row col-md-8 col-sm-12">
                <div class="form-group col-md-6 col-sm-12">
                    <label for="date">Datum afname test</label>
                    <input type="datetime-local" id="date" name="date" value="<?=(date("Y-m-d\TH:i"))?>" min="2019-06-07T00:00" max="<?=(date("Y-m-d\TH:i",strtotime("+1 week")))?>">
                </div>
                <div class="form-group col-md-6 col-sm-12">
                    <label for="testresult">Test resultaat</label>
                    <select name="testresult" id="testresult">
                        <option value="In progress" selected>&nbsp;&nbsp;In progress</option>
                        <option value="Positive">&nbsp;&nbsp;Positive</option>
                        <option value="Negative">&nbsp;&nbsp;Negative</option>
                    </select>
                </div>
                <div class="form-group col-12">
                    <label>Rijksregisternummer geselecteerde patiënt</label>
                    <input type="text" id="rijksregister" value="" disabled>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn-3">Test toevoegen</button>
            </div>
        </div>
    </form>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>