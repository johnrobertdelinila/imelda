<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
require_once('connection.php');

session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['user_session'];
// SQL Query To Fetch Complete Information Of User

$ses_sql=mysqli_query($conn,"SELECT acc_ID,official_ID FROM user_account WHERE acc_ID ='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['acc_ID'];
$session_official_ID =$row['official_ID'];


if(!isset($login_session)){
	mysqli_close($connection); // Closing Connection
	header('Location: index.php'); // Redirecting To Home Page
}
?>