<?php
ob_start();
session_start();
include_once("include/conn.php");
ini_set('max_execution_time',3000000);
$app_dt=date("Y-m-d");

if($_POST[approve_panel]!=""){

$payment_lists=$_POST[chkName];



foreach($payment_lists as $k=>$v){

$sql="SELECT * FROM `withdrawal` WHERE `status`='0' AND `with_d_id`='$v'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

$sqlm_1="SELECT * FROM `ewallet` WHERE `spid`='$row[spid]'";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);


$ewallet_res_amt=$row[amt];
$ewallet_paid_amt=$rowlm_1[paid_amt]+$ewallet_res_amt;

$sql7="UPDATE `ewallet` SET `paid_amt`='$ewallet_paid_amt' WHERE `spid`='$row[spid]'";
$res7=mysqli_query($con,$sql7);

$sql8="UPDATE `withdrawal` SET `status`='1',`status_dt`='$app_dt',`userid`='$_SESSION[employee_id]' WHERE `with_d_id`='$row[with_d_id]'";
$res8=mysqli_query($con,$sql8);

unset($ewallet_res_amt);unset($ewallet_paid_amt);

}

}



header("location:pending_withdrawal.php?msg=Sucessfully Approved.");

?>