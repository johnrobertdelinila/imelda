<?php 

// include("../../connection.php");

include "smsGateway.php";


// $sql = mysqli_query($conn,"SELECT contact_telnum,rd.*,rs.* FROM 
// 	`resident_contact` rc
// 	INNER JOIN resident_detail rd  ON rd.res_ID = rc.res_ID
// 	LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID");
// $receiver = array();
// 	while ($contact = mysqli_fetch_array($sql)) {
// 		$receiver[] = $contact['contact_telnum'];
// 		$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
// 	};

// $smsGateway = new SmsGateway('rhalpdarrencabrera@gmail.com', 'zxc123');
// $deviceID = 82979;
// $numbers = json_encode($receiver);
// $message = 'asdasdasd';

// $options = [
// 'send_at' => strtotime('+1 minutes'), // Send the message in 10 minutes
// 'expires_at' => strtotime('+1 hour') // Cancel the message in 1 hour if the message is not yet sent
// ];

// //Please note options is no required and can be left out
// $result = $smsGateway->sendMessageToManyNumbers($numbers, $message, $deviceID, $options);

$smsGateway = new SmsGateway('rhalpdarrencabrera@gmail.com', 'zxc123');

$page = 2;

$result = $smsGateway->getMessages($page);
$id = 82836;

$result1 = $smsGateway->getDevice($id);
echo "<pre>";
echo print_r($result);
echo "</pre>";
echo "<pre>";
echo print_r($result1);
echo $result1['response']['result']['name'];
echo "</pre>";
?>