<?php
require_once('login.php'); // Includes Login Script
require_once('connection.php');
if(isset($_SESSION['user_session']))
{      

    $user=$_SESSION['user_session'];// passing the session user to new user variable
           
    $query = mysqli_query($conn,"SELECT acc_ID FROM user_account WHERE acc_ID='$user'"); 
            //SQL query to fetch information of registerd users and finds user match.
            

            
    $rows = mysqli_fetch_assoc($query);
    
    
     if (isset($rows['acc_ID'])) //checking if acclevel is equal to 0
     {   
         header("location: admin/index.php");// retain to user dashboard
     }
     else
     {
     
     } 
       
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home - Barangay Management Information System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <script src="bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
    <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/custom.css">
    <link rel="shortcut icon" href="Img/Icon/indang logo.png">
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
          <a class="navbar-brand" href="#">IMELDA</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index">Home</a></li>
            <li><a href="about">About</a></li>
            <li><a href="announcement">Announcement</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
<div class="container">
    <div class="row" >
        <div class="col-md-5 col-md-offset-7" >
            <div class="panel panel-default" >
                <div class="panel-heading" style="background-color: #14aa6c; color: white;">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body" style="min-height: 300px;">
                    <form class="form-horizontal" role="form" method="POST" action="login.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-8 control-label">
                            <img src="Img/Icon/banaba.png"  height="100" width="100">
                        </label>
                      
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Username</label>
                        <div class="col-sm-9">
                            <input type="text"  name="username"class="form-control" id="inputEmail3" placeholder="Enter Username" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3"   class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Enter Password" required>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-5 col-sm-9">
                                <input type="Submit" name="submit" value="Sign in"  class="btn btn-default btn-lg" id="btndark">
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer" style="background-color: #14aa6c">
                 
                 </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

</script>
</body>
</html>
