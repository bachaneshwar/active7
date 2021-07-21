<?php
include_once("../ctrl_panel/lib_panel/config.php");
error_reporting(0);
if($_GET[pinno]!=""){
$sql="SELECT * FROM `plot_epin` WHERE `plotpin`='$_REQUEST[pinno]' AND `status`='1'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
if($row[plot_pinId]!=""){ print $row[plot_pinId];}else{ print 0;}
}
else{print 0;}

?>