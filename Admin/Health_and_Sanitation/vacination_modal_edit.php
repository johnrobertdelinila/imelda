<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT ua.acc_ID,bod.official_ID,rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,ua.acc_username,ua.acc_password,us.status_Name FROM `user_account` ua 
INNER JOIN brgy_official_detail bod ON ua.official_ID = bod.official_ID 
INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
INNER JOIN user_status us ON ua.status_ID = us.status_ID WHERE  ua.acc_ID =  $id");
$acc = mysqli_fetch_array($sql)
?>
<div class=" text-center">
<div class="btn-group">
	<button class="btn btn-danger" >CONFIRM</button>
	<button class="btn btn-danger" data-dismiss="modal">CLOSE</button>
</div>
</div>
<?php
}
?>