<?php
include_once("../ctrl_panel/lib_panel/config.php");
error_reporting(0);
session_start();
if($_GET[pinno]!=""){
$sql="SELECT * FROM `e-pin` WHERE `pin`='$_REQUEST[pinno]' AND `status`='1' AND `memtransid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
if($row[id]!=""){ print $row[id];}else{ print 0;}
}
else{print 0;}

?>