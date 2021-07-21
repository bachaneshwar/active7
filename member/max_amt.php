<?php
include("../ctrl_panel/include/conn.php");
if($_GET[package_id]!=""){

$sql="SELECT * FROM `package` WHERE `package_id`='$_REQUEST[package_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$max_amt=$row[max_amt];
print $max_amt;
}

?>