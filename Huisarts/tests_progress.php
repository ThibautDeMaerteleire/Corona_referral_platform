<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    require_once (__DIR__.'/../models/Patienten.php');

    $pagetitle = "Postive tests";
    
    $patienten = new Patienten();
    $patientenlijst = $patienten->GetAllProgressPatients();
    $totalPatients = $patienten->CountAllProgressPatients();

    include_once (__DIR__.'/../views/layout/starter.php');
?>
<main class="container-fluid wrapper">
    <h2>Tests in afwachting</h2>
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
                <?php
                    $previouspage = $page-1;
                    $nextpage = $page+1;
                    $maxpage = ceil($totalPatients/10);

                    if($page>1) {
                        echo "<li class='page-item'><a class='page-link' href='/Huisarts/tests_progress.php?page=1' tabindex='-1' aria-disabled='true'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='/Huisarts/tests_progress.php?page={$previouspage}'>{$previouspage}</a></li>";
                    } else {
                        echo "<li class='page-item disabled'><a class='page-link' href='/Huisarts/tests_progress.php?page=1' tabindex='-1' aria-disabled='true'>First</a></li>";
                    }

                    echo "<li class='page-item disabled'><a class='page-link' href='/Huisarts/tests_progress.php?page={$page}'>{$page}</a></li>";

                    if($page<$maxpage) {
                        echo "<li class='page-item'><a class='page-link' href='/Huisarts/tests_progress.php?page={$nextpage}'>{$nextpage}</a></li>";
                        echo "<li class='page-item'><a class='page-link' href='/Huisarts/tests_progress.php?page={$maxpage}'>Last</a></li>";
                    } else {
                        echo "<li class='page-item disabled'><a class='page-link' href='/Huisarts/tests_progress.php?page={$maxpage}'>Last</a></li>";
                    }
                ?>
            </ul>
        </nav>
    </div>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>