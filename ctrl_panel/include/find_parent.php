<?php
ob_start();
session_start();
include_once("include/conn.php");
ini_set('max_execution_time',300000);

unset($_SESSION['mem']);
function name($con,$n,$leg){

if($n!=""){

$sqll="select * from `member` where `parentspid`='$n' and `leg`='$leg'";
$rows1=mysqli_fetch_array(mysqli_query($con,$sqll));
if($rows1[spid]!="")
$_SESSION['mem'][]=$rows1[spid];
name($con,$rows1[spid],$leg);
}

}
?>
