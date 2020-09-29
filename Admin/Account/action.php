<?php
//db connection
include("../../connection.php");

if(isset($_POST['submit-account']))
{

	 $official_ID = $_POST['official_ID'];
	 $username = $_POST['username'];
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $conpassword = $_POST['conpassword'];
	 $position = $_POST['position'];
	 $Commitee = $_POST['Commitee'];
	//query for checking user is exist
	$sql = mysqli_query($conn,"SELECT * FROM `user_account` WHERE  acc_username = '$username'");
	//count user if exist
	$check = mysqli_num_rows($sql);
	if ($check > 0) {
		echo "<script>alert('User Already Taken!');
	                                    window.location='index';
	                                </script>"; 
	}
	//else add new
	else{
		// password  match do this
	    if ($password == $conpassword) {
			if ($Commitee == 1 and $position == 10) {
			  $pos =  $Commitee;
			}
			else{
		 	 	$pos = $position;
			}
			$new_password = password_hash($conpassword, PASSWORD_DEFAULT);
			$sql = mysqli_query($conn,"INSERT INTO 
				`user_account` (`acc_ID`,`official_ID`,`position_ID`,`acc_username`,`acc_password`,`status_ID`,`acc_created`) VALUES (
				NULL,
				 '$official_ID',
				  '$pos',
				   '$username',
				    '$new_password',
				     '1',
				      CURRENT_TIMESTAMP)");
			echo "<script>alert('Successfully Add New Account!');
	                                    window.location='index';
	                                </script>"; 
		}
		// password not match alert this 
		else{
			echo "<script>alert('Password not match!');
	                                    window.location='index';
	                                </script>"; 
		}
	}

	
	
}
if (isset($_POST['enable'])) {
	$id = $_POST['id'];
	$sql = mysqli_query($conn,"UPDATE `user_account` SET `status_ID` = '1' WHERE `user_account`.`acc_ID` = $id;");
	echo "<script>alert('Account Enable!');
	                                    window.location='index';
	                                </script>"; 
}
if (isset($_POST['disable'])) {
	$id = $_POST['id'];
	$sql = mysqli_query($conn,"UPDATE `user_account` SET `status_ID` = '2' WHERE `user_account`.`acc_ID` = $id;");
	echo "<script>alert('Account Disable!');
	                                    window.location='index';
	                                </script>"; 
}
 ?>