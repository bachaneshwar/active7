<?php
session_start();
ob_start();
//error_reporting(0);
include_once("../ctrl_panel/lib_panel/config.php");
$user = mysqli_real_escape_string($con,$_POST['spid']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$date=date("Y-m-d");
$sql="select * from `member` where `spid`='$user' and `pass`='$pass'";
$res=mysqli_query($con,$sql);
print $num=mysqli_num_rows($res);
if($num>0)
{
$row=mysqli_fetch_array($res);
$pack_st=$row[st];
$_SESSION[spid]="$row[spid]";
$_SESSION[memb]="wrong";
//print $_SESSION[memb];
if($pack_st==1){
header("location:dashboard.php?m=0");

$sql1="INSERT INTO `member_login`(`spid`,`login_date`,`login_time`)VALUES('$row[spid]','$date','$todayDate1')";
$res1=mysqli_query($con,$sql1);
}
else{
header("location:index.php?msg=Your ID is Blocked");
}

}
else{
header("location:index.php?msg=Insert Correct Username And Password");
}
?>