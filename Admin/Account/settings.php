<?php
include("../../connection.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <script src="../../bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
    <script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <link rel="shortcut icon" href="../../Img/Icon/indang logo.png">
  <link rel="stylesheet" type="text/css" href="../custom.css">
</head>
<body>
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
          <a class="navbar-brand" href="index">SETTINGS</a>
        </div>
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
     <?php
              $acc_ID = $_SESSION['user_session'];
               $official_ID = $_SESSION['official_ID'];
              $sql =  mysqli_query($conn,"SELECT * FROM user_account where acc_ID = $acc_ID");
              $view_data = mysqli_fetch_array($sql);
           
if(isset($_POST['submit']))

{

  $curpass = $_POST['curpass'];
  $pass = $_POST['pass'];
  $confirmpass = $_POST['comfirmpass'];
  if(password_verify($curpass, $view_data['acc_password']))
    {
      if ($pass == $confirmpass) 
      {
        $new_password = password_hash($confirmpass, PASSWORD_DEFAULT);
        mysqli_query($conn,"UPDATE `user_account` SET `acc_password` = '$new_password' WHERE `user_account`.`acc_ID` = $acc_ID;");
        echo "<script>alert('Successfully Updated! ');
                  window.location='settings.php';
                </script>";
      }
      else
      {
        echo "<script>alert('Password Doesn\'t match ! ');
                  window.location='settings.php';
                </script>";
      }
    }
    else
        {
        echo "<script>alert('Wrong Current Password! ');
                  window.location='settings.php';
                </script>";
        }
  
   
  

}

       ?>

<form >
  <!-- Trigger the modal with a button -->
<button type="button" class="btn btn-primary   pull-right" data-toggle="modal" data-target="#myModal"><span class=""></span> Edit</button>
  <br>
  <div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="email" value="<?php echo $view_data['acc_username'] ?>" disabled="">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" value="<?php echo $view_data['acc_password'] ?>"   disabled="">
  </div> 
</form>
</div>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Account</h4>
      </div>
      <div class="modal-body">
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <br>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="email" value="<?php echo $view_data['acc_username'] ?>"  disabled="">
        </div>
  <div class="form-group">
    <label for="pwd">Current Password:</label>
    <input type="password" class="form-control" id="pwd" value=""  name="curpass"  >
  </div> 

  <div class="form-group">
    <label for="pwd">New Password:</label>
    <input type="password" class="form-control" id="pwd" value=""   name="pass" >
  </div> 

  <div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="pwd" value=""  name="comfirmpass" >
  </div> 

  <div class="form-group">
    <input type="submit" class="btn btn-info" id="submit" value="Update"  name="submit" >
  </div> 
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
