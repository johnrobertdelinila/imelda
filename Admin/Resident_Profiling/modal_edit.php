<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT rd.*,
sfx.suffix,
rms.marital_Name,
rg.gender_Name,
rr.religion_Name,
rc.country_nationality,
rc.country_citizenship,
ro.occupation_Name,
ros.occuStat_Name,
rd.res_Date_Record,
rsc.*,
rad.* FROM resident_detail rd 
LEFT JOIN ref_suffixname sfx ON rd.suffix_ID = sfx.suffix_ID 
LEFT JOIN ref_marital_status rms ON rd.marital_ID = rms.marital_ID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID 
LEFT JOIN ref_religion rr ON rd.religion_ID = rr.religion_ID 
LEFT JOIN ref_occupation ro ON rd.occupation_ID = ro.occupation_ID 
LEFT JOIN ref_occupation_status ros ON rd.occuStat_ID = ros.occuStat_ID 
LEFT JOIN resident_contact rsc ON rsc.res_ID = rd.res_ID
LEFT JOIN resident_address rad ON rad.res_ID = rd.res_ID
LEFT JOIN ref_country rc ON rd.country_ID = rc.country_ID  WHERE rd.res_ID = $id");
$resident = mysqli_fetch_array($sql);
?>
<form method="POST" runat="server" action="action.php" enctype="multipart/form-data" >

    <div class="modal-body">
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
        <?php 
            $suffix = $resident['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $resident['suffix'];
            }
           ?>
        <h5>Asterisk <strong style="color: red;">*</strong> fields are required.</h5>
        <div required class="form-group col-md-4">
            <label for="res_fname">Firstname <strong style="color: red;">*</strong></label>
            <input type="text" class="form-control" value="<?php echo $resident[2]?>"  disabled="" >
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Middlename <strong style="color: red;">*</strong></label>
            <input type="text" class="form-control" value="<?php echo $resident[3]?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_lname">Lastname <strong style="color: red;">*</strong></label>
            <input type="text" class="form-control" value="<?php echo $resident[4]?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_suffix">Suffix <strong style="color: red;">*</strong></label>
            <input type="text" class="form-control" value="<?php echo $suffix?>"  disabled="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_gender">Sex <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_gender" name="res_gender">
                <option value="" disabled selected>Sex</option>

                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_gender");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option value="<?php echo $row["gender_ID"];?>" <?php echo ($row["gender_ID"] == $resident[10] ? 'selected' : '') ?>>
                        <?php echo $row["gender_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_bdate">Birthdate <strong style="color: red;">*</strong></label>
            <input placeholder="Birthdate" value="<?php echo $resident[7] ?>" class="form-control" type="text" onfocus="(this.type='date')" onblur="getAge();" id="res_bdate" name="res_bdate">
            <!-- onblur="(this.type='text')" -->
        </div>
<!-- 
        <div class="form-group col-md-4">
            <label for="res_age">Age</label>
            <input type="number" readonly maxlength="3" class="form-control" id="res_age" placeholder="Age">
        </div> -->

        <div class="form-group col-md-4">
            <label for="res_civilstatus">Civil status <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_civilstatus" name="res_civilstatus">
                <option value="" disabled selected>Civil status</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_marital_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option value="<?php echo $row["marital_ID"];?>" <?php echo ($row['marital_ID'] == $resident[8] ? 'selected' : '') ?>>
                        <?php echo $row["marital_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_contactnum">Contact <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident[28] ?>" maxlength="11" class="form-control" id="res_contactnum" name="res_contactnum" onkeyup="numbersOnly(this)" placeholder="Contact number">
        </div>

        <div class="form-group col-md-4">
            <label for="res_contacttype">Contact type <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_contacttype" name="res_contacttype">
                <option value="" disabled selected>Contact type</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_contact");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option value="<?php echo $row['contactType_ID'] ?>" <?php echo ($row['contactType_ID'] == $resident['contactType_ID'] ? 'selected' : '') ?>>
                        <?php echo $row["contactType_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Height <strong style="color: red;">*</strong></label>
            <input type="number" value="<?php echo $resident[16] ?>" class="form-control" id="res_height" name="res_height" placeholder="Meter/Centimeter">
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Weight <strong style="color: red;">*</strong></label>
            <input type="number" value="<?php echo $resident[17] ?>" class="form-control" id="res_weight" name="res_weight" placeholder="Kilogram">
        </div>

        <div class="form-group col-md-4">
            <label for="res_citizenship">Citizenship <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_citizenship" name="res_citizenship">
                <option value="" disabled selected>Citizenship</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_country where country_ID=169");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option value="<?php echo $row['country_citizenship'] ?>" <?php echo ($row['country_citizenship'] == $resident['country_citizenship'] ? 'selected' : '') ?>>
                        <?php echo $row["country_citizenship"];?>
                    </option>

                    <?php
        }

        ?>

            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_religion">Religion <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_religion" name="res_religion">
                <option value="" disabled selected>Religion</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_religion");
        while ($row=mysqli_fetch_array($res))
        {
            ?>
                <option value="<?php echo $row['religion_ID'] ?>" <?php echo ($row['religion_ID'] == $resident['religion_ID'] ? 'selected' : '') ?>>
                    <?php echo $row["religion_Name"];?>
                </option>
            <?php
        }

        ?>

            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_occupationstatus">Occupation status <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_occupationstatus" name="res_occupationstatus">
                <option value="" disabled selected>Occupational status</option>
                <option value="NULL">N/A</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_occupation_status");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option value="<?php echo $row['occuStat_Name'] ?>" <?php echo ($row['occuStat_Name'] == $resident['occuStat_Name'] ? 'selected' : '') ?>>
                        <?php echo $row["occuStat_Name"];?>
                    </option>

                    <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="mname">Occupation <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_occupation" name="res_occupation">
                <option value="" disabled selected>Occupational </option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_occupation");
        while ($row=mysqli_fetch_array($res))
        {
            ?>
                <option value="<?php echo $row['occupation_Name'] ?>" <?php echo ($row['occupation_Name'] == $resident['occupation_Name'] ? 'selected' : '') ?>>
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
            <label for="res_unit">Unit-Room-Floor <strong style="color: red;">*</strong></label>
            <input type="text" maxlength="20" value="<?php echo $resident['address_Unit_Room_Floor_num'] ?>" class="form-control" id="res_unit" name="res_unit" placeholder="Unit-Room-Floor">
        </div>

        <div class="form-group col-md-4">
            <label for="res_building">Building name <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident['address_BuildingName'] ?>" maxlength="15" class="form-control" id="res_building" name="res_building" placeholder="Building name">
        </div>

        <div class="form-group col-md-4">
            <label for="res_lot">Lot <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident['address_Lot_No'] ?>" maxlength="15" class="form-control" id="res_lot" name="res_lot" placeholder="Lot">
        </div>

        <div class="form-group col-md-4">
            <label for="res_block">Block <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident['address_Block_No'] ?>" maxlength="15" class="form-control" id="res_block" name="res_block" placeholder="Block">
        </div>

        <div class="form-group col-md-4">
            <label for="res_phase">Phase <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident['address_Phase_No'] ?>" maxlength="15" class="form-control" id="res_phase" name="res_phase" placeholder="Phase">
        </div>

        <div class="form-group col-md-4">
            <label for="res_houseno">House number <strong style="color: red;">*</strong></label>
            <input type="text" maxlength="15" value="<?php echo $resident['address_House_No'] ?>" class="form-control" id="res_houseno" name="res_houseno" placeholder="House number">
        </div>

        <div class="form-group col-md-4">
            <label for="res_street">Street <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident['address_Street_Name'] ?>" maxlength="15" class="form-control" id="res_street" name="res_street" placeholder="Street">
        </div>

        <div class="form-group col-md-4">
            <label for="res_subdmname">Subdivision <strong style="color: red;">*</strong></label>
            <input type="text" value="<?php echo $resident['address_Subdivision'] ?>" maxlength="20" class="form-control" id="res_subd" name="res_subd" placeholder="Subdivision">
        </div>

        <div class="form-group col-md-4">
            <label for="res_purokno"> Purok no. <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_purokno" name="res_purokno">
                <option value="" disabled selected>Purok no.</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_purok");
        while ($row=mysqli_fetch_array($res))
        {
            ?>
                <option value="<?php echo $row['purok_ID'] ?>" <?php echo ($row['purok_ID'] == $resident['purok_ID'] ? 'selected' : '') ?>>
                    <?php echo $row["purok_Name"];?>
                </option>
            <?php
        }

        ?>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label for="res_address">Address type <strong style="color: red;">*</strong></label>
            <select required class="form-control" id="res_address" name="res_address">
                <option value="" disabled selected>Address type</option>
                <?php
          $res=mysqli_query($conn,"SELECT * FROM ref_address");
        while ($row=mysqli_fetch_array($res))
        {
          ?>
                    <option value="<?php echo $row['addressType_ID'] ?>" <?php echo ($row['addressType_ID'] == $resident['addressType_ID'] ? 'selected' : '') ?>>
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
                    <!-- <a href="profile.php">
                        <input type="submit" name="Update" id="" value="Update-resident" class="btn btn-info" /> 
                    </a> -->
                    <input type="submit" name="Update" id="" value="Update-resident" class="btn btn-info" />
                </center>
            </p>

        </div>

    </div>
</form>
<?php
}
?>