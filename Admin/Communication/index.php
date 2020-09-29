<?php
include("../../connection.php");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['user_session'];
// SQL Query To Fetch Complete Information Of User

$ses_sql=mysqli_query($conn,"SELECT acc_ID,official_ID FROM user_account WHERE acc_ID ='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['acc_ID'];


if(!isset($login_session)){
  mysqli_close($connection); // Closing Connection
  header('Location: ../../index.php'); // Redirecting To Home Page
}
?>
<!DOCTYPE html>
<html lang="en">
<?php 

  include ("global_head.php");
?>
<style type="text/css">
  body {background:#ccc}
</style>
<body>
   <?php 
   include('global_nav.php');
   ?>
<div class="container" style="margin-top:120px;">
<?php 
$sql = mysqli_query($conn,"SELECT ar.*,rp.position_Name FROM `anouncement_raw` ar
LEFT JOIN ref_position rp  ON rp.position_ID = ar.receiver_ID");
while ($ann = mysqli_fetch_array($sql)) {
 ?>
<div class="box effect1">
    <p><?php echo strtoupper($ann[2])."[ ".$ann[6]." ] (".date("M jS, Y", strtotime($ann[5])).")";?></p> <button class="pull-right" style="margin-top: -20px;"><span class="glyphicon glyphicon-edit"></span></button>
 <hr>
  <p style=" text-indent: 50px; white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;"><?php echo ucwords($ann[3]) ?></p>


<button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#announment" data-id="<?php echo $ann[0]; ?>" id="view" style="margin-bottom: -50px;">View more</button>
</div>
 <?php
}
?>


<script type="text/javascript">
  $(document).ready(function(){
      $(document).on('click', '#view', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#view-content').html(''); // leave it blank before ajax call
      $('#view-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal.php',
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
      $(document).on('click', '#sendSMS', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#send-content').html(''); // leave it blank before ajax call
      $('#send-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'sms.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#send-content').html('');    
        $('#send-content').html(data); // load response 
        $('#send-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#send-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#send-loader').hide();
      });
      
    });
  });  
</script>
</body>
</html>



<!-- Modal -->
<div id="announment" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Announcement Details</h4>
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
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-info">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SMS Format</h4>
      </div>
      <div class="modal-body">
        <div id="send-loader" style="display: none; text-align: center;">
              <img src="assets/img/ajax-loader.gif">
        </div>
          <!-- content will be load here -->                          
        <div id="send-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="post" class="modal fade" role="dialog" >
  <div class="modal-dialog" style="min-height: 100vh;">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Post Announment</h4>
      </div>
      <div class="modal-body" >
       <form method="POST" action="action.php">
          <div class="form-group">
    <label for="email">Receiver:</label>
    <select class="form-control" name="ann_receiver">
      <?php 
      $sql = mysqli_query($conn,"SELECT * FROM `ref_position`");
      while ($receiver = mysqli_fetch_array($sql)) {  
        ?>
      <option value="<?php echo $receiver[0]?>"><?php echo $receiver[1]?></option>
        <?php
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="pwd">Title:</label>
    <input type="text" class="form-control" id="title" name="ann_title">
  </div>
  <div class="form-group">
    <label for="pwd">Description:</label>
    <textarea class="form-control" name="ann_description"></textarea>
  </div>
  <div class="text-center">
    <input type="submit" name="submit-announcement" value="POST" class="btn btn-success">
  </div>
       </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
