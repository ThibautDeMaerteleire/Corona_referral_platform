<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    } else {
        $id = 1;
    }

    $patient = new Patienten();

    if(isset($_POST['email'])) {
        $result_updated = $patient->UpdatePatientData($id);
    }

    $patientdata = $patient->GetPatient($id);


    $pagetitle = "Editpatient";

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container wrapper patientdetail">
    <?php 
        if(isset($result_updated)) {
            echo "<div class='alert alert-success w-100' role='alert'>Updated this patient succesfully</div>";
        }
    ?>
    <h2><?=$patientdata['voornaam']?> <?=$patientdata['achternaam']?></h2>
    <hr>
    <form action="/Huisarts/editpatient.php?id=<?=$id?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="voornaam">Voornaam</label>
                <input type="text" id="voornaam" name="voornaam" value="<?=$patientdata['voornaam']?>" placeholder="Voornaam">
            </div>
            <div class="form-group col-md-8">
                <label for="achternaam">Achternaam</label>
                <input type="text" id="achternaam" name="achternaam" value="<?=$patientdata['achternaam']?>" placeholder="Achternaam">
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?=$patientdata['email']?>" placeholder="Email">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefoon">Telefoonnummer</label>
                <input type="tel" id="telefoon" name="telefoon" value="<?=$patientdata['telefoon']?>" placeholder="Telefoon">
            </div>
            <div class="form-group col-md-6">
                <label for="rijksregisternummer">Rijksregisternummer</label>
                <input type="text" id="rijksregisternummer" name="rijksregisternummer" value="<?=$patientdata['rijksregisternummer']?>" placeholder="Rijksregisternummer">
            </div>
        </div>
        <div class="form-group">
            <label for="test_result">Test resultaat</label>
            <select name="test_result" id="test_result"><?=$patientdata['created_At']?>
                <option <?php if($patientdata['test_result'] == 'Negative') echo 'selected' ?>>Negative</option>
                <option <?php if($patientdata['test_result'] == 'In progress') echo 'selected' ?>>In progress</option>
                <option <?php if($patientdata['test_result'] == 'Positive') echo 'selected' ?>>Positive</option>
            </select>
        </div>
        <div class="form-group">
            <label for="datum">Datum test</label>
            <input type="text" name="created_At" id="datum" value="<?=$patientdata['created_At']?>" placeholder="Datum">
        </div>
        <button type="button" href="/Huisarts/patient.php?id=<?=$_GET['id']?>" class="btn btn-secondary">
            Go back
        </button>
        <button type="submit" class="btn btn-primary">
            Update data
        </button>
    </form>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>