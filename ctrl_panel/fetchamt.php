<?php
include_once("include/conn.php");
error_reporting(0);

$sql="SELECT * FROM `plot` WHERE `plot_id`='$_REQUEST[plot_id]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

$total_amt=$row[booking_amt];

print $total_amt;
?>