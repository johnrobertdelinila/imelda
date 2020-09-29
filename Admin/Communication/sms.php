<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	 $id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT ar.*,rp.position_Name ,rp.position_ID FROM `anouncement_raw` ar
LEFT JOIN ref_position rp  ON rp.position_ID = ar.receiver_ID WHERE ar.ann_ID = $id");
$ann = mysqli_fetch_array($sql)

?>

       <script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 918) {
          val.value = val.value.substring(0, 918);
        } else {
          $('#charNum').text(918 - len);
        }
      };
    </script>
    <form  method="POST" action="action.php">
    <div class="form-group">
      <label for="label">Receiver:</label> <label for="label"><?php echo $ann[6]?></label>
     <input type="hidden" name="id" value="<?php echo $id?>">
    </div>
    <div class="form-group">
      <label for="email">Message in Text Format:</label>
     <textarea id="field" onkeyup="countChar(this)" class="form-control" name="SMS"></textarea>
    <div id="charNum"></div>
    </div>
      
    <div class="text-center">

    <input type="Submit" name="send-sms" value="Send SMS" class="btn btn-success btn-sm">
    </div>
    </form>

    <?php
}
?>

