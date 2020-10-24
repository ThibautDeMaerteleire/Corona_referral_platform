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

    if(isset($_POST['test_result'])) {
        $result_updated = $patient->UpdateTestResultPatient($id);
    }

    $patientdata = $patient->GetPatient($id);


    $pagetitle = "Patient";

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container wrapper patientdetail">
    <?php 
        if(isset($result_updated)) {
            echo "<div class='alert alert-success w-100' role='alert'>Updated test result succesfully</div>";
        }
    ?>
    <h2><?=$patientdata['voornaam']?> <?=$patientdata['achternaam']?></h2>
    <hr>
    <form action="/Huisarts/patient.php?id=<?=$id?>" method="POST">
        <div class="form-group">
            <label>Naam</label>
            <input type="text" value="<?=$patientdata['voornaam']?> <?=$patientdata['achternaam']?>" disabled>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" value="<?=$patientdata['email']?>" disabled>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Telefoonnummer</label>
                <input type="tel" value="<?=$patientdata['telefoon']?>" disabled>
            </div>
            <div class="form-group col-md-6">
                <label>Rijksregisternummer</label>
                <input type="text" value="<?=$patientdata['rijksregisternummer']?>" disabled>
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
            <label>Datum test</label>
            <input type="text" value="<?=$patientdata['created_At']?>" disabled>
        </div>
        <button type="submit" class="btn btn-primary">
            Update testresult
        </button>
        <button type="button" href='/Huisarts/editpatient.php?id=<?=$id?>' class="btn btn-warning">
            Edit data
        </button>
        <button type="button" href="/Huisarts/deletepatient.php?id=<?=$_GET['id']?>" class="btn btn-danger">
            Delete patient
        </button>
    </form>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>