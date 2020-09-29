<?php 

if (isset($_POST['Update-resident'])) {
 $new_fname = $_POST["new_fname"];
	$new_mname = $_POST["new_mname"];
	$new_lname = $_POST["new_lname"];
	$new_suffix = $res_suffix;
	$new_gender = $res_gender;
	$new_bday = $_POST["new_bday"];
	$new_marital = $res_marital;
	$new_country = $res_countryID;
	$new_height = $_POST["new_height"];
	$new_weight = $_POST["new_weight"];
	$new_religion =$res_religion;
	$new_occupation = $res_occu;
	$new_occuStat =$res_occuStat;
	$new_addressUnit = $_POST["new_addressUnit"];
	$new_addressBuilding = $_POST["new_addressBuilding"];
	$new_addressLot = $_POST["res_addressLot"];
	$new_addressBlock = $_POST["new_addressBlock"];
	$new_addressPhase = $_POST["new_addressPhase"];
	$new_addressHouse = $_POST["new_addressHouse"];
	$new_addressStreet = $_POST["new_addressStreet"];
	$new_addressSubdi = $_POST["new_addressSubdi"];

	$new_purok = $res_purokname;
	$new_addresstype = $res_addressname;
	$new_contacttel = $_POST["res_contactnum"];
	$new_contacttype = $res_ctype;
	echo "<script>alert('Successfully Update Record!');
                                    window.location='resident';
                                </script>";  
}
?>