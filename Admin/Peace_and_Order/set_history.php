<?php
    session_start();
    $_SESSION['his_start_date'] = $_POST['start_date'];
    $_SESSION['his_end_date'] = $_POST['end_date'];
    $_SESSION['his_narrative'] = $_POST['narrative'];
    $_SESSION['his_peoples'] = $_POST['peoples'];
    echo "done";
?>