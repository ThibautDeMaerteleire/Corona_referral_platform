<?php 
    session_start();

    require_once (__DIR__.'/../libs/index.php');

    $pagetitle = "Contacts";

    include_once (__DIR__.'/../views/layout/starter.php');

    include_once (__DIR__.'/../models/Contacts.php');

    $Contacts = new Contacts();
    $AllContacts = $Contacts->GetAllContacts();
?>
<main class="container-fluid wrapper">
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Voornaam</th>
                <th scope="col">Achternaam</th>
                <th scope="col">Email</th>
                <th scope="col">Telefoon</th>
                <th scope="col">Datum van contact</th>
                <th scope="col">Last COVID-test result</th>
                <th scope="col">Last COVID-test date</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($AllContacts as $key => $contact) {
            ?>
                    <tr>
                        <th scope='row'><?=$key?></th>
                        <td><?=$contact['voornaam']?></td>
                        <td><?=$contact['achternaam']?></td>
                        <td><?=$contact['email']?></td>
                        <td><?=$contact['telefoon']?></td>
                        <td><?=$contact['date_of_contact']?></td>
            <?php
                if(!$contact['test_result'] || !$contact['covidTestDate']) {
                    echo "<td colspan='2'>No covid tests yet</td>";
                } else {
                    echo "<td>{$contact['test_result']}</td><td>{$contact['covidTestDate']}</td>";
                }
            ?>
                    </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</main>
<?php 
    include_once (__DIR__.'/../views/layout/end.php');
?>