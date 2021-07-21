<?php
error_reporting(0);
ob_start();
session_start();
ini_set('memory_limit', '1500000000M');
ini_set('max_execution_time',3000000000);
date_default_timezone_set("UTC");
include("include/function.php");

include_once("lib_panel/config.php");

$agent_code=$_SESSION[agent_code];

foreach($agent_code as $k=>$v){



$sql="INSERT INTO `sales_payout` (`stdt`,`endt`,`payout_date`,`agent_code`,`salary_comm`,`target_comm`,`extra_comm`,`direct_comm`,`team_business`,`td`,`sc_amount`,`total_amt`)
VALUES ('".$_SESSION[stdt][$k]."','".$_SESSION[endt][$k]."','".$_SESSION[ptdt][$k]."','$v','".$_SESSION[salary][$k]."','".$_SESSION[target_comm][$k]."','".$_SESSION[above_comm][$k]."','".$_SESSION[direct][$k]."','".$_SESSION[team_business][$k]."','".$_SESSION[td][$k]."','".$_SESSION[sc][$k]."','".$_SESSION[total_amt][$k]."')";
$res=mysqli_query($con,$sql);
$payout_id=mysqli_insert_id($con);

$sql2="UPDATE `sales_business` SET `payout_id`='$payout_id' WHERE `entry_dt`>='".$_SESSION[stdt][$k]."' AND `entry_dt`<='".$_SESSION[endt][$k]."' AND `agent_code`='$v' AND `payout_id`='0'";
$res2=mysqli_query($con,$sql2);


}




if($res){
header("location:generate_sales_payout.php?msg=Payout Sucessfully Generated.");
}



?>