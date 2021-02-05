<?php
    include("connection.php");
    $q = mysqli_query($conn,"SELECT * FROM `ref_brgy_info`");
    $about = mysqli_fetch_array($q);   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>About - Barangay Management Information System</title>
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
            <li class="active"><a href="about">About</a></li>
            <li><a href="announcement">Announcement</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <style type="text/css">
        .panel-default {
            opacity: 100;
            margin-top: 130px;
        }
    </style>
<div class="container">
    <div class="row" >
        <div class="col-md-3 col-md-offset-1" style=".row:hover:{border:solid 1px;}">
            <div class="panel panel-default" >
                <div class="panel-heading text-center" >
                  Management Information System</div>
                <div class="panel-body" style="min-height: 300px;">
                    <form class="form-horizontal" >
                    <div class="form-group last">
                        <div class="text-center" style="padding: 5px;">
                            <img src="Img/about.jpg"  height="105" width="201">
                            <h4>Bgy. Management Information System</h4>
                            <h5><?php echo mb_strimwidth($about[1], 0, 25, "..."); ?></h5>
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bmis">READ MORE</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer" ></div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1" >
            <div class="panel panel-default" >
                <div class="panel-heading text-center" >
                   MISSION AND VISION</div>
                <div class="panel-body" style="min-height: 300px;">
                    <form class="form-horizontal" >
                    <div class="form-group last">
                        <div class="text-center" style="padding: 5px;">
                            <img src="Img/about.jpg"  height="105" width="201">
                            <h4>Mission and Vision of Imelda Naguilian</h4>
                            <h5>Mission: <?php echo mb_strimwidth($about[2], 0, 25, "..."); ?></h5>
                            <button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#mv">READ MORE</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer" ></div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1" >
            <div class="panel panel-default" >
                <div class="panel-heading text-center" >
                IMELDA NAGUILIAN</div>
                <div class="panel-body" style="min-height: 300px;">
                    <form class="form-horizontal" >
                    <div class="form-group last">
                        <div class="text-center" style="padding: 5px;">
                            <img src="Img/about.jpg"  height="105" width="201">
                            <h4>Municipal Profile</h4>
                            <h5>REGION : I PROVINCE : NAGUILIAN CONGRESSIONAL DISTRICT: 2nd MUNICIPALITY : IMELDA ...</h5>
                            <button  type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#inprofile">READ MORE</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer" ></div>
            </div>
        </div>

    </div>
</div>
<!-- Modal -->
<div id="bmis" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Barangay Management Information System</h4>
      </div>
      <div class="modal-body">
        <center>
                        <h1>
                            <font size="5" color="green">
                                <B>Barangay Management Information System</b> </font>
                        </h1>
                    </center>
                    <div>
                        <p><img src="Img/Icon/indang logo.png" align="left"> &emsp; <?php echo $about['1'] ?></p>



                    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="mv" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Mission and Vision</h4>
      </div>
      <div class="modal-body">
            <center>
                <h1>
                    <font size="5" color="green"> <b>Mission and Vision</b></font>
                </h1>
                <h1>
                    <font size="5" color="green"><b>Mission</b></font>
                </h1>
                <p> <?php echo $about['2'] ?></p>

                <h1>
                    <font size="5" color="green"><b>Vision</b></font>
                </h1>
                <p> <?php echo $about['3'] ?></p>
            </center>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- Modal -->
<div id="inprofile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Municipal Profile</h4>
      </div>
      <div class="modal-body">
      <h1>
                        <font size="5" color="green">
                            <B>Fact and Figures</b> </font>
                    </h1>
                    <center>
                        <img src="Img/municipal.jpg" align="" width="500" style="border:1px solid;"></center>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <B>REGION</b> :</td>
                            <td>I</td>
                        </tr>
                        <tr>
                            <td>
                                <B>PROVINCE</b> :</td>
                            <td>NAGUILIAN</td>
                        </tr>
                        <tr>
                            <td>
                                <B>CONGRESSIONAL DISTRICT</b> :</td>
                            <td>2nd </td>
                        </tr>
                        <tr>
                            <td>
                                <B>MUNICIPALITY</b> :</td>
                            <td>IMELDA</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Income Class</b> :</td>
                            <td>3rd Class</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Land Area</b> :</td>
                            <td>104.60 km2 (40.39 sq mi) </td>
                        </tr>

                        <tr>
                            <td>
                                <B>Number of Sitio</b> :</td>
                            <td> <?php echo $about['4'] ?> Sitios</td>
                        </tr>

                        <tr>
                            <td>
                                <B>Number of Bridge</b> :</td>
                            <td> <?php echo $about['5'] ?> bridges</td>
                        </tr>
                    </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
