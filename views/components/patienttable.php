<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Voornaam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">Email</th>
            <th scope="col">Telefoon</th>
            <th scope="col" title="datum afgelegde test">Datum</th>
            <th scope="col">Last COVID-test result</th>
            <th scope="col">Last COVID-test date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            $key = 0;

            foreach ($patientenlijst as $value) {
                $key++;
                $currentKey = $key + ($page-1) *10;
                $value['url'] = "/{$_SESSION['type']}/patient.php?id={$value["id"]}";
                include (__DIR__.'/patientslist.php');
            }
        ?>
    </tbody>
</table>