<?php
    if(!isset($page)) {
        if(isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }
    }

    $url = explode('?',$_SERVER['REQUEST_URI'])[0];

    if(strpos($url, 'search.php') == false)  {
        $amountofitems = 9;
    } else {
        $amountofitems = 10;
    }

    if(isset($_GET['search'])) {
        $search = "&search={$_GET['search']}";
    } else {
        $search = "";
    }

    $previouspage = $page-1;
    $nextpage = $page+1;
    $maxpage = ceil($totalPatients/$amountofitems);
?>
<div class="paginering">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php
                if($page>1) {
                    echo "<li class='page-item'><a class='page-link' href='{$url}?page=1{$search}' tabindex='-1' aria-disabled='true'>First</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='{$url}?page={$previouspage}{$search}'>{$previouspage}</a></li>";
                } else {
                    echo "<li class='page-item disabled'><a class='page-link' href='{$url}?page=1{$search}' tabindex='-1' aria-disabled='true'>First</a></li>";
                }

                echo "<li class='page-item disabled'><a class='page-link' href='{$url}?page={$page}{$search}'>{$page}</a></li>";

                if($page<$maxpage) {
                    echo "<li class='page-item'><a class='page-link' href='{$url}?page={$nextpage}{$search}'>{$nextpage}</a></li>";
                    echo "<li class='page-item'><a class='page-link' href='{$url}?page={$maxpage}{$search}'>Last</a></li>";
                } else {
                    echo "<li class='page-item disabled'><a class='page-link' href='{$url}?page={$maxpage}{$search}'>Last</a></li>";
                }
            ?>
        </ul>
    </nav>
</div>