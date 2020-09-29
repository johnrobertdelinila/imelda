<?php
include("../../connection.php");
?>

<?php

$largestNumber= $rid= "";
                           $rowSQL = mysqli_query($conn, "SELECT MAX( res_ID ) AS max FROM `resident_detail`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largestNumber = $row['max'];
                                    $rid= $largestNumber+1;

                                  ?>

                <?php

$largest_address= $aid= "";
                           $rowSQL = mysqli_query($conn, "SELECT MAX( address_ID ) AS max FROM `resident_address`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_address= $row['max'];
                                    $aid= $largest_address+1;

                                  ?>

                    <?php

$largest_contact= $cid= "";
                           $rowSQL = mysqli_query($conn, "SELECT MAX( contact_ID ) AS max FROM `resident_contact`;" );
                                  $row = mysqli_fetch_array( $rowSQL );
                                  $largest_contact= $row['max'];
                                    $cid= $largest_contact+1;

                                  ?>

                        <?php
$res_fname = $res_mname = $res_lname = $res_suffix = $res_gender = $res_bdate = $res_bdate = $res_civilstatus= $res_contactnum =$res_id = $res_contacttype = $res_religion = $res_occupationstatus= $res_occupation =$res_height= $res_weight= $res_citizenship=  $res_houseno=   $res_purokno= $res_region= $res_address= $res_brgy="" ;

 $res_building= $res_lot= $res_block= $res_phase=$res_street =$res_subd= "";

 $res_unit=  "0";     

$isuffix= $igender= $icstatus = $ictype= $irel= $ioccst= $iocc= $iciti= $ipurok=$iadd= $ibrgy="" ;

  if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_fname=$_POST["res_fname"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_mname=$_POST["res_mname"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_lname=$_POST["res_lname"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $isuffix=$_POST["res_suffix"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $suffix= "";
                        $rows = mysqli_query($conn, "SELECT suffix_ID  FROM `ref_suffixname` where suffix = '$isuffix';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $suffix = $row['suffix_ID'];
             $res_suffix=$suffix;
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $igender=$_POST["res_gender"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $gender= "";
                        $rows = mysqli_query($conn, "SELECT gender_ID  FROM `ref_gender` where gender_Name = '$igender';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $gender = $row['gender_ID'];
             $res_gender=$gender;
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_bdate=$_POST["res_bdate"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $icstatus=$_POST["res_civilstatus"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $cstatus= "";
                        $rows = mysqli_query($conn, "SELECT marital_ID  FROM `ref_marital_status` where marital_Name = '$icstatus';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $cstatus = $row['marital_ID'];
             $res_civilstatus=$cstatus;
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_contactnum=$_POST["res_contactnum"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ictype=$_POST["res_contacttype"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $ctype= "";
                        $rows = mysqli_query($conn, "SELECT contactType_ID  FROM `ref_contact` where contactType_Name = '$ictype';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $ctype = $row['contactType_ID'];
             $res_contacttype=$ctype;
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $irel=$_POST["res_religion"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $relig= "";
                        $rows = mysqli_query($conn, "SELECT religion_ID  FROM `ref_religion` where religion_name = '$irel';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $relig = $row['religion_ID'];
             $res_religion= $relig;
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ioccst=$_POST["res_occupationstatus"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
          if ($ioccst == "NULL") {
            $occst= NULL;
          }
          else{

             $occst= "";
                        $rows = mysqli_query($conn, "SELECT occuStat_ID  FROM `ref_occupation_status` where occuStat_Name = '$ioccst';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $occst = $row['occuStat_ID'];
             $res_occupationstatus=$occst;
          }
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iocc=$_POST["res_occupation"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $occ= "";
                        $rows = mysqli_query($conn, "SELECT occupation_ID  FROM `ref_occupation` where occupation_Name = '$iocc';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $occ = $row['occupation_ID'];
             $res_occupation=$occ;
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_height=$_POST["res_height"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_weight=$_POST["res_weight"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iciti=$_POST["res_citizenship"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $citi= "";
                        $rows = mysqli_query($conn, "SELECT country_ID  FROM `ref_country` where country_citizenship = '$iciti';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $citi= $row['country_ID'];
             $res_citizenship= $citi;
        }

  if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_unit=$_POST["res_unit"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_building=$_POST["res_building"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_lot=$_POST["res_lot"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_block=$_POST["res_block"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_phase=$_POST["res_phase"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_houseno=$_POST["res_houseno"];
        } 

if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_street=$_POST["res_street"];
        }

 if ($_SERVER["REQUEST_METHOD"]== "POST"){
$res_subd=$_POST["res_subd"];
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $ipurok=$_POST["res_purokno"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $purok= "";
             $region= "";
                        $rows = mysqli_query($conn, "SELECT purok_ID,region_Code  FROM `ref_purok` where purok_Name = '$ipurok';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $purok = $row['purok_ID'];
                                  $region = $row['region_Code'];

             $res_purokno=$purok;

             $res_region=$region;
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
     $iadd=$_POST["res_address"];
       }

        if ($_SERVER["REQUEST_METHOD"]== "POST"){
             $address= "";
                        $rows = mysqli_query($conn, "SELECT addressType_ID  FROM `ref_address` where addressType_Name = '$iadd';" );
                                  $row = mysqli_fetch_array( $rows );
                                  $address= $row['addressType_ID'];
             $res_address= $address;
        }

if ($_SERVER["REQUEST_METHOD"]== "POST"){
 $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
}
?>

                            <?php

If($rid &&$res_fname  && $res_lname && $res_suffix && $res_gender && $res_bdate && $res_civilstatus && $res_religion && $res_religion && $res_occupationstatus && $res_occupation && $res_height && $res_weight && $res_citizenship){

        $query=mysqli_query($conn,"INSERT INTO resident_detail(res_ID,res_Img, 
res_fName, res_mName,res_lName,suffix_ID, gender_ID, res_Bday, marital_ID,religion_ID,res_Height,res_Weight, occuStat_ID,occupation_ID,country_ID) VALUES('$rid','$file','$res_fname','$res_mname','$res_lname','$res_suffix','$res_gender','$res_bdate','$res_civilstatus','$res_religion','$res_height', '$res_weight','$res_occupationstatus','$res_occupation','$res_citizenship') ");
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";

        if ($res_contactnum && $rid && $res_contacttype && $res_citizenship){
             $query=mysqli_query($conn,"INSERT INTO resident_contact(contact_ID,contact_telnum,res_ID,contactType_ID,country_ID) VALUES('$cid','$res_contactnum','$rid','$res_contacttype','$res_citizenship') ");

        }

          if ( $rid ){
             $query=mysqli_query($conn,"INSERT INTO resident_address(address_ID,address_Unit_Room_Floor_num,res_ID,address_BuildingName,address_Lot_No,address_Block_No,address_Phase_No,address_House_No,address_Street_Name,address_Subdivision,country_ID,purok_ID,region_ID,addressType_ID) VALUES('$aid','$res_unit','$rid','$res_building',' $res_lot',' $res_block','$res_phase','$res_houseno','$res_street','$res_subd','$res_citizenship','$res_purokno','$res_region','$res_address') ");

        }

    header('Location: resident.php');

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
          <a class="navbar-brand" href="index">RESIDENT PROFILLING</a>
        </div>
        <!--/.nav-collapse -->
      </div>
    </nav>
<div class="container" style="margin-top:120px;">
  <?php 

  
$sql = mysqli_query($conn,"SELECT res_ID,res_fName,res_mName,res_lName,rs.suffix,rms.marital_Name,rg.gender_Name,rr.religion_Name,ro.occupation_Name,ros.occuStat_Name,res_Date_Record,rc.country_citizenship,res_Bday,TIMESTAMPDIFF(YEAR,res_Bday,CURDATE()) AS age,
(case  
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1) then 'Maternal and Newborn'
 when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=1 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=12) then 'Babies'
when (TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Month,res_Bday,CURDATE())<=24) then 'Toddlers'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=2 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=4) then 'Preschoolers'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=5 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=8) then 'School Age Children'
 when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=9 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=12) then 'Tweens '
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=13 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=19) then 'Teenager'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=20 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=35) then 'Young Adult'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=36 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=55) then 'Middle-Aged Adults'
when (TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=56 and TIMESTAMPDIFF(Year,res_Bday,CURDATE())<=100) then 'Senior'
   end) Age_Stage
FROM resident_detail rd 
LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rms.marital_ID = rd.marital_ID
LEFT JOIN ref_religion rr ON rr.religion_ID = rd.religion_ID 
LEFT JOIN ref_occupation ro ON ro.occupation_ID = rd.occupation_ID 
LEFT JOIN ref_occupation_status ros ON ros.occuStat_ID = rd.occuStat_ID
LEFT JOIN ref_country rc ON rc.country_ID = rd.country_ID");

?>

<button class="btn btn-success pull-left" data-toggle="modal" data-target="#add">ADD RESIDENT</button>
<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#print">PRINT</button>
<br><br>
      <table class="table table-bordered " id="residents">
        <thead class="bg-primary">
          <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Stage</th>
            <th>Sex</th>
            <th>Citizenship</th>
            <th>Occupation</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody >
          <?php 
          while ($res_data = mysqli_fetch_array($sql)) {
            $suffix = $res_data['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $res_data['suffix'];
            }
           ?>
           <tr>
            <td><?php echo $res_data['res_fName']." ".$res_data['res_mName'].". ".$res_data['res_lName']." ".$suffix ?></td>
            <td><?php echo $res_data['age'] ?></td>
            <td><?php echo $res_data['Age_Stage'] ?></td>
            <td><?php echo $res_data['gender_Name'] ?></td>
            <td><?php echo $res_data['country_citizenship'] ?></td>
            <td><?php echo $res_data['occupation_Name'] ?></td>
            <td>
              <div class="btn-group">
                <button type="button" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span></button>
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li><a  data-toggle="modal" data-target="#view" data-id="<?php echo $res_data['res_ID']; ?>"  id="view_resident">View</a></li>
                  <li><a data-toggle="modal" data-target="#edit" data-id="<?php echo $res_data['res_ID']; ?>"  id="edit_resident">Edit</a></li>
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
    $('#residents').DataTable();
} );

$(document).ready(function(){
      $(document).on('click', '#view_resident', function(e){
      
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
      $(document).on('click', '#edit_resident', function(e){
      
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

       $(document).on('click', '#delete_resident', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#delete-content').html(''); // leave it blank before ajax call
      $('#delete-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'modal_delete.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#delete-content').html('');    
        $('#delete-content').html(data); // load response 
        $('#delete-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#delete-loader').hide();
      });
      
    });
  }); 


</script>
</body>
</html>



<!-- Modal -->
<div id="print" class="modal fade" role="dialog">
   <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">GENERATE RESIDENT REPORTS</h4>
         </div>
         <div class="modal-body">
            <form action="resident-export.php" target="_blank" method="POST">
               <div class="modal-body">
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>All list of resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Resident.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <!-- <a href="resident-export.php?report=all" class="btn btn-primary btn-sm legitRipple" target="_blank">PRINT</a> -->
                           <div class="btn-group">
                              <button type="submit" name="resident" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="residentpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Male Resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Male.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="male" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="malepdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Female Resident</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Female.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="female" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="femalepdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Infant</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Infant.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Infant" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Infantpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Minor</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Minor.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Minor" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Minorpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Teenager</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Teen.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Teen" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Teenpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Adult</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Adult.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Adult" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Adultpdf" class="btn btn-danger btn-xs">Pdf</button>
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Senior Citizen</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Senior.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="Senior" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="Seniorpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Employed</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Employed.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="employed" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="employedpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Unemployed</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Unemployed.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="unemployed" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="unemployedpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                        <div class="col-sm-6  text-center">
                           <h1>Death</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/Death.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="death" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="deathpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                        <div class="col-sm-6  text-center">
                           <h1>Pregnant</h1>
                           <div class="thumbnail">
                              <img   class='img-circle img-responsive' alt='' style="border-radius: 50%; width: 180px;height: 180px; background-image: url(../../Img/Icon/pregnant.jpg); background-repeat: no-repeat;background-size: cover; border:solid 1px;">
                           </div>
                           <div class="btn-group">
                              <button type="submit" name="preg" class="btn btn-success btn-xs">Excel</button>
                              <button type="submit" name="pregpdf" class="btn btn-danger btn-xs">Pdf</button>
                              
                           </div>
                        </div>
                     </div>
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


<!-- Modal -->
<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Resident</h4>
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
        <h4 class="modal-title">Edit Resident</h4>
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
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-danger">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Resident</h4>
      </div>
      <div class="modal-body">
        <div id="delete-loader" style="display: none; text-align: center;">
            <img src="assets/img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="delete-content"></div>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header  bg-success">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Resident</h4>
      </div>
      <div class="modal-body">
        <form method="POST" runat="server" action="<?php htmlspecialchars(" PHP_SELF ");?>" enctype="multipart/form-data" >

    <div class="modal-body">
        <div class="col-lg-offset-4" id="image-holder">
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-lg-offset-4 col-md-4">
            <div class="file-upload">
                <div class="file-select">
                    <img id="blah" src="../../Img/Icon/logo.png" alt="your image" height="250" width="250" class="img-circle" />
                    <input type="file" name="image" id="profileImg" >
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
                      $("#profileImg").change(function() {
                        readURL(this);
                      });
                    </script>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div required class="form-group col-md-4">
            <label for="res_fname">Firstname</label>
            <input type="text" maxlength="20" class="form-control" id="res_fname" name="res_fname" placeholder="Firstname" required>
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Middlename</label>
            <input type="text" maxlength="20" class="form-control" id="res_mname" name="res_mname" placeholder="Middlename">
        </div>

        <div class="form-group col-md-4">
            <label for="res_lname">Lastname</label>
            <input type="text" maxlength="20" class="form-control" id="res_lname" name="res_lname" placeholder="Lastname" required>
        </div>

        <div class="form-group col-md-4">
            <label for="res_suffix">Suffix</label>
            <select class="form-control" id="res_suffix" name="res_suffix">
                <option value="">Suffix</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_suffixname");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["suffix"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_gender">Sex</label>
            <select required class="form-control" id="res_gender" name="res_gender">
                <option value="" disabled selected>Sex</option>

                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_gender");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["gender_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_bdate">Birthdate</label>
            <input placeholder="Birthdate" class="form-control" type="text" onfocus="(this.type='date')" onblur="getAge();" id="res_bdate" name="res_bdate">
            <!-- onblur="(this.type='text')" -->
        </div>
<!-- 
        <div class="form-group col-md-4">
            <label for="res_age">Age</label>
            <input type="number" readonly maxlength="3" class="form-control" id="res_age" placeholder="Age">
        </div> -->

        <div class="form-group col-md-4">
            <label for="res_civilstatus">Civil status</label>
            <select required class="form-control" id="res_civilstatus" name="res_civilstatus">
                <option value="" disabled selected>Civil status</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_marital_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["marital_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_contactnum">Contact</label>
            <input type="text" maxlength="11" class="form-control" id="res_contactnum" name="res_contactnum" onkeyup="numbersOnly(this)" placeholder="Contact number">
        </div>

        <div class="form-group col-md-4">
            <label for="res_contacttype">Contact type</label>
            <select required class="form-control" id="res_contacttype" name="res_contacttype">
                <option value="" disabled selected>Contact type</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_contact");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["contactType_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Height</label>
            <input type="number" class="form-control" id="res_height" name="res_height" placeholder="Meter/Centimeter">
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Weight</label>
            <input type="number" class="form-control" id="res_weight" name="res_weight" placeholder="Kilogram">
        </div>

        <div class="form-group col-md-4">
            <label for="res_citizenship">Citizenship</label>
            <select required class="form-control" id="res_citizenship" name="res_citizenship">
                <option value="" disabled selected>Citizenship</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_country where country_ID=169");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["country_citizenship"];?>
                    </option>

                    <?php
        }

        ?>

            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_religion">Religion</label>
            <select required class="form-control" id="res_religion" name="res_religion">
                <option value="" disabled selected>Religion</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_religion");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["religion_Name"];?>
                    </option>

                    <?php
        }

        ?>

            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_occupationstatus">Occupation status</label>
            <select required class="form-control" id="res_occupationstatus" name="res_occupationstatus">
                <option value="" disabled selected>Occupational status</option>
                <option value="NULL">N/A</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_occupation_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["occuStat_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="mname">Occupation</label>
            <select required class="form-control" id="res_occupation" name="res_occupation">
                <option value="" disabled selected>Occupational </option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_occupation");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["occupation_Name"];?>
                    </option>

                    <?php
        }

        ?>

            </select>
        </div>

        <div class="clearfix"></div>
        <br>
        <br>

        <h4 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">RESIDENT ADDRESS</h4>
        <br>

        <div class="form-group col-md-4">
            <label for="res_unit">Unit-Room-Floor</label>
            <input type="text" maxlength="20" class="form-control" id="res_unit" name="res_unit" placeholder="Unit-Room-Floor">
        </div>

        <div class="form-group col-md-4">
            <label for="res_building">Building name</label>
            <input type="text" maxlength="15" class="form-control" id="res_building" name="res_building" placeholder="Building name">
        </div>

        <div class="form-group col-md-4">
            <label for="res_lot">Lot</label>
            <input type="text" maxlength="15" class="form-control" id="res_lot" name="res_lot" placeholder="Lot">
        </div>

        <div class="form-group col-md-4">
            <label for="res_block">Block</label>
            <input type="text" maxlength="15" class="form-control" id="res_block" name="res_block" placeholder="Block">
        </div>

        <div class="form-group col-md-4">
            <label for="res_phase">Phase</label>
            <input type="text" maxlength="15" class="form-control" id="res_phase" name="res_phase" placeholder="Phase">
        </div>

        <div class="form-group col-md-4">
            <label for="res_houseno">House number</label>
            <input type="text" maxlength="15" class="form-control" id="res_houseno" name="res_houseno" placeholder="House number">
        </div>

        <div class="form-group col-md-4">
            <label for="res_street">Street</label>
            <input type="text" maxlength="15" class="form-control" id="res_street" name="res_street" placeholder="Street">
        </div>

        <div class="form-group col-md-4">
            <label for="res_subdmname">Subdivision</label>
            <input type="text" maxlength="20" class="form-control" id="res_subd" name="res_subd" placeholder="Subdivision">
        </div>

        <div class="form-group col-md-4">
            <label for="res_purokno"> Purok no.</label>
            <select required class="form-control" id="res_purokno" name="res_purokno">
                <option value="" disabled selected>Purok no.</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_purok");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option>
                        <?php echo $row["purok_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_address">Address type</label>
            <select required class="form-control" id="res_address" name="res_address">
                <option value="" disabled selected>Address type</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_address");
        while ($row=mysqli_fetch_array($res))
        {
          
          ?>
                    <option>
                        <?php echo $row["addressType_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <br>
        <br>
    </div>
    <div class="clearfix"></div>
    <div class="modal-footer">
        <div class="clearfix"></div>
        <div class="row-bttn">
            &nbsp;&nbsp;
            <p>
                <center>
                    <a href="profile.php">
                        <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" /> </a>
                </center>
            </p>

        </div>

    </div>
</form>
      </div>
      <div class="modal-footer">
      </div>
    </div>

  </div>
</div>
