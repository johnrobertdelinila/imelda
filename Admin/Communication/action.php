<?php 

include("../../connection.php");
if (isset($_POST['submit-announcement'])) {
$ann_receiver = $_POST['ann_receiver'];
$ann_title = $_POST['ann_title'];
$ann_description = $_POST['ann_description'];

	mysqli_query($conn,"INSERT INTO `anouncement_raw` (`ann_ID`, `receiver_ID`, `ann_Title`, `ann_Detail`, `ann_detail_sms_format`, `ann_Date`) VALUES (NULL, '$ann_receiver', '$ann_title', '$ann_description' , NULL, CURRENT_TIMESTAMP);");
	echo "<script>alert('Successfully Post The Announcement!	');
									window.location='index.php';
								</script>";

 
}
if (isset($_POST['send-sms'])) {
	include "smsGateway.php";
	function Success_Alert(){
		echo "<script>alert('Successfully Send SMS	');
									window.location='index.php';
								</script>";
	}
	function Error_Alert(){
		echo "<script>alert('Error Send SMS	');
									window.location='index.php';
								</script>";
	}
	$id  = $_POST['id'];
	$SMS  = $_POST['SMS'];
	mysqli_query($conn,"UPDATE `anouncement_raw` SET `ann_detail_sms_format` = '$SMS' WHERE `anouncement_raw`.`ann_ID` = $id");
 
	$an_d = mysqli_query($conn,"SELECT * FROM `anouncement_raw` WHERE ann_ID = $id");
	$an_d = mysqli_fetch_array($an_d);
	$receiver_type = $an_d['receiver_ID'];

	$smsGateway = new SmsGateway('rhalpdarrencabrera@gmail.com', 'zxc123');
	$deviceID = 82979;

	//Barangay Resident
	if ($receiver_type == 1) {
		$sql = mysqli_query($conn,"SELECT contact_telnum,contact_ID,rd.*,rs.* FROM 
		`resident_contact` rc
		INNER JOIN resident_detail rd  ON rd.res_ID = rc.res_ID
		LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID");
		while($contact = mysqli_fetch_array($sql))
		{

			$res_ID  = $contact['res_ID'];
			$contact_telnum = $contact['contact_telnum'];
			$contact_ID = $contact['contact_ID'];
			mysqli_query($conn,"INSERT INTO `sms` (`id`, `contact_ID`, `ann_ID`, `receiver_ID`, `date`) 
				VALUES (NULL, '$contact_ID', '$id', '$res_ID', CURRENT_TIMESTAMP);");
			$receiver[] = $contact_telnum;
		}
		
		$numbers = json_encode($receiver);
		$message = $SMS;

		$options = [
		'send_at' => strtotime('+1 minutes'), // Send the message in 10 minutes
		'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
		];

		//Please note options is no required and can be left out
		$result = $smsGateway->sendMessageToManyNumbers($numbers, $message, $deviceID, $options);
		Success_Alert();
	}
	else{
		 Error_Alert();
	}

	

	//if resident
	

// 	SELECT rd.res_fName,rd.res_mName,rd.res_mName,rs.suffix,rn.network_Name,rpp.position_Name,rc.contact_telnum  FROM `brgy_official_detail`  bod
// INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID 
// LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
// INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID
// LEFT JOIN resident_contact rc ON rd.res_ID = rc.res_ID
// LEFT JOIN ref_network rn  ON rc.network_ID = rn.network_ID
// LEFT JOIN ref_position rpp ON bod.commitee_assignID = rpp.position_ID
// WHERE bod.visibility = 1 ORDER BY rp.position_ID
}

?>