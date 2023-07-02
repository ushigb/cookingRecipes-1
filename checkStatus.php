<?php

if ($_SESSION['user']['status'] != 'Active') {
    echo '<h4><p>You not have permision to see this page</p></h4>'
    . '<div><a href="index.php"  class="btn btn-info" name="back">Back</a></div>';
    die();
}


