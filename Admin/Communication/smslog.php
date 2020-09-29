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
<body >

     <?php 
   include('global_nav.php');
   ?>
<div class="container" style="margin-top:120px;">
      <table class="table table-bordered " id="smslog">
        <thead class="bg-primary">
          <tr>
            <th>Receiver Name</th>
            <th>Title</th>
            <th>Mobile Number</th>
            <th>Position</th>
            <th>Date Send</th>
          </tr>
        </thead>
        <tbody >
          <?php
          $log = mysqli_query($conn,"SELECT * FROM `sms`
LEFT JOIN anouncement_raw ar ON ar.ann_ID = sms.ann_ID
LEFT JOIN resident_contact rc ON rc.contact_ID = sms.contact_ID
LEFT JOIN ref_position rp ON rp.position_ID = sms.receiver_ID
LEFT JOIN resident_detail rd ON rd.res_ID  = rc.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID");
          while ($log_data = mysqli_fetch_array($log)) {
          $suffix = $log_data['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $log_data['suffix'];
            }
          
           ?>
          <tr>
            <td><?php echo $log_data['res_fName']."".$log_data['res_mName']."".$log_data['res_lName']. $suffix?></td>
            <td><?php echo $log_data['ann_Title']?></td>
            <td><?php echo $log_data['contact_telnum']?></td>
            <td><?php echo $log_data['position_Name']?></td>
            <td><?php echo $log_data['date']?></td>
          </tr>
          <?php 
          }
          ?>
        </tbody>
      </table>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#smslog').DataTable();
} );
</script>
</body>
</html>
