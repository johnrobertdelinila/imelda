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
          <a class="navbar-brand" href="index">ACCOUNT</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="index">Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
  <?php 

  
$sql = mysqli_query($conn,"SELECT ua.acc_ID,bod.official_ID,rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,ua.acc_username,ua.acc_password,us.status_Name,us.status_ID,rp.position_Name FROM `user_account` ua 
LEFT JOIN brgy_official_detail bod ON ua.official_ID = bod.official_ID 
LEFT JOIN resident_detail rd ON bod.res_ID = rd.res_ID 
LEFT JOIN ref_position rp ON rp.position_ID = ua.position_ID
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
LEFT JOIN user_status us ON ua.status_ID = us.status_ID ORDER BY ua.status_ID ASC");

?>
<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">ADD ACCOUNT</button><br><br>
      <table class="table table-bordered " id="accounts">
        <thead class="bg-primary">
          <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Level Access</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >
          <?php 
          while ($acc_data = mysqli_fetch_array($sql)) {

            $crypt = crypt("Darren",$acc_data['acc_password']);
            $suffix = $acc_data['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $acc_data['suffix'];
            }
            if ($acc_data['status_ID'] == 2) {
              $color = "danger";
              $td_color = "class=bg-danger";
            }
            else{
              $color = "success";
              $td_color = "";
            }
            ?>
           <tr <?php echo $td_color?>>
            <td><?php echo $acc_data['res_fName']." ".$acc_data['res_mName'].". ".$acc_data['res_lName']." ".$suffix ?></td>
            <td><?php echo $acc_data['acc_username'] ?></td>
            <td><?php echo $crypt ?></td>
            <td><?php echo $acc_data['position_Name'] ?></td>
            <td><span class="label label-<?php echo $color ?>"><?php echo $acc_data['status_Name']?></span></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span></button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                 <!--  <li><a  data-toggle="modal" data-target="#view" data-id="<?php echo $acc_data['acc_ID']; ?>"  id="view_acc">View</a></li> -->
                  <li><a data-toggle="modal" data-target="#edit" data-id="<?php echo $acc_data['acc_ID']; ?>"  id="edit_acc">Edit</a></li>
                  <!-- <li><a data-toggle="modal" data-target="#delete" data-id="<?php echo $acc_data['acc_ID']; ?>"  id="delete_acc">Delete</a></li> -->
                  <?php 
                  if ($acc_data['status_ID'] == 2) {
              
                    ?>
                    <li><a data-toggle="modal" data-target="#enable" data-id="<?php echo $acc_data['acc_ID']; ?>"  id="enable_acc">Enable</a></li>
                    <?php
                  }
                  else{
                    ?>
                    <li><a data-toggle="modal" data-target="#disable" data-id="<?php echo $acc_data['acc_ID']; ?>"  id="disable_acc">Disable</a></li>
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
    $('#accounts').DataTable({
      "aaSorting": []
    });
} );


 $(document).ready(function(){
      $(document).on('click', '#view_acc', function(e){
      
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
      $(document).on('click', '#edit_acc', function(e){
      
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

       $(document).on('click', '#disable_acc', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#disable-content').html(''); // leave it blank before ajax call
      $('#disable-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_disable.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#disable-content').html('');    
        $('#disable-content').html(data); // load response 
        $('#disable-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#disable-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#disable-loader').hide();
      });
      
    });

        $(document).on('click', '#enable_acc', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#enable-content').html(''); // leave it blank before ajax call
      $('#enable-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_enable.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#enable-content').html('');    
        $('#enable-content').html(data); // load response 
        $('#enable-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#enable-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#enable-loader').hide();
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
        <h4 class="modal-title">View Account</h4>
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
        <h4 class="modal-title">Edit Account</h4>
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
<div id="disable" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Disable Account</h4>
      </div>
      <div class="modal-body">
        <div id="disable-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="disable-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="enable" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enable Account</h4>
      </div>
      <div class="modal-body">
        <div id="enable-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="enable-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Account</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action= "action.php" method="post">
         <div class="form-group">
        <label class="col-sm-2 control-label">Fullname</label>
        <div class="col-sm-10">
          <select name="official_ID" class="form-control">
          
            <?php
            $rp=mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE  visibility = 1");
            while ($row=mysqli_fetch_array($rp))
            {
               $suffix = $row['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $row['suffix'];
            }
              ?><option value="<?php echo  $row['res_ID']?>"><?php echo $row[8]." ".$row[9]." ".$row[10]." ".$suffix;?></option>
            <?php
            }
            ?>
         
         
        </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
          <input class="form-control" id="focusedInput" type="text" placeholder="Enter Username" name="username" required >
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input class="form-control" id="focusedInput" type="password" placeholder="Enter Password" name="password" required >
        </div>
      </div>
<div class="form-group">
        <label class="col-sm-2 control-label">Confirm</label>
        <div class="col-sm-10">
          <input class="form-control" id="focusedInput" type="password" placeholder="Confirm Password" name="conpassword" required >
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Position</label>
        <div class="col-sm-10">
          <select class="form-control" id="mySelect" onchange="myFunction()" name="position">
          
            <?php
            $rp=mysqli_query($conn,"SELECT * FROM ref_position WHERE position_ID != 1 AND position_Name NOT LIKE 'Barangay Official in %'");
            while ($row=mysqli_fetch_array($rp))
            {
              ?><option value="<?php echo $row[0] ?>"><?php echo $row[1];?></option>
            <?php
            }
            ?>
         
         
        </select>
        </div>
      </div>

      <div class="form-group" id="official">
        <label class="col-sm-2 control-label">Committee</label>
        <div class="col-sm-10">
          <select name="Commitee" class="form-control">
            <option value="1" style="display: none;"></option>
            <?php
            $rp=mysqli_query($conn,"SELECT * FROM ref_position WHERE position_ID != 1 AND position_Name LIKE 'Barangay Official in %'");
            while ($row=mysqli_fetch_array($rp))
            {
              ?><option value="<?php echo $row[0] ?>"><?php echo $row[1];?></option>
            <?php
            }
            ?>
         
         
        </select>
        </div>
      </div>
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-success" name="submit-account">Add New</button>
        </div>
      </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<script type="text/javascript">
  


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