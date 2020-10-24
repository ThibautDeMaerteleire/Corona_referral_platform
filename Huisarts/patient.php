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
<main class="container wrapper">
    <?php 
        if(isset($result_updated)) {
            echo "<div class='alert alert-succes w-100' role='alert'>Updated test result succesfully</div>";
        }
    ?>
    <h2><?=$patientdata['voornaam']?> <?=$patientdata['achternaam']?></h2>
    <hr>
    <form action="/Huisarts/patient.php?id=<?=$id?>" method="POST">
        <div class="form-group">
            <label>Naam</label>
            <p><?=$patientdata['voornaam']?> <?=$patientdata['achternaam']?></p>
        </div>
        <div class="form-group">
            <label>Email</label>
            <p><?=$patientdata['email']?></p>
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
            <p><?=$patientdata['created_At']?></p>
        </div>
        <button type="submit" class="btn btn-primary">
            Update testresult
        </button>
    </form>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>