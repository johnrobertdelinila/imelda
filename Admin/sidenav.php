<?php 
include('session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <link rel="shortcut icon" href="../Img/Icon/indang logo.png">
         <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="../bootstrap-3.3.7/dist/css/bootstrap.min.css">
        <!-- Our Custom CSS -->
        <!-- <link rel="stylesheet" href="style.css">
 -->    
 <style type="text/css">
 
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  src: local('Poppins Light'), local('Poppins-Light'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLDz8Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  src: local('Poppins Light'), local('Poppins-Light'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLDz8Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 300;
  src: local('Poppins Light'), local('Poppins-Light'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLDz8Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  src: local('Poppins Regular'), local('Poppins-Regular'), url(https://fonts.gstatic.com/s/poppins/v5/pxiEyp8kv8JHgFVrJJbecmNE.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  src: local('Poppins Regular'), local('Poppins-Regular'), url(https://fonts.gstatic.com/s/poppins/v5/pxiEyp8kv8JHgFVrJJnecmNE.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 400;
  src: local('Poppins Regular'), local('Poppins-Regular'), url(https://fonts.gstatic.com/s/poppins/v5/pxiEyp8kv8JHgFVrJJfecg.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  src: local('Poppins Medium'), local('Poppins-Medium'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLGT9Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  src: local('Poppins Medium'), local('Poppins-Medium'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLGT9Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 500;
  src: local('Poppins Medium'), local('Poppins-Medium'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLGT9Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 600;
  src: local('Poppins SemiBold'), local('Poppins-SemiBold'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLEj6Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 600;
  src: local('Poppins SemiBold'), local('Poppins-SemiBold'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLEj6Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 600;
  src: local('Poppins SemiBold'), local('Poppins-SemiBold'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLEj6Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
/* devanagari */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  src: local('Poppins Bold'), local('Poppins-Bold'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLCz7Z11lFc-K.woff2) format('woff2');
  unicode-range: U+0900-097F, U+1CD0-1CF6, U+1CF8-1CF9, U+200C-200D, U+20A8, U+20B9, U+25CC, U+A830-A839, U+A8E0-A8FB;
}
/* latin-ext */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  src: local('Poppins Bold'), local('Poppins-Bold'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLCz7Z1JlFc-K.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Poppins';
  font-style: normal;
  font-weight: 700;
  src: local('Poppins Bold'), local('Poppins-Bold'), url(https://fonts.gstatic.com/s/poppins/v5/pxiByp8kv8JHgFVrLCz7Z1xlFQ.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

 body {
    font-family: 'Poppins', sans-serif;
    background: #2e4a62;

}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

.navbar {
    padding: 15px 10px;
    background: #fff;
    border: none;
    border-radius: 0;
    margin-bottom: 40px;
    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
}

.navbar-btn {
    box-shadow: none;
    outline: none !important;
    border: none;
}

.line {
    width: 100%;
    height: 1px;
    border-bottom: 1px dashed #ddd;
    margin: 40px 0;
}
     #sidebar {
    min-width: 100%;
    max-width: 100%;
    background: #2e4a62;
    color: #fff;
    transition: all 0.3s;
}

#sidebar.active {
    margin-left: -250px;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: #E94B3C;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #E94B3C;
}


a[data-toggle="collapse"] {
    position: relative;
}

a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
    content: '\e259';
    display: block;
    position: absolute;
    right: 20px;
    font-family: 'Glyphicons Halflings';
    font-size: 0.6em;
}
a[aria-expanded="true"]::before {
    content: '\e260';
}


ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #E94B3C;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}

a.download {
    background: #fff;
    color: #7386D5;
}

a.article, a.article:hover {
    background: #E94B3C !important;
    color: #fff !important;
}


 </style>
</head>
    <body>


<?php 
require_once('../connection.php');

// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
$official_ID = $_SESSION['official_ID'];
$user_sql = mysqli_query($conn,"SELECT rp.position_Name,rd.*,rs.suffix,bod.commitee_assignID FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
WHERE 
bod.official_ID = '$official_ID'");
$user_data = mysqli_fetch_array($user_sql);
?>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header text-center">
                    <h6>WELCOME</h6>
                    <?php 
                    // echo "<pre>";
                    // echo var_dump($_SESSION);
                    // echo "</pre>";
                    if (isset($user_data['res_Img'])) {
                        $img  = $user_data['res_Img'];
                        ?>
                        <img src="data:image/jpeg;base64,<?php echo base64_encode($img) ?>" width="100" height="100" class="img-circle"/>
                        <?php
                    } 
                    else{
                      ?>
                      <img src="../Img/Icon/imgdefault.png" width="100" height="100" class="img-circle" >
                      <?php
                    }
                    ?>
                    <h3>
                    <?php 
                     $suffix = $user_data['suffix'];
                      if ($suffix == "N/A") {
                        $suffix = "";
                      }
                      else{
                         $suffix = $user_data['suffix'];
                      }
                    echo $_SESSION['Full_Name'] = $user_data['res_fName']." ".$user_data['res_mName']." ".$user_data['res_lName']." ".$suffix ?></h3>
                    <h6><?php  echo $user_data['position_Name']?></h6>
                </div>

                <ul class="list-unstyled components">
                    <p></p>
                    <li class="active">
                        <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Account</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li><a href="Account/settings" target = "FraDisplay">Setting</a></li>
                            <li><a href="../logout" target="_top">Logout</a></li>
                        </ul>
                    </li>
                    <li>
                        <a  href="Resident_Profiling/index" target = "FraDisplay">Dashboard</a>
                    </li>
                    <li>
                        <a  href="Account/index" target = "FraDisplay">Account</a>
                    </li>
                    <li>
                        <a  href="Clearance_and_Forms/index" target = "FraDisplay">Clearance and Forms</a>
                    </li>
                    <li>
                        <a  href="Health_and_Sanitation/index" target = "FraDisplay">Health and Sanitation</a>
                    </li>
                    <li>
                        <a  href="Peace_and_Order/incident" target = "FraDisplay">Peace and Order</a>
                    </li>
                    <li>
                        <a  href="Finance/index" target = "FraDisplay">Finance</a>
                    </li>
                    <li>
                        <a  href="Resident_Profiling/resident" target = "FraDisplay">Resident Porfiling</a>
                    </li>
                    <li>
                        <a href="communication/index" target = "FraDisplay">Announcement</a>
                    </li>
                    <li>
                        <a  href="Special_Projects/index" target = "FraDisplay">Special Project</a>
                    </li>
                    <li>
                        <a  href="Barangay_Officials/index" target = "FraDisplay">Barangay Official</a>
                    </li>
                    <li>
                        <a  href="Report/viewreport" target = "FraDisplay">Report</a>
                    </li>
                    <?php 
                    if ($user_data['commitee_assignID'] == 3) {
                      ?>
                    <li>
                        <a  href="Setup/index" target = "FraDisplay">Setup</a>
                    </li>
                      <?php 
                    }
                    else{
                    }
                    ?>
                </ul>
            </nav>
            <!-- Page Content Holder -->
            








        <!-- jQuery CDN -->
         <script src="../bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
         <!-- Bootstrap Js CDN -->
         <script src="../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>

         <script type="text/javascript">
             $(document).ready(function () {
                 $('#sidebarCollapse').on('click', function () {
                     $('#sidebar').toggleClass('active');
                 });
             });
         </script>
    </body>
</html>
