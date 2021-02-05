<?php
    include("../../connection.php");

    $bmis = $_POST['bmis'];
    $mission = $_POST['mission'];
    $vission = $_POST['vission'];
    $sitios = $_POST['sitios'];
    $bridges = $_POST['bridges'];

    $sql = "UPDATE ref_brgy_info SET brgyInfo_History='$bmis', brgyInfo_Mission='$mission',
     brgyInfo_Vision='$vission', brgyInfo_Sitios='$sitios', brgyInfo_Bridges='$bridges' 
     WHERE brgyInfo_ID='1'";
    mysqli_query($conn,$sql);

    echo "Successfully updated.";
?>