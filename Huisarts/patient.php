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
    $patientdata = $patient->GetPatient($id);

    if($patientdata) {
        $covidtests = $patient->GetPatientCovidTests($id);
    } else {
        redirect("/404.php");
        die;
    }

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
            <label for="Covid tests">Test results</label>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Test resultaat</th>
                        <th scope="col">Datum test</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!!$covidtests) {
                            foreach ($covidtests as $key => $value) {
                                $nr = $key + 1;
                                echo "<tr>
                                        <th scope='row'>{$nr}</th>
                                        <td>{$value['test_result']}</td>
                                        <td>{$value['created_At']}</td>
                                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No covid tests yet.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <label>Patiënt toegevoegd op:</label>
            <input type="text" value="<?=$patientdata['created_At']?>" disabled>
        </div>
        <button type="button" href='/Huisarts/editpatient.php?id=<?=$id?>' class="btn btn-primary">
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