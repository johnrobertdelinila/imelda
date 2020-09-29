<?php
session_start();
require_once('../connection.php');
?>
<html>
<title>Admin Panel</title>
<link rel="shortcut icon" href="../Img/Icon/indang logo.png">

<Style>
body {
    background-color: white;
}
</style>
<head>
<frameset rows="80%,5.5%" frameborder="0">
<!-- <frame src="header.php" noresize="noresize"> -->

<frameset cols="20%,80%">
<frame src="sidenav.php" name="FraLink">
<frame src="Resident_Profiling/index.php" name="FraDisplay">
</frameset>




<frame src="footer.php" name="FraDisplay">

</frameset>
</head></html>