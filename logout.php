<?php
require_once('connection.php');
session_start();
// Redirecting To Home Page
session_destroy(); // Destroying All Sessions
header('Location: index.php');

?>