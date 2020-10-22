<?php 
    session_start();

    require_once (__DIR__.'/../libs/db.php');
    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Patienten";

    require_once (__DIR__.'/../libs/AuthRedirecter.php');
    
    $patienten = new Patienten();
    $patientenlijst = $patienten->GetAllPatients();
    $totalPatients = $patienten->CountAllPatients();

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container-fluid">
    <h2>Patiënten</h2>
    <hr>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
                <th scope="col">Email</th>
                <th scope="col">Telefoon</th>
                <th scope="col" title="datum afgelegde test">Datum</th>
                <th scope="col">COVID-test</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $key = 0;

                foreach ($patientenlijst as $value) {
                    $key++;
                    $currentKey = $key + ($page-1) *10;
                    // var_dump($value);
                    // echo '<br>';
                    echo "
                    <tr href='/Huisarts/patient.php?id={$value['id']}'>
                        <th scope='row'>{$currentKey}</th>
                        <td>{$value['voornaam']}</td>
                        <td>{$value['achternaam']}</td>
                        <td>{$value['email']}</td>
                        <td>{$value['telefoon']}</td>
                        <td>{$value['created_At']}</td>
                        <td>{$value['test_result']}</td>
                    </tr>
                    ";

                  
                }
            ?>
        </tbody>
    </table>
    <div class="paginering">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <?php
                    echo "<li class='page-item disbled'><a class='page-link' href='/Huisarts/patienten.php?page=<?=$page?>'><?=$page?></a></li>";
                ?>
                <li class="page-item"><a class="page-link" href="/Huisarts/patienten.php?page=<?=$page-1?>"><?=$page-1?></a></li>
                <li class="page-item disbled"><a class="page-link" href="/Huisarts/patienten.php?page=<?=$page?>"><?=$page?></a></li>
                <li class="page-item"><a class="page-link" href="/Huisarts/patienten.php?page=<?=$page+1?>"><?=$page+1?></a></li>
                <li class="page-item">
                <a class="page-link" href="/Huisarts/patienten.php?page=<?=$page+1?>">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>