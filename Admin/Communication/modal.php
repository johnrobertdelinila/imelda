<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT ar.*,rp.position_Name FROM `anouncement_raw` ar
LEFT JOIN ref_position rp  ON rp.position_ID = ar.receiver_ID WHERE ar.ann_ID = $id");
$ann = mysqli_fetch_array($sql)
?>
<strong><?php echo strtoupper($ann[2])."[ ".$ann[6]." ] (".date("M jS, Y", strtotime($ann[5])).")";?><button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#myModal" data-id="<?php echo $ann[0]; ?>" id="sendSMS">Send SMS</button></strong>
 <hr>
<p style=" text-indent: 50px; 
    overflow: hidden;"><?php echo ucwords($ann[3]) ?></p>
<?php
}
?>