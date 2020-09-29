<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT rd.*,ra.*,rfa.*,rpk.*,
sfx.suffix,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
rd.res_Date_Record FROM resident_detail rd 
LEFT JOIN ref_suffixname sfx ON rd.suffix_ID = sfx.suffix_ID 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID
LEFT JOIN resident_address ra ON ra.res_ID = rd.res_ID
LEFT JOIN ref_address rfa ON rfa.addressType_ID = ra.addressType_ID
LEFT JOIN ref_purok rpk ON rpk.purok_ID = ra.purok_ID
WHERE rd.res_ID =  $id");
$resident = mysqli_fetch_array($sql)
?>
<form method="POST" runat="server" action="<?php htmlspecialchars(" PHP_SELF ");?>" enctype="multipart/form-data" >

    <div class="modal-body">
    	<h4 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">RESIDENT INFO</h4>
        <br>
        <div class="col-lg-offset-4" id="image-holder">
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-lg-offset-4 col-md-4">
            <div class="file-upload">
                <div class="file-select">
                    <?php 
                    if (isset($resident[1])) {
                        $img  = $resident[1];
                        ?>
                        <img id="blah1" src="data:image/jpeg;base64,<?php echo base64_encode($img) ?>" alt="your image" height="250" width="250" class="img-circle" />
                        <?php
                    } 
                    else{
                      ?>
                      <img id="blah1" src="../../Img/Icon/logo.png" alt="your image" height="250" width="250" class="img-circle" />
                      <?php
                    }
                    ?>
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
        <?php 
            $suffix = $resident['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $resident['suffix'];
            }
           ?>
        <div required class="form-group col-md-4">
            <label for="res_fname">Firstname</label>
            <input type="text" class="form-control" value="<?php echo $resident[2]?>"  disabled="" >
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Middlename</label>
            <input type="text" class="form-control" value="<?php echo $resident[3]?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_lname">Lastname</label>
            <input type="text" class="form-control" value="<?php echo $resident[4]?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_suffix">Suffix</label>
            <input type="text" class="form-control" value="<?php echo $suffix?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_gender">Sex</label>
            <input type="text" class="form-control" value="<?php echo $resident['gender_Name']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_bdate">Birthdate</label>
            <input type="text" class="form-control" value="<?php echo $resident['res_Bday']?>"  disabled="">
          
        </div>

        <div class="form-group col-md-4">
            <label for="res_civilstatus">Civil status</label>
            <input type="text" class="form-control" value="<?php echo $resident['marital_Name']?>"  disabled="">
        </div>



        <div class="form-group col-md-4">
            <label for="res_mname">Height</label>
            <input type="text" class="form-control" value="<?php echo $resident['res_Height']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Weight</label>
            <input type="text" class="form-control" value="<?php echo $resident['res_Weight']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_citizenship">Citizenship</label>
            <input type="text" class="form-control" value="<?php echo $resident['country_citizenship']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_religion">Religion</label>            <input type="text" class="form-control" value="<?php echo $resident['religion_Name']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_occupationstatus">Occupation status</label>
            <input type="text" class="form-control" value="<?php echo $resident['occuStat_Name']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="mname">Occupation</label>
             <input type="text" class="form-control" value="<?php echo $resident['occupation_Name']?>"  disabled="">
        </div>

        <div class="clearfix"></div>
        <br>
        <br>

        <h4 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana">RESIDENT ADDRESS</h4>
        <br>

        <div class="form-group col-md-4">
            <label for="res_unit">Unit-Room-Floor</label>
             <input type="text" class="form-control" value="<?php echo $resident['address_Unit_Room_Floor_num']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_building">Building name</label>
            <input type="text" class="form-control" value="<?php echo $resident['address_BuildingName']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_lot">Lot</label>
            <input type="text" class="form-control" value="<?php echo $resident['address_Lot_No']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_block">Block</label>
           <input type="text" class="form-control" value="<?php echo $resident['address_Block_No']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_phase">Phase</label>
            <input type="text" class="form-control" value="<?php echo $resident['address_Phase_No']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_houseno">House number</label>
           <input type="text" class="form-control" value="<?php echo $resident['address_House_No']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_street">Street</label>
            <input type="text" class="form-control" value="<?php echo $resident['address_Street_Name']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_subdmname">Subdivision</label>
            <input type="text" class="form-control" value="<?php echo $resident['address_Subdivision']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_purokno"> Purok no.</label>
            <input type="text" class="form-control" value="<?php echo $resident['purok_Name']?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_address">Address type</label>
            <input type="text" class="form-control" value="<?php echo $resident['addressType_Name']?>"  disabled="">
        </div>

        <br>
        <br>
    </div>
    </form>
    <div class="modal-footer">

    </div>

<?php
}
?>