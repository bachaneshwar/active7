<?php

session_start();

ob_start();

include_once("lib_panel/config.php");

$nurl = "add_employee.php";



$_SESSION[p] = $_POST;
print_r($_SESSION[p]);



if($_POST[call_submit]!=""){

print $code="E".$_POST[employee_mobile];

print $mobile_num1=$my->total_num($con,employee,employee_mobile,$_POST[employee_mobile]);

if($mobile_num1==0){



$mem_photo=$_FILES[employee_picture];

$pho_name=$mem_photo[name];

$folder1="emp_picture/".$pho_name;



$bio_photo=$_FILES[employee_biometric];

$bio_name=$bio_photo[name];

$folder2="emp_bio/".$bio_name;



//move_uploaded_file($mem_photo[tmp_name],$folder1);
//move_uploaded_file($bio_photo[tmp_name],$folder2);



print $prev_dtls=$my->total_row($con,employee,employee_mobile,$_POST[employee_mobile]);


$pass=md5($_POST[employee_pwd]);


$nurl=$nurl."?lid=$_REQUEST[lid]&msg=Successfully Inserted";

$my->insertval4($con,employee,employee_code,$code,employee_picture,$pho_name,employee_biometric,$bio_name,employee_pwd,$pass,$nurl);

header("location:$nurl");





}else{

$nurl=$nurl."?lid=$_REQUEST[lid]&msg=This mobile number is not available";

header("location:$nurl");

}





}else{

$nurl=$nurl."?lid=$_REQUEST[lid]&msg=Form not submitted.";

header("location:$nurl");

}

?>

