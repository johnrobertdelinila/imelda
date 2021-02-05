<?php
    session_start();
    $_SESSION['filter_blotter'] = $_POST['val'].trim() != "0" ? $_POST['val'] : NULL;
    echo "done";
?>