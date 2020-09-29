<?php
include("../../connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>CHART</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../bootstrap-3.3.7/dist/css/bootstrap.min.css">
    <script src="../../bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
    <script src="../../bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    
    <link rel="shortcut icon" href="../../Img/Icon/indang logo.png">
    <link rel="stylesheet" type="text/css" href="../custom.css">

  <script type="text/javascript" src="../../dhtmlx/diagram/codebase/diagram.js"></script>
  <link rel="stylesheet" href="../../dhtmlx/diagram/codebase/diagram.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,500" rel="stylesheet">

  <link rel="stylesheet" href="../../dhtmlx/diagram/samples/common/dhx_samples.css">
  <!-- <script type="text/javascript" src="../../dhtmlx/diagram/samples/common/data.js"></script> -->

    <style type="text/css">
      /*Now the CSS*/
* {margin: 0; padding: 0;}
body {
    text-align: center;
    min-height: 1900px;
  }

    </style>
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
          <a class="navbar-brand" href="index">CHART</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="officials">Manage Officials</a></li>
          </ul>
        </div>
      </div>
    </nav>
<div class="container" style="margin-top:120px; ">

    <h1>Barangay Organization Chart</h1>
  <?php 
$sql =   mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE bod. commitee_assignID = 2 AND visibility = 1");
$cap_data = mysqli_fetch_array($sql);
$cap_data['res_Img'];
$suffix = $cap_data['suffix'];
 if ($suffix == "N/A") {
   $suffix = "";
 }
 else{
    $suffix = $cap_data['suffix'];
 }


 if (isset($cap_data[7])) {
     $img  = $cap_data[7];
     $cimg = "data:image/jpeg;base64,".base64_encode($img);
     
 } 
 else{
  
    $cimg = "../../Img/Icon/logo.png";
 
 }
 $sql =   mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE bod. commitee_assignID = 3 AND visibility = 1");
$sec_data = mysqli_fetch_array($sql);
$sec_data['res_Img'];
$suffix1 = $sec_data['suffix'];
 if ($suffix1 == "N/A") {
   $suffix1 = "";
 }
 else{
    $suffix1 = $sec_data['suffix'];
 }


 if (isset($sec_data[7])) {
     $img  = $sec_data[7];
     $secimg = "data:image/jpeg;base64,".base64_encode($img);
     
 } 
 else{
  
    $secimg = "../../Img/Icon/logo.png";
 
 }
$sql =   mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE bod. commitee_assignID = 4 AND visibility = 1 ORDER by official_ID DESC");
$tre_data = mysqli_fetch_array($sql);
$tre_data['res_Img'];
$suffix2 = $tre_data['suffix'];
 if ($suffix2 == "N/A") {
   $suffix2 = "";
 }
 else{
    $suffix2 = $tre_data['suffix'];
 }


 if (isset($tre_data[7])) {
     $img  = $tre_data[7];
     $treimg = "data:image/jpeg;base64,".base64_encode($img);
     
 } 
 else{
  
    $treimg = "../../Img/Icon/logo.png";
 
 }


$sql = mysqli_query($conn,"SELECT * FROM `brgy_official_detail` bod 
INNER JOIN resident_detail rd ON rd.res_ID = bod.res_ID
LEFT JOIN ref_suffixname rs ON rs.suffix_ID = rd.suffix_ID
LEFT JOIN ref_position rp ON rp.position_ID = bod.commitee_assignID
WHERE visibility = 1 AND  position_Name LIKE 'Barangay Official%'");       

$count_official = mysqli_num_rows($sql);

$name = array();
$position_Name = array();
$official_img = array();


while($official_data = mysqli_fetch_array($sql)){
  $suffix = $official_data['suffix'];
   if ($suffix == "N/A") {
     $suffix = "";
   }
   else{
      $suffix = $official_data['suffix'];
   }
  $name[] =  $official_data['res_fName'].' '.$official_data['res_mName'].' '.$official_data['res_lName'].' '.$suffix;
  $position_Name[] = $official_data['position_Name'];

  if (isset($official_data['res_Img'])) {
    $z  = $official_data['res_Img'];
    $official_img[] = "data:image/jpeg;base64,".base64_encode($z);
     
  } 
  else{
    $official_img[] = "../../Img/Icon/logo.png";
   
  }
    
}


?>
 <script type="text/javascript">

var bigOrganogramData = [
  {
    "id": "1",
    "width": 250,
    "text": "<?php echo $cap_data['position_Name'];?>",
    "title": "<?php echo $cap_data['res_fName'].' '.$cap_data['res_mName'].' '.$cap_data['res_lName'].' '.$suffix;?>",
    "img": "<?php echo $cimg;?>"
  },
  {
    "id": "2",
    "width": 250,
    "text": "<?php echo $sec_data['position_Name'];?>",
    "title": "<?php echo $sec_data['res_fName'].' '.$sec_data['res_mName'].' '.$sec_data['res_lName'].' '.$suffix1;?>",
    "img": "<?php echo $secimg;?>",
    "parent": 1,
    "dir": "vertical"
  },
  // {
  //  "id": "2.1",
  //  "text": "Barangay Treasurer",
  //  "title": "Charles Little",
  //  "img": "../common/img/avatar-4.png",
  //  "parent": 2
  // },
  // {
  //  "id": "2.2",
  //  "text": "QA",
  //  "title": "Douglas Riley",
  //  "img": "../common/img/avatar-9.png",
  //  "parent": 2
  // },
  // {
  //  "id": "2.3",
  //  "text": "QA",
  //  "title": "Eugene Foster",
  //  "img": "../common/img/avatar-12.png",
  //  "parent": 2
  // },
  {
    "id": "3",
    "text": "Barangay Officials",
    "title": "",
    "img": "",
    "parent": 1
  },
  
  {
    "id": "4",
    "width": 250,
    "text": "<?php echo $tre_data['position_Name'];?>",
    "title": "<?php echo $tre_data['res_fName'].' '.$tre_data['res_mName'].' '.$tre_data['res_lName'].' '.$suffix2;?>",
    "img": "<?php echo $treimg;?>",
    "parent": 1,
    "dir": "vertical"
  },
  // {
  //  "id": "4.1",
  //  "text": "Marketer",
  //  "title": "Sandra Butler",
  //  "img": "../common/img/avatar-6.png",
  //  "parent": "4"
  // },
  // {
  //  "id": "4.2",
  //  "text": "Designer",
  //  "title": "Julie Green",
  //  "img": "../common/img/avatar-16.png",
  //  "parent": "4"
  // },
  // {
  //  "id": "4.3",
  //  "text": "Sales Manager",
  //  "title": "Richard Hicks",
  //  "img": "../common/img/avatar-14.png",
  //  "parent": "4"
  // },
  // {
  //   "id": "3.1",
  //   "text": "Barangay Officials in Health Center",
  //   "width": 250,
  //   "title": "Mark Nichols",
  //   "img": "../common/img/avatar-7.png",
  //   "parent": 3
  // },
  // {
  //   "id": "3.1.1",
  //   "text": "Programmer",
  //   "title": "Sean Parker",
  //   "img": "../common/img/avatar-10.png",
  //   "parent": 3.1
  // },
  // {
  //   "id": "3.1.1.1",
  //   "text": "Junior",
  //   "title": "Laura Alvarez",
  //   "img": "../common/img/avatar-8.png",
  //   "parent": "3.1.1"
  // },
  // {
  //   "id": "3.2",
  //   "text": "Team Lead",
  //   "title": "Nicholas Cruz",
  //   "img": "../common/img/avatar-13.png",
  //   "parent": 3
  // },
  // {
  //   "id": "3.2.1",
  //   "text": "Programmer",
  //   "title": "Michael Shaw",
  //   "img": "../common/img/avatar-11.png",
  //   "parent": "3.2"
  // },
  // {
  //   "id": "3.2.1.1",
  //   "text": "Junior",
  //   "title": "John Flores",
  //   "img": "../common/img/avatar-15.png",
  //   "parent": "3.2.1"
  // },
  // {
  //   "id": "3.2.1.1.1",
  //   "text": "Junior",
  //   "title": "John Flores",
  //   "img": "../common/img/avatar-15.png",
  //   "parent": "3.2.1.1"
  // }
  <?php 
// $name = array();
// while ($official_data = mysqli_fetch_array($sql)) {
//  $suffix = $official_data['suffix'];
//  if ($suffix == "N/A") {
//    $suffix = "";
//  }
//  else{
//     $suffix = $official_data['suffix'];
//  }
//   $name[] =  $official_data['res_fName'].' '.$official_data['res_mName'].' '.$official_data['res_lName'].' '.$suffix;;
// }

function loop(array $parents, $need,$index,$name,$position_Name,$official_img)
{
    
    $children = [];
    $isLast = $need === 1;
    $lastKey = count($parents) - 1;
    
    foreach ($parents as $key => $parent) {
        $p_name = $name[$index];
        $pos_Name = $position_Name[$index];
        $img = $official_img[$index];
        $id = $parent === 3 ? $key + 1 : 1;
        $children[] = $child = "$parent.$id";
        $comma = $isLast && $key === $lastKey ? '' : ',';
        echo "{
        \"id\":\"$child\",
        \"text\": \"$pos_Name\",
        \"title\": \"$p_name\",
        \"width\": 350,
        \"img\": \"$img\",
        \"parent\":\"$parent\"
         }$comma";
    }
    $index++;
    $need--;

    if ($need) {
        return loop($children, $need,$index,$name,$position_Name,$official_img);
    }

    return $children;
}

$index = 0;
loop([3], $count_official,$index,$name,$position_Name,$official_img);
  ?>

];

</script>
  <script>
    var diagram = new dhx.Diagram(document.body, { 
      type: "org",
      defaultShapeType: "img-card",
      scale : 0.9
    });
    diagram.data.parse(bigOrganogramData);

  </script>
</div>



</body>
</html>
