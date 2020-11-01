<form action='/<?=$type?>/search.php' method='GET'>
    <input class='form-control' accounttype='<?=$_SESSION['type']?>' hid="<?=$_SESSION['id']?>" id="searchbar" name="search" placeholder='Search ...' type='text' autocomplete="off">
    <div class="autocompletion show"></div>
</form>
