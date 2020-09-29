<?php
include("../../connection.php");
 
          
    if (isset($_POST['submit-municipalLogo'])) {
      if ($_FILES["logo"]["size"] == 0) {
          echo "<script>alert('Please Choose File first!');
                                    window.location='index.php';
                                </script>";  
        }

      else{
          $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
          
          $sql = "UPDATE `ref_logo` SET logo_img='$logo' WHERE logo_Name='Municipal Logo';";

        if (mysqli_query($conn, $sql)) 
            {
            echo "<script>alert('Successfully Update!');
                                    window.location='index.php';
                                </script>";       
            }
        else {
           echo "<script>alert('Upload Error!  ');
                                    window.location='index.php';
                                </script>";  
            }
      }
    }
     if (isset($_POST['submit-brgypalLogo'])) {
      if ($_FILES["logo"]["size"] == 0) {
          echo "<script>alert('Please Choose File first!  ');
                                    window.location='index.php';
                                </script>"; }
      else{
          $logo = addslashes(file_get_contents($_FILES['logo']['tmp_name']));
         
          $sql = "UPDATE `ref_logo` SET logo_img='$logo' WHERE logo_Name='Barangay Logo';";

        if (mysqli_query($conn, $sql)) 
        {
            echo "<script>alert('Successfully Update!  ');
                                    window.location='index.php';
                                </script>";    
                                }   
        else {
            echo "<script>alert('Upload Error!  ');
                                    window.location='index.php';
                                </script>";  
            }
      }
    }
   
    if (isset($_POST['submit-brgyInfo'])) {
        $brgy_Name = $_POST['brgy_name'];
        $citymun_Name = $_POST['brgy_city'];
        $province_Name = $_POST['brgy_province'];
        if(empty($brgy_Name)){
          $s1 = "Null!! Please Search and Select from the table!";
        }
        else{
          $sql_sub = "UPDATE brgy_address_info SET brgy_Name='$brgy_Name',
                      citymun_Name='$citymun_Name', province_Name='$province_Name'
                      WHERE caller_Code='setter'";
          if (mysqli_query($conn, $sql_sub)) {
            echo "<script>alert('Successfully Update!  ');
                                    window.location='index.php';
                                </script>";  
        }
          else {
            echo "<script>alert('Failed Update!  ');
                                    window.location='index.php';
                                </script>";  
        }
        }

      }


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
                <a class="navbar-brand" href="index">SETUP BARANGAY INFO</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <!--  <li class="active"><a href="index">Home</a></li>
            <li><a href="smslog">SMS Log</a></li> -->
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    <div class="container" style="margin-top:120px;">
        <?php
      $sql = mysqli_query($conn,"SELECT * FROM `brgy_address_info`");
      $brgy_info = mysqli_fetch_array($sql);     
      ?>
            <form>
                <div class="form-group">

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">EDIT</button>
                    
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany Name:</label>
                    <input type="text" class="form-control" id="title" name="" disabled="" value="<?php echo $brgy_info[0]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany City:</label>
                    <input type="text" class="form-control" id="title" name="" disabled="" value="<?php echo $brgy_info[1]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany Province:</label>
                    <input type="text" class="form-control" id="title" name="" disabled="" value="<?php echo $brgy_info[2]?>">
                </div>
            </form>
            <?php
      $sql = mysqli_query($conn,"SELECT * FROM `ref_logo` WHERE logo_ID = 1");
          
      $brgy_logo = mysqli_fetch_array($sql);
      $sql = mysqli_query($conn,"SELECT * FROM `ref_logo` WHERE logo_ID = 2");
          
      $minicpal_logo = mysqli_fetch_array($sql);
    
      ?>
                <div class="col-sm-12">
                    <div class="col-sm-6  text-center">
                        <label>Barangay Logo</label>
                        <br>
                        <form id="form1" runat="server" method="POST"  enctype="multipart/form-data">

                            <div class="form-group">
                                <input type='file' id="imgInp" class="form-control" name="logo" />
                            </div>
                            <div class="form-group">
                    <?php 
                    if (isset($brgy_logo[1])) {
                        $img  = $brgy_logo[1];
                        ?>
                        <img id="blah" src="data:image/jpeg;base64,<?php echo base64_encode($img) ?>" alt="your image" height="250" width="250" class="img-circle" />
                        <?php
                    } 
                    else{
                      ?>
                      <img id="blah" src="../../Img/Icon/logo.png" alt="your image" height="250" width="250" class="img-circle" />
                      <?php
                    }
                    ?>
                            </div>
                            <div class="form-group">
                                <input type="Submit" name="submit-brgypalLogo" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-6 text-center">
                        <label>Municipal Logo</label>
                        <br>
                        <form id="form1" runat="server"  method="POST"  enctype="multipart/form-data">
                            <div class="form-group">

                                <input type='file' id="imgInp1" class="form-control" name="logo" />
                            </div>
                            <div class="form-group">
                    <?php 
                    if (isset($minicpal_logo[1])) {
                        $img1  = $minicpal_logo[1];
                        ?>
                        <img id="blah1" src="data:image/jpeg;base64,<?php echo base64_encode($img1) ?>" alt="your image" height="250" width="250" class="img-circle" />
                        <?php
                    } 
                    else{
                      ?>
                      <img id="blah1" src="../../Img/Icon/logo.png" alt="your image" height="250" width="250" class="img-circle" />
                      <?php
                    }
                    ?>
                                
                            </div>
                            <div class="form-group">
                                <input type="Submit" name="submit-municipalLogo" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>



    </div>

    <script type="text/javascript">
        function readURL(input) {
        
          if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              $('#blah').attr('src', e.target.result);
        
        
            }
        
            reader.readAsDataURL(input.files[0]);
          }
        }
        function readURL1(input) {
        
          if (input.files && input.files[0]) {
            var reader = new FileReader();
        
            reader.onload = function(e) {
              $('#blah1').attr('src', e.target.result);
        
        
            }
        
            reader.readAsDataURL(input.files[0]);
          }
        }
        
        $("#imgInp").change(function() {
          readURL(this);
        });
        $("#imgInp1").change(function() {
          readURL1(this);
        });
    </script>
</body>

</html>

<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Barangay Info</h4>
      </div>
      <div class="modal-body">
        <form method="POST" action=""  enctype="multipart/form-data">
                <div class="form-group">
                    <label for="pwd">Baragany Name:</label>
                    <input type="text" class="form-control" id="title" name="brgy_name" value="<?php echo $brgy_info[0]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany City:</label>
                    <input type="text" class="form-control" id="title" name="brgy_city" value="<?php echo $brgy_info[1]?>">
                </div>
                <div class="form-group">
                    <label for="pwd">Baragany Province:</label>
                    <input type="text" class="form-control" id="title" name="brgy_province"  value="<?php echo $brgy_info[2]?>">
                </div>
                <div class="form-group text-center">
                    <input type="Submit" name="submit-brgyInfo" value="Update" class="btn btn-success">
                </div>
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>