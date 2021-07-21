<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '1500000000M');
ini_set('max_execution_time',3000000000);
date_default_timezone_set ('Asia/Kolkata');

include_once("lib_panel/config.php");

$spid=$_SESSION[spid];

foreach($spid as $k=>$v){

unset($reward_gen_id);
$sql="INSERT INTO `reward_generation` (`stdt`,`endt`,`reward_date`,`spid`,`reward_id`,`pair`)
VALUES ('".$_SESSION[stdt][$k]."','".$_SESSION[endt][$k]."','".$_SESSION[ptdt][$k]."','$v','".$_SESSION[reward_id][$k]."','".$_SESSION[pair][$k]."')";
$res=mysqli_query($con,$sql);
$reward_gen_id=mysqli_insert_id($con);

}

if($res){
header("location:gen_reward.php");
}








?>