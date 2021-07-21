<?php
ob_start();
session_start();
include_once("include/conn.php");
$date=date("Y-m-d");


$sql7="UPDATE `sales_rank` SET `designation`='$_POST[designation]',`target`='$_POST[target]',`salary`='$_POST[salary]',`target_percent`='$_POST[target_percent]',`below_percent`='$_POST[below_percent]',`above_percent`='$_POST[above_percent]',`direct_percent`='$_POST[direct_percent]' WHERE `sales_rank_id`='$_POST[sales_rank_id]'";
$res7=mysqli_query($con,$sql7);


header("location:rank_rate.php?msg=Sucessfully Done.");



?>