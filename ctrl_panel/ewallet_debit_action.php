<?php
ob_start();
session_start();
include_once("include/conn.php");
$date=date("Y-m-d");
$sql1="SELECT * FROM `ewallet` WHERE `spid`='$_POST[spid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);
$user1=$row1[rest_amt];
$rest_amt=$_POST[rest_amt];

if($rest_amt<=$user1){
$ewallet_res_amt=$user1-$rest_amt;

$sql7="UPDATE `ewallet` SET `rest_amt`='$ewallet_res_amt' WHERE `spid`='$_POST[spid]'";
$res7=mysqli_query($con,$sql7);

$sql8="INSERT INTO `transfer_details`(`spid`,`transfer_id`,`amount`,`payment_dt`,`transfer_mode`)VALUES('$_POST[spid]','admin','$rest_amt','$date','Debit')";
$res8=mysqli_query($con,$sql8);

if($res7){
header("location:ewallet_debit.php?msg=Amount Sucessfully Debit.");
}
}
else{
header("location:ewallet_debit.php?msg=Please Type Correct Amount.");
}

?>