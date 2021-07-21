<?php
session_start();
ob_start();
include_once("../ctrl_panel/lib_panel/config.php");
$user = $_SESSION['spid'];
$pass = $_POST['epin_password'];
$sql="select * from `member` where `spid`='$user' and `epin_password`='$pass'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
if($num>0)
{
$row=mysqli_fetch_array($res);
$_SESSION[epin]="antaraseal";
header("location:unused_pin.php?m=8");
}
else
header("location:login_epinpassword.php?msg=Type Correct E-PIN Password&m=8");
?>