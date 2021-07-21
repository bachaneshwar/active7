<?php
session_start();
ob_start();
include("../ctrl_panel/include/conn.php");

$sql="select * from `member_account` where `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);

$perfect_money=$_POST[perfect_money];
$bitcoin=$_POST[bitcoin];
$paytm=$_POST[paytm];




if($num>0)
{
$sql1="UPDATE `member_account` SET `perfect_money`='$perfect_money',`paytm`='$paytm',`bitcoin`='$bitcoin' where `spid`='$_SESSION[spid]'";
}else{
$sql1="INSERT INTO `member_account`(`spid`,`perfect_money`,`paytm`,`bitcoin`)VALUES('$_SESSION[spid]','$perfect_money','$paytm','$bitcoin')";
}
$res1=mysqli_query($con,$sql1);


header("location:account_settings.php?m=1&msg=Sucessfully Updated.");
?>