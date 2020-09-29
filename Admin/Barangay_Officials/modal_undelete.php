<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
?>
<div class=" text-center">
<form  method="POST" action="action">

	<input type="hidden" name="id" value="<?php echo $id?>">
	<div class="btn-group">
	<button class="btn btn-danger" type="submit" name="undelete-official" >SUBMIT</button>
	<button class="btn btn-danger" data-dismiss="modal">CLOSE</button>
	</div>
</form>
</div>
<?php
}
?>