<?php

error_reporting(0);

ob_start();

session_start();

ini_set('memory_limit', '1500000000M');

ini_set('max_execution_time',3000000000);

date_default_timezone_set("UTC");



include_once("lib_panel/config.php");



$employee_id=$_SESSION[employee_id];



foreach($employee_id as $k=>$v){



$sql="INSERT INTO `employee_salary` (`stdt`,`endt`,`payout_date`,`employee_id`,`salary_amt`,`user_id`,`td`,`total_amt`)VALUES ('".$_SESSION[stdt][$k]."','".$_SESSION[endt][$k]."','".$_SESSION[ptdt][$k]."','$v','".$_SESSION[salary_amt][$k]."','".$_POST[user_id]."','".$_SESSION[td][$k]."','".$_SESSION[total_amt][$k]."')";

$res=mysqli_query($con,$sql);





}



if($res){

header("location:employee_salary.php?lid=82&msg=Salary Sucessfully Generated.");

}







?>