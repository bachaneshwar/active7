<?php
include("include/conn.php");


if($_GET[parentspid]!=""){

$sql="SELECT * FROM `member` WHERE `spid`='$_REQUEST[parentspid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$spname=$row[sname];
print $spname;
}

?>