<?php 
include("../../connection.php");
if (isset($_REQUEST['id']) ){
	$id= $_REQUEST['id'];
	$sql = mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID 
LEFT JOIN ref_gender rg ON rd.gender_ID = rg.gender_ID
LEFT JOIN ref_marital_status rms ON rms.marital_ID = rd.marital_ID
LEFT JOIN ref_religion rr ON rr.religion_ID = rd.religion_ID 
LEFT JOIN ref_occupation ro ON ro.occupation_ID = rd.occupation_ID 
LEFT JOIN ref_occupation_status ros ON ros.occuStat_ID = rd.occuStat_ID
LEFT JOIN ref_country rc ON rc.country_ID = rd.country_ID

WHERE official_ID = $id
 ORDER by official_ID DESC");
$official = mysqli_fetch_array($sql)
?>
<form method="POST" runat="server" enctype="multipart/form-data" >

    <div class="modal-body">
    	<h6 style="text-align: center; font-style: normal;font-size: 18px;font-family: Verdana"><?php echo $official['position_Name']?></h6>
        <br>
        <div class="col-lg-offset-4" id="image-holder">
        </div>
        <div class="clearfix"></div>
        <div class="form-group col-lg-offset-4 col-md-4">
            <div class="file-upload">
                <div class="file-select">
                    <?php 
                    if (isset($official['res_Img'])) {
                        $img  = $official['res_Img'];
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
            $suffix = $official['suffix'];
            if ($suffix == "N/A") {
              $suffix = "";
            }
            else{
               $suffix = $official['suffix'];
            }
           ?>
        <div required class="form-group col-md-4">
            <label for="res_fname">Fullname</label>
            <input type="text" class="form-control" value="<?php echo $official['res_fName']." ".$official['res_mName'].". ".$official['res_lName']." ".$suffix ?>"  readonly="" >
        </div>
        <div class="form-group col-md-4">
            <label for="res_gender">Gender</label>
            <input type="text" class="form-control" value="<?php echo $official['gender_Name']?>"  readonly="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_bdate">Birthdate</label>
            <input type="text" class="form-control" value="<?php echo $official['res_Bday']?>"  readonly="">
          
        </div>

        <div class="form-group col-md-4">
            <label for="res_civilstatus">Civil status</label>
            <input type="text" class="form-control" value="<?php echo $official['marital_Name']?>"  readonly="">
        </div>



        <div class="form-group col-md-4">
            <label for="res_mname">Height</label>
            <input type="text" class="form-control" value="<?php echo $official['res_Height']?>"  readonly="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_mname">Weight</label>
            <input type="text" class="form-control" value="<?php echo $official['res_Weight']?>"  readonly="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_citizenship">Citizenship</label>
            <input type="text" class="form-control" value="<?php echo $official['country_citizenship']?>"  readonly="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_religion">Religion</label>            <input type="text" class="form-control" value="<?php echo $official['religion_Name']?>"  readonly="">
        </div>

        <div class="form-group col-md-4">
            <label for="res_occupationstatus">Occupation status</label>
            <input type="text" class="form-control" value="<?php echo $official['occuStat_Name']?>"  readonly="">
        </div>

        <div class="form-group col-md-4">
            <label for="mname">Occupation</label>
             <input type="text" class="form-control" value="<?php echo $official['occupation_Name']?>"  readonly="">
        </div>

        <div class="clearfix"></div>
        <br>
        <br>

       
    </div>
    </form>
<?php
}
?>