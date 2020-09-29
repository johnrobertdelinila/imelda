<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rms.marital_ID = rd.marital_ID
LEFT JOIN ref_religion rr ON rr.religion_ID = rd.religion_ID 
LEFT JOIN ref_occupation ro ON ro.occupation_ID = rd.occupation_ID 
LEFT JOIN ref_occupation_status ros ON ros.occuStat_ID = rd.occuStat_ID
LEFT JOIN ref_country rc ON rc.country_ID = rd.country_ID
WHERE official_ID = $id");
$official = mysqli_fetch_array($sql);
$suffix = $official['suffix'];
if ($suffix == "N/A") {
  $suffix = "";
}
else{
   $suffix = $official['suffix'];
}
?>
  <form id="form1" method="POST" action="action">
   <div class="form-group">
  <input type="text" name="official_ID"  class="form-control" value="<?php echo $official['official_ID']?>">
   </div>
  <div class="form-group">
    <label>Name</label>
  <input type="text" name="Name"  class="form-control" id="Name" readonly="" value="<?php echo $official['res_fName']." ".$official['res_mName'].". ".$official['res_lName']." ".$suffix ?>">
   </div>
   <div class="form-group">
    <label>Start</label>
  <input type="date" name="startdate"  class="form-control" id="startdate" value="<?php echo $official['official_Start']?>">
   </div>
   <div class="form-group">
    <label>End</label>
  <input type="date" name="enddate"  class="form-control" id="enddate" value="<?php echo $official['official_End']?>">
   </div>
  <div class="form-group">
    
    <label>Position</label>
<select class="form-control" id="mySelect" onchange="myFunction()" name="position">
      <?php 
      $sql = mysqli_query($conn,"SELECT * FROM `ref_position`  where position_Name NOT LIKE  'Barangay Official in %'");
      while ($pos = mysqli_fetch_array($sql)) {
      ?>
      <option value="<?php echo $pos[0] ?>"><?php echo $pos[1] ?></option>
      <?php
      }
      ?>
    </select>

   </div>
   <div class="form-group" id="official">
    <label>Commitee</label>
    <select class="form-control" name="Commitee">
       <option value="1" style="display: none;"></option>
      <?php 

      $sql = mysqli_query($conn,"SELECT * FROM `ref_position`  where position_Name LIKE  'Barangay Official in %'");
      
      while ($comm = mysqli_fetch_array($sql)) {
      ?>
      <option value="<?php echo $comm[0] ?>"><?php echo $comm[1] ?></option>
      <?php
      }
      ?>
    </select>
   </div>
   <div class="form-group">
  <input type="submit" name="update-official"  class="btn btn-success">
   </div>
</form>
<?php
}
?>
<script type="text/javascript">
	 $('#official').hide();
</script>