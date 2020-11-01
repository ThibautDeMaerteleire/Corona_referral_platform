<div class="search d-flex flex-wrap">
<?php
    foreach ($patientenlijst as $value) {
?>   
    <div class="search__item">
        <div class="title">
            <h3><?=$value['achternaam']?></h3>
            <h5><?=$value['voornaam']?></h5>
        </div>        
        <p><?=$value['email']?></p>
        <p><?=$value['rijksregisternummer']?></p>
    </div>
<?php
    }
?>
</div>