<?php
  include_once '../connection.php';
  $sql_Problema = "SELECT brgy_Name, citymun_Name, province_Name
                  FROM brgy_address_info";
  $result_Problema = mysqli_query($conn, $sql_Problema);
  $resultCheck_Problema = mysqli_num_rows($result_Problema);

    if($resultCheck_Problema >0){
      while($row = mysqli_fetch_assoc($result_Problema)){
        $head_brgy_Name = $row['brgy_Name'];
        $citymun_disp = $row['citymun_Name'];
        $province_disp =$row ['province_Name'];
      }

    }

?>
<?php
  $ctcNo = $_POST['ctcNo'];
  $orNo = $_POST['orNo'];
  $res_ID = $_POST['busid'];
  $houseNo = $_POST['houseNo'];
  $lot = $_POST['lot'];
  $street = $_POST['street'];
  $phase = $_POST['phase'];
  $sqlget_info = "SELECT * FROM resident_detail
                	LEFT JOIN resident_address ON resident_detail.res_ID = resident_address.res_ID
                    LEFT JOIN ref_marital_status ON resident_detail.marital_ID = ref_marital_status.marital_ID
                    LEFT JOIN ref_country ON resident_detail.country_ID = ref_country.country_ID
                    LEFT JOIN ref_gender ON resident_detail.gender_ID = ref_gender.gender_ID
                    LEFT JOIN ref_religion ON resident_detail.religion_ID = ref_religion.religion_ID
                    LEFT JOIN ref_brgy ON resident_address.brgy_ID = ref_brgy.brgy_ID
                    LEFT JOIN ref_citymun ON resident_address.citymun_ID = ref_citymun.citymun_ID
                    LEFT JOIN ref_province ON resident_address.province_ID = ref_province.province_ID
                    WHERE resident_detail.res_ID = '$res_ID'";

                  $result_info = mysqli_query($conn, $sqlget_info);
                  $resultCheck_info = mysqli_num_rows($result_info);

                  if($resultCheck_info > 0){
                    while($row = mysqli_fetch_assoc($result_info)){
                      $hN= $row['address_Unit_Room_Floor_num'];
                      $first= $row['res_fName'];
                      $middleName = $row['res_mName'];
                      $lastName = $row['res_lName'];
                      $civilStatus = $row['marital_Name'];
                      $brgy = $row['brgy_Name'];
                      $city = $row['citymun_Name'];
                      $province =$row ['province_Name'];
                    }
                  }

?>
<!--logo-->
<?php
include_once '../connection.php';

$logoBarangay="Barangay Logo";
$sqllogo = "SELECT * FROM ref_logo WHERE logo_Name='$logoBarangay';";
$sth = mysqli_query($conn, $sqllogo);
$resultlogo=mysqli_fetch_array($sth);
?>
<?php
$logoMunicipal="Municipal Logo";
$sqllogo1 = "SELECT * FROM ref_logo WHERE logo_Name='$logoMunicipal';";
$sth1 = mysqli_query($conn, $sqllogo1);
$resultlogo1=mysqli_fetch_array($sth1);
?>
<!--end of logo-->

<!--headers and officials-->
<?php
  $capitan = "2";
  $sql1 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$capitan';";

  $result1 = mysqli_query($conn, $sql1);
  $resultCheck1 = mysqli_num_rows($result1);

  if($resultCheck1 > 0){
    while($row1 = mysqli_fetch_assoc($result1)){
      $capfName = $row1['res_fName'];
      $capmInitial = $row1['res_mName'];
      $caplName = $row1['res_lName'];
    }
  }
?>
<?php
  $pNc = "9";
  include_once '../connection.php';
  $sql2 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$pNc'";

  $result2 = mysqli_query($conn, $sql2);
  $resultCheck2 = mysqli_num_rows($result2);

  if($resultCheck2 > 0){
    while($row2 = mysqli_fetch_assoc($result2)){
      $pNcfName = $row2['res_fName'];
      $pNcmInitial = $row2['res_mName'];
      $pNclName = $row2['res_lName'];
    }
  }
?>
<?php
  $wfy = "12";
  include_once '../connection.php';
  $sql3 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$wfy';";

  $result3 = mysqli_query($conn, $sql3);
  $resultCheck3 = mysqli_num_rows($result3);

  if($resultCheck3 > 0){
    while($row3 = mysqli_fetch_assoc($result3)){
      $wfyfName = $row3['res_fName'];
      $wfymInitial = $row3['res_mName'];
      $wfylName = $row3['res_lName'];
    }
  }
?>
<?php
  $hea = "13";
  include_once '../connection.php';
  $sql4 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$hea';";

  $result4 = mysqli_query($conn, $sql4);
  $resultCheck4 = mysqli_num_rows($result4);

  if($resultCheck4 > 0){
    while($row4 = mysqli_fetch_assoc($result4)){
      $heafName = $row4['res_fName'];
      $heamInitial = $row4['res_mName'];
      $healName = $row4['res_lName'];
    }
  }
?>
<?php
  $wam = "10";
  include_once '../connection.php';
  $sql5 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$wam';";

  $result5 = mysqli_query($conn, $sql5);
  $resultCheck5 = mysqli_num_rows($result5);

  if($resultCheck5 > 0){
    while($row5 = mysqli_fetch_assoc($result5)){
      $wamfName = $row5['res_fName'];
      $wamInitial = $row5['res_mName'];
      $wamlName = $row5['res_lName'];
    }
  }
?>
<?php

  $agri = "11";
  include_once '../connection.php';
  $sql6 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$agri';";

  $result6 = mysqli_query($conn, $sql6);
  $resultCheck6 = mysqli_num_rows($result6);

  if($resultCheck6 > 0){
    while($row6 = mysqli_fetch_assoc($result6)){
      $agrifName = $row6['res_fName'];
      $agrimInitial = $row6['res_mName'];
      $agrilName = $row6['res_lName'];
    }
  }
?>

<?php
  $apro = "14";
  include_once '../connection.php';
  $sql7 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$apro';";

  $result7 = mysqli_query($conn, $sql7);
  $resultCheck7 = mysqli_num_rows($result7);

  if($resultCheck7 > 0){
    while($row7 = mysqli_fetch_assoc($result7)){
      $aprofName = $row7['res_fName'];
      $apromInitial = $row7['res_mName'];
      $aprolName = $row7['res_lName'];
    }
  }
?>
<?php
  $infra = "15";
  include_once '../connection.php';
  $sql8 = "SELECT rd.res_fName,rd.res_mName,rd.res_lName,rs.suffix,rp.position_Name,
  (IF(bod.commitee_assignID IS NOT NULL , (SELECT position_Name
    FROM ref_position WHERE position_ID = bod.commitee_assignID), '')) as Kagawad_committee
    FROM brgy_official_detail bod INNER JOIN resident_detail rd ON bod.res_ID = rd.res_ID
    LEFT JOIN ref_suffixname rs ON rd.suffix_ID = rs.suffix_ID
    INNER JOIN ref_position rp ON rd.position_ID = rp.position_ID WHERE bod.commitee_assignID='$infra';";

  $result8 = mysqli_query($conn, $sql8);
  $resultCheck8 = mysqli_num_rows($result8);

  if($resultCheck8 > 0){
    while($row8 = mysqli_fetch_assoc($result8)){
      $infrafName = $row8['res_fName'];
      $inframInitial = $row8['res_mName'];
      $infralName = $row8['res_lName'];
    }
  }
?>
<?php
  $sec = "3";
  include_once '../connection.php';
  $sql9 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$sec';";

  $result9 = mysqli_query($conn, $sql9);
  $resultCheck9 = mysqli_num_rows($result9);

  if($resultCheck9 > 0){
    while($row9 = mysqli_fetch_assoc($result9)){
      $secfName = $row9['res_fName'];
      $secmInitial = $row9['res_mName'];
      $seclName = $row9['res_lName'];
    }
  }
?>
<?php
  $tres = "4";
  $sql10 = "SELECT res_lName, res_fName, res_mName FROM resident_detail
          WHERE position_ID='$tres'";

  $result10 = mysqli_query($conn, $sql10);
  $resultCheck10 = mysqli_num_rows($result10);

  if($resultCheck10 > 0){
    while($row10 = mysqli_fetch_assoc($result10)){
      $tresfName = $row10['res_fName'];
      $tresmInitial = $row10['res_mName'];
      $treslName = $row10['res_lName'];
    }
  }
?>


<!--end of header and display officials-->
<?php
$sqlgetNow = "SELECT res_ID FROM resident_detail WHERE res_fName LIKE '%$first%' AND res_lName LIKE '%$lastName%' AND res_mName LIKE '%$middleName%';";
$resultgetNow = mysqli_query($conn, $sqlgetNow);
$resultcheckNow = mysqli_num_rows($resultgetNow);

if($resultcheckNow > 0){
  while($row99 = mysqli_fetch_assoc($resultgetNow)){
    $res_IDnow = $row99['res_ID'];
  }
}
?>
<?php
$ap = date_default_timezone_set('Asia/Manila');
date_default_timezone_get();
$datedate = date('Y-m-d H:i:s');


$sqlsli = "INSERT INTO form_release (res_ID, form_ID, purpose_ID, release_date)
         VALUES ('$res_IDnow', 1, 1,'$datedate');";
         mysqli_query($conn, $sqlsli);
?>

<!DOCTYPE>
<html>
  <header>
    <title>Building Permit</title>
    <meta http-equiv="Content-Type" content ="text/html"; charset="utf-8" />
    <script type="text/javascript" src="../js/jspdf.min.js"></script>
    <script type="text/javascript" src="../js/html2canvas.js"></script>
    <script type="text/javascript">
      function genPDF() {
        html2canvas(document.getElementById('main-container')).then(function(canvas) {
                        scale: 1;

                        var img = canvas.toDataURL('image/png', 1.0);
                        if(canvas.width > canvas.height){
                          doc = new jsPDF('l', 'mm', [canvas.width, canvas.height]);
                          }
                          else{
                          doc = new jsPDF('p', 'mm', [canvas.height, canvas.width]);
                          }

                        doc.addImage(img, 'JPEG',-4, 20, canvas.width, canvas.height);
                        doc.save('BarangayClearance.pdf');
                    });﻿
      }
    </script>
    <link rel="stylesheet" type="text/css" href="../stylesheet.css">
  </header>
  <body>
    <div id="main-container">

        <div class="logo-holder">
          <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo['logo_img'] ).'"/>';
          ?>
        </div>
        <div class="logo-holder1">
          <?php
            echo '<img src="data:image/jpeg;base64,'.base64_encode( $resultlogo1['logo_img'] ).'"/>';
          ?>
        </div>
      <div class="header">
        Republic of the Philippines<br/>
        PROVINCE OF <?php echo $province_disp;?><br/>
        MUNICIPALITY OF <?php echo $citymun_disp;?><br/>
        <span id="name-input">Barangay <?php echo $head_brgy_Name;?></span><br>
      </div>
      <div class="header tag">
        OFFICE OF THE BARANGAY HEAD
      </div>
      <div class="header tag1">
        BARANGAY CLEARANCE ON BUILDING PERMIT
      </div>
        <div class="c-wrapper">
          <div class="officials center">

            <div class="names">
                <br>
                <span id="name-input"><?php echo $capfName." ".$capmInitial."."." ".$caplName;?></span><br>
            </div>
            <div class="posi">
                Punong Barangay
            </div>
            <br>
            <div class="names">
                <span id="name-input"><?php echo $pNcfName." ".$pNcmInitial."."." ".$pNclName;?></span><br>
            </div>
            <div class="posi">
                Peace and Order<br>
            </div>
            <br>
            <div class="names">
                <span id="name-input"><?php echo $wfyfName." ".$wfymInitial."."." ".$wfylName;?></span><br>
            </div>
            <div class="posi">
                Women, Family, & Youth Sports Development<br>
            </div>
            <br>
            <div class="names">
                <span id="name-input"><?php echo $heafName." ".$heamInitial."."." ".$healName;?></span><br>
            </div>
            <div class="posi">
                Health and Education<br>
            </div>
            <br>
           <!--  <div class="names">
                <span id="name-input"><?php echo $wamfName." ".$wamInitial."."." ".$wamlName;?></span><br>
            </div>
            <div class="posi">
                Ways and Means<br>
            </div>
            <br> -->
            <div class="names">
                <span id="name-input"><?php echo $agrifName." ".$agrimInitial."."." ".$agrilName;?></span><br>
            </div>
            <div class="posi">
                Agricultural and Environmental Protection<br>
            </div>
            <br>
            <div class="names">
                <span id="name-input"><?php echo $aprofName." ".$apromInitial."."." ".$aprolName;?></span><br>
            </div>
            <div class="posi">
                Appropriation<br>
            </div>
            <br>
            <div class="names">
                <span id="name-input"><?php echo $infrafName." ".$inframInitial."."." ".$infralName;?></span><br>
            </div>
            <div class="posi">
                Infrastructure<br>
            </div>
            <br>
            <span id="name-input"><?php echo $secfName." ".$secmInitial."."." ".$seclName;?></span><br>
            <div class="posi">
                Secretary<br>
            </div>
            <br>
            <div class="names">
                <span id="name-input"><?php echo $tresfName." ".$tresmInitial."."." ".$treslName;?></span><br>
            </div>
            <div class="posi">
                Treasurer
            </div>

          </div>
          <div class="content">
            <div id="par">
              <br><br>To whom it may concern:<br><br>
              &emsp;&emsp;&emsp;This is to certify that the application of Barangay Clearance for the construction of residential
              building / commercial and / or industrial establishment of Mr. / Mrs. / Ms. <span id="name-input"><?php echo $first." ".$middleName." ".$lastName; ?></span>
              with postal address at <span id="name-input"><?php echo $houseNo." ".$street." "."lot"." ".$lot." "."Phase"." ".$phase?></span>, <span id="name-input"><?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span> is hereby granted subject to the rules and regulation
              as provided for under the existing Zoning Ordinance of the Barangay, the National Bulding Code and other related agencies.
              <br><br>

              &emsp;&emsp;&emsp;Issued this <span id="name-input"><?php echo $datedate?> at <span id="name-input"><?php echo $head_brgy_Name;?></span>, Indang Cavite.
            </div>
              <div class="signature signline center margint120">APPLICANT'S SIGNATURE</div>
              <div class="ccon">
                <div class="puno">
                  <span id="name-input"><?php echo $capfName." ".$capmInitial."."." ".$caplName;?></span><br>
                  &emsp;PUNONG BARANGAY
                </div>
              </div>
          </div>
        </div>
        <div class="ctc margint70">
          CTC NO. <span id="name-input"> <?php echo $orNo;?> </span><br>
          ISSUED ON: <span id="name-input"><?php echo $datedate;?></span><br>
          ISSUED AT: <span id="name-input"> <?php echo $head_brgy_Name." ".$citymun_disp.","." ".$province_disp;?></span><br>
          O.R. NO. <span id="name-input"><?php echo $orNo;?></span><br>
        </div>
        <div class="seal">
          <i>NOTE: not valid without a seal</i>
        </div>
        <h3><a href="javascript:genPDF();" data-html2canvas-ignore="true">Download PDF</a><h3>
    </div>
  </body>
</html>
