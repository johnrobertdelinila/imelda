<?php
include('dbcon.php');
$query = "DELETE FROM finance_collection WHERE collection_id='".$_GET["id"]."'"; 
mysqli_query($con,$query)  or die(mysql_errno());
header("Location: Collection.php"); 
?>