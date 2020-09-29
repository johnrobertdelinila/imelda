<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) 
			{
				echo "<script>alert('Username or Password is empty!	');
										window.location='index.php';
									</script>";
			
			}
		else
		{
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			require_once('connection.php');
			// Define $username and $password
			$username=$_POST['username'];
			$password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysqli_real_escape_string($conn,$username);
			$password = mysqli_real_escape_string($conn,$password);

			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($conn,"SELECT * FROM `user_account` WHERE `acc_username` = '$username' AND `status_ID` = 1");
			$data = mysqli_fetch_array($query);

			if(isset($data['acc_password']))
			{
				if(password_verify($password, $data['acc_password']))
				{
					$_SESSION['user_session'] = $data['acc_ID'];
					$_SESSION['official_ID'] = $data['official_ID'];
					$sql = mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
						inner join ref_position rp ON rp.position_ID = bod.commitee_assignID   
						WHERE bod.official_ID = ".$data['official_ID']."");
					$bod = mysqli_fetch_array($sql);
					$_SESSION['position'] = $bod['position_Name'];
					$_SESSION['position_ID']  = $bod['commitee_assignID'];
					 header("location: admin/index.php");
				}
				else
				{
					echo "<script>alert('Access Denied!	');
									window.location='index.php';
								</script>";
				}
			}
			else 
			{
				echo "<script>alert('Access Denied!	');
									window.location='index.php';
								</script>";
			}
			mysqli_close($conn); // Closing Connection
		}
}
?>