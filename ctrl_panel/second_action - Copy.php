<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '1500000000M');
ini_set('max_execution_time',3000000000);
date_default_timezone_set("UTC");

include_once("lib_panel/config.php");

$spid=$_SESSION[spid];

foreach($spid as $k=>$v){

$sql="INSERT INTO `payout` (`stdt`,`endt`,`payout_date`,`spid`,`binary_income`,`sponsor_income`,`self_income`,`td`,`sc_amount`,`total_amt`)
VALUES ('".$_SESSION[stdt][$k]."','".$_SESSION[endt][$k]."','".$_SESSION[ptdt][$k]."','$v','".$_SESSION[pair_amt][$k]."','".$_SESSION[sponsor_amt][$k]."','".$_SESSION[self_income][$k]."','".$_SESSION[td][$k]."','".$_SESSION[sc][$k]."','".$_SESSION[total_amt][$k]."')";
$res=mysqli_query($con,$sql);

$sql2="UPDATE `memberpair` SET `left_side`='".$_SESSION[f_l][$k]."',`right_side`='".$_SESSION[f_r][$k]."',`pair`='".$_SESSION[total_pair][$k]."' WHERE `spid`='$v'";
$res2=mysqli_query($con,$sql2);

$ttamt=$_SESSION[total_amt][$k];
$repamt=$_SESSION[rep_charge][$k];

$sql6="SELECT * FROM `ewallet` WHERE `spid`='$v'";
$res6=mysqli_query($con,$sql6);
$num6=mysqli_num_rows($res6);
$row6=mysqli_fetch_array($res6);

$update_ewallet=$row6[total_amt]+$ttamt;
$ewallet_res_amt=$row6[rest_amt]+$ttamt;

if($num6>0){
$sql7="UPDATE `ewallet` SET `total_amt`='$update_ewallet',`rest_amt`='$ewallet_res_amt' WHERE `spid`='$v'";
}else{
$sql7="INSERT INTO `ewallet`(`total_amt`,`rest_amt`,`spid`)VALUES('$update_ewallet','$ewallet_res_amt','$v')";
}
$res7=mysqli_query($con,$sql7);
unset($ttamt);unset($update_ewallet);unset($ewallet_res_amt);
unset($repamt);unset($repurchase_amt);

}




if($res){
header("location:generate_payout.php?msg=Payout Sucessfully Generated.");
}



?>