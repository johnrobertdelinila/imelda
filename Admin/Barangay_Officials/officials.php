<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Home - Barangay Management Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <script src="../../bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
    <script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../Img/Icon/indang logo.png">
    <link rel="stylesheet" type="text/css" href="../../DataTables/datatables.min.css"/>
    <script type="text/javascript" src="../../DataTables/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../custom.css">
   
</head>
<body >

       <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index">CHART</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="officials">Manage Officials</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
  <?php 

  
$sql = mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
 ORDER by official_ID DESC");

?>

<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#a">ADD CHART OFFICIAL</button>
<br><br>
      <table class="table table-bordered " id="accounts">
        <thead class="bg-primary">
          <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Start</th>
            <th>End</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >
          <?php 
          while ($official = mysqli_fetch_array($sql)) {
            $suffix = $official['suffix'];
            if (empty($official['visibility'])) {
              
              $td_color = "class=bg-danger";
            }
            else{
              $td_color = "";
            }
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $official['suffix'];
            }
           ?>
           <tr <?php echo $td_color?>>
            <td><?php echo $official['res_fName']." ".$official['res_mName'].". ".$official['res_lName']." ".$suffix ?></td>
            <td><?php echo $official['position_Name']?></td>
            <td><?php echo $official['official_Start']?></td>
            <td><?php echo $official['official_End']?></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span></button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a  data-toggle="modal" data-target="#view" data-id="<?php echo $official['official_ID']; ?>"  id="view_off">View</a></li>
                  <li><a data-toggle="modal" data-target="#edit" data-id="<?php echo $official['official_ID']; ?>"  id="edit_off">Edit</a></li>
                  <?php 
                  if (empty($official['visibility'])) {
              
                    ?>
                    <li><a data-toggle="modal" data-target="#undelete" data-id="<?php echo $official['official_ID']; ?>"  id="undelete_off">Undelete</a></li>
                    <?php
                  }
                  else{
                    ?>
                    <li><a data-toggle="modal" data-target="#delete" data-id="<?php echo $official['official_ID']; ?>"  id="delete_off">Delete</a></li>
                    <?php
                  }
                  ?>
                </ul>
              </div>
            </td>
          </tr>
           <?php
          }
          ?>
          
        </tbody>
      </table>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#accounts').DataTable();
} );


 $(document).ready(function(){
      $(document).on('click', '#view_off', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#view-content').html(''); // leave it blank before ajax call
      $('#view-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_view.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#view-content').html('');    
        $('#view-content').html(data); // load response 
        $('#view-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#view-loader').hide();
      });
      
    });
      $(document).on('click', '#edit_off', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#edit-content').html(''); // leave it blank before ajax call
      $('#edit-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_edit.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#edit-content').html('');    
        $('#edit-content').html(data); // load response 
        $('#edit-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#edit-loader').hide();
      });
      
    });

       $(document).on('click', '#delete_off', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#delete-content').html(''); // leave it blank before ajax call
      $('#delete-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_delete.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#delete-content').html('');    
        $('#delete-content').html(data); // load response 
        $('#delete-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#delete-loader').hide();
      });
      
    });
        $(document).on('click', '#undelete_off', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#delete-content').html(''); // leave it blank before ajax call
      $('#delete-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_undelete.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#undelete-content').html('');    
        $('#undelete-content').html(data); // load response 
        $('#undelete-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#undelete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#undelete-loader').hide();
      });
      
    });
  }); 
</script>
</body>
</html>


<!-- Modal -->
<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Official</h4>
      </div>
      <div class="modal-body">
        <div id="view-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="view-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Official</h4>
      </div>
      <div class="modal-body">
        <div id="edit-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="edit-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Official</h4>
      </div>
      <div class="modal-body">
        <div id="delete-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="delete-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="undelete" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Undelete Official</h4>
      </div>
      <div class="modal-body">
        <div id="undelete-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="undelete-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>





<!-- Modal -->
<div id="a" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Official</h4>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#b" id="show">Show Record</button>  <br>  <br>
  <form id="form1" method="POST" action="action">
     
  
   <div class="form-group">
    <label>ID</label>
  <input type="text" name="res_ID"  class="form-control"  readonly="" >
   </div>
  <div class="form-group">
    <label>Name</label>
  <input type="text" name="Name"  class="form-control" id="Name" readonly="">
   </div>
   <div class="form-group">
    <label>Start</label>
  <input type="date" name="startdate"  class="form-control" id="startdate" >
   </div>
   <div class="form-group">
    <label>End</label>
  <input type="date" name="enddate"  class="form-control" id="enddate">
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
  <input type="submit" name="submit-official"  class="btn btn-success">
   </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="b" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Resident Record</h4>
      </div>
      <div class="modal-body">
        <?php 
        $sql = mysqli_query($conn,"SELECT res_ID,res_fName,res_mName,res_lName,rs.suffix,rms.marital_Name,rg.gender_Name,rr.religion_Name,ro.occupation_Name,ros.occuStat_Name,res_Date_Record,rc.country_citizenship,res_Bday,TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS age,
        (case  
         when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
         when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
        when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
        when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
         when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
         when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
        when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
        when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
        when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
        when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
           end) Age_Stage
        FROM resident_detail rd 
        LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
        LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
        LEFT JOIN ref_marital_status rms ON rms.marital_ID = rd.marital_ID
        LEFT JOIN ref_religion rr ON rr.religion_ID = rd.religion_ID 
        LEFT JOIN ref_occupation ro ON ro.occupation_ID = rd.occupation_ID 
        LEFT JOIN ref_occupation_status ros ON ros.occuStat_ID = rd.occuStat_ID
        LEFT JOIN ref_country rc ON rc.country_ID = rd.country_ID");

        ?>
        <div class="table-responsive">
          <table class="table" id="example">
            <thead class="bg-primary">
              <tr>
                <th >ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Stage</th>
                <th>Sex</th>
                <th>Citizenship</th>
                <th>Occupation</th>
              </tr>
            </thead>
            <tbody>
              <?php 
          while ($res_data = mysqli_fetch_array($sql)) {
            $suffix = $res_data['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $res_data['suffix'];
            }
           ?>
           <tr>
            <td><?php echo $res_data['res_ID'] ?></td>
            <td><?php echo $res_data['res_fName']." ".$res_data['res_mName'].". ".$res_data['res_lName']." ".$suffix ?></td>
            <td><?php echo $res_data['age'] ?></td>
            <td><?php echo $res_data['Age_Stage'] ?></td>
            <td><?php echo $res_data['gender_Name'] ?></td>
            <td><?php echo $res_data['country_citizenship'] ?></td>
            <td><?php echo $res_data['occupation_Name'] ?></td>
            
          </tr>
           <?php
          }
          ?>
          </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">

    var table= $('#example').DataTable();
var tableBody = '#example tbody';

    $(tableBody).on('click', 'tr', function () {
var cursor = table.row($(this));//get the clicked row
var data=cursor.data();// this will give you the data in the current row.
$('form').find("input[name='res_ID'][type='text']").val(data[0]);
$('form').find("input[name='Name'][type='text']").val(data[1]);
// $('form').find("input[name='Bday'][type='text']").val(data[2]);
// $('form').find("input[name='Age'][type='number']").val(data[3]);
 $('#b').modal('hide');
} );


    
     $('#official').hide();
    function myFunction() {
      var x = document.getElementById("mySelect").value;
      if(x == 10){
       $('#official').show();
      }
      else{

       $('#official').hide();
      }
    }

</script>