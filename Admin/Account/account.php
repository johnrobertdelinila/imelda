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
            <li class="active"><a href="index">Home</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
  <?php 

  
$sql = mysqli_query($conn,"SELECT ua.acc_ID,bod.official_ID,rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,ua.acc_username,ua.acc_password,us.status_Name FROM `user_account` ua 
INNER JOIN brgy_official_detail bod ON ua.official_ID = bod.official_ID 
INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
INNER JOIN user_status us ON ua.status_ID = us.status_ID");

?>
      <table class="table table-bordered " id="accounts">
        <thead class="bg-primary">
          <tr>
            <th>Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >
          <?php 
          while ($acc_data = mysqli_fetch_array($sql)) {
            $suffix = $acc_data['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $acc_data['suffix'];
            }
           ?>
           <tr>
            <td><?php echo $acc_data['res_fName']." ".$acc_data['res_mName'].". ".$acc_data['res_lName']." ".$suffix ?></td>
            <td><?php echo $acc_data['acc_username'] ?></td>
            <td><?php echo $acc_data['acc_password'] ?></td>
            <td><span class="label label-success"><?php echo $acc_data['status_Name']?></span></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span></button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">View</a></li>
                  <li><a href="#">Edit</a></li>
                  <li><a href="#">Delete</a></li>
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
</script>
</body>
</html>
