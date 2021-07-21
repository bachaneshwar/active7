<?php
include_once("../ctrl_panel/lib_panel/config.php");


if($_GET[sponsorid]!=""){

$sql="SELECT * FROM `member` WHERE `spid`='$_REQUEST[sponsorid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$spname=$row[sname];
print $spname;
}

?>