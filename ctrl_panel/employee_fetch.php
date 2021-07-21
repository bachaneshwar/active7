<?php

include_once("lib_panel/config.php");

if($_GET[employee_code]!=""){



$sql="SELECT * FROM `employee` WHERE `employee_code`='$_REQUEST[employee_code]'";

$res=mysqli_query($con,$sql);

$row=mysqli_fetch_array($res);

$employee_name=$row[employee_name];

print $employee_name;

}



?>