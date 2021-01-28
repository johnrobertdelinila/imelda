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
            <li><a href="index">Home</a></li>
            <li><a href="about">About</a></li>
            <li class="active"><a href="announcement">Announcement</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container panel panel-default" style="margin-top:120px;">
            <?php 
                $sql = mysqli_query($conn,"SELECT ar.*,rp.position_Name FROM `anouncement_raw` ar
                LEFT JOIN ref_position rp  ON rp.position_ID = ar.receiver_ID ORDER BY ar.ann_ID DESC");
                while ($ann = mysqli_fetch_array($sql)) {
            ?>
                <div class="box effect1">
                    <p><?php echo strtoupper($ann[2])."[ ".$ann[6]." ] (".date("M jS, Y", strtotime($ann[5])).")";?></p> <button class="pull-right" style="margin-top: -20px;"><span class="glyphicon glyphicon-edit"></span></button>
                    <hr>
                    <p style=" text-indent: 50px; white-space: nowrap; 
                        overflow: hidden;
                        text-overflow: ellipsis;"><?php echo ucwords($ann[3]) ?>
                    </p>

                    
                </div>
            <?php
                }
            ?>

            </div>

<script type="text/javascript">

</script>
</body>
</html>
