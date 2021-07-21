<?php
ob_start();
include_once("../ctrl_panel/lib_panel/config.php");
$user = $_POST['spid'];
$sql="select * from `member` where `spid`='$user'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);

$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);

if($num>0 && $user!="")
{
$row=mysqli_fetch_array($res);
$to="$row[email]";
$subject="Login Password";
$message="Your Password is - $row[pass]";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'To: '.$row[sname].' <'.$to.'>' . "\r\n";
$headers .= 'From: '.$row_sp1[com_name].' <'.$row_sp1[email].'>' . "\r\n";
 
mail($to,$subject,$message,$headers);

$message="Your login password is $row[pass]";
header("location:forgot-password.php?msg=Password Sent to your E-mail ID");
}


else{
header("location:forgot-password.php?msg=Type Correct Member Id.");	
}


?>