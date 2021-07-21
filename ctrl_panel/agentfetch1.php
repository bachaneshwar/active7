<?php
include("include/conn.php");


if($_GET[sponsorid]!=""){

$sql="SELECT * FROM `sales_agent` WHERE `agent_code`='$_REQUEST[sponsorid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$spname=$row[sname];
print $spname;

}

?>