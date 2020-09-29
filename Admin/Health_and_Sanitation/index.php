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

    <?php 
  include('global_nav');
  ?>
<div class="container" style="margin-top:120px;">
  <?php 

  
$sql = mysqli_query($conn,"SELECT * FROM `inventory_drugs`");

?><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#add">ADD</button><br><br>
      <table class="table table-bordered " id="accounts">
        <thead class="bg-primary">
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Quantity</th>
            <th>Description</th>
            <th>Date Expiration</th>
          </tr>
        </thead>
        <tbody >
          <?php 
          while ($distribute = mysqli_fetch_array($sql)) {
            ?>
           <tr>
            <td><?php echo $distribute['drug_ID'] ?></td>
            <td><?php echo $distribute['drug_Name'] ?></td>
            <td><?php echo $distribute['drug_Qnty'] ?></td>
            <td><?php echo $distribute['drug_Description']?></td>
            <td><?php echo $distribute['drug_Expiration_Date'] ?></td>
            
            
           
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
<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
