<?php 
//db connection
include("../../connection.php");
//Submit new official and this new data will replect to the chart
if (isset($_POST['submit-official'])) {
	 $res_ID = $_POST['res_ID'];
	 $Commitee = $_POST['Commitee'];
	 $position = $_POST['position'];
	 $startdate = $_POST['startdate'];
	 $enddate = $_POST['enddate'];
	if ($Commitee == 1 and $position == 10) {
		 $pos =  $Commitee;
	}
	else{
 		$pos = $position;
	}
	$sql = mysqli_query($conn,"INSERT INTO `brgy_official_detail` (`official_ID`, `res_ID`, `commitee_assignID`, `official_Start`, `official_End`, `visibility`) 
		VALUES (NULL, '$res_ID', '$pos', '$startdate', '$enddate', '1')");
	echo "<script>alert('Successfully Add New Official!');
                                    window.location='officials';
                                </script>";  

}
//Update Official Position
if (isset($_POST['update-official'])) {
	 $official_ID = $_POST['official_ID'];
	 $Commitee = $_POST['Commitee'];
	 $position = $_POST['position'];
	 $startdate = $_POST['startdate'];
	 $enddate = $_POST['enddate'];
	if ($Commitee == 1 and $position == 10) {
		 $pos =  $Commitee;
	}
	else{
 		$pos = $position;
	}
	$sql = mysqli_query($conn,"UPDATE `brgy_official_detail`
	 SET `commitee_assignID` = '$pos',
	 `official_Start` = '$startdate',
	 `official_End` = '$enddate' 
	 WHERE `brgy_official_detail`.`official_ID` = '$official_ID'");
	echo "<script>alert('Successfully Update Official!');
                                    window.location='officials';
                                </script>"; 
}
//Not totally deleted just not visible
if (isset($_POST['delete-official'])) {
	$id = $_POST['id'];
	$sql = mysqli_query($conn,"UPDATE `brgy_official_detail` SET `visibility` = NULL WHERE `brgy_official_detail`.`official_ID` =  $id");
	echo "<script>alert('Successfully Remove From The Chart!');
                                    window.location='officials';
                                </script>";  
}
//Undelete visible
if (isset($_POST['undelete-official'])) {
	$id = $_POST['id'];
	$sql = mysqli_query($conn,"UPDATE `brgy_official_detail` SET `visibility` = '1' WHERE `brgy_official_detail`.`official_ID` =  $id");
	echo "<script>alert('Successfully Undelete From The Chart!');
                                    window.location='officials';
                                </script>";  
}

?>