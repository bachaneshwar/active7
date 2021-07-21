<?php
error_reporting(0);
session_start();
include_once("lib_panel/config.php");
//$con=mysqli_connect("localhost","root","","pashupati");
//$create_dt=date("Y-m-d H:i:s");
$sql="UPDATE `reward_select` SET `st`='0' WHERE `reward_id`='$_REQUEST[id]'";
$res=mysqli_query($con,$sql);

if($res){
  $msg="Delete successfully.";
  $_SESSION[msg]=$msg;
  $nurl="reward_manage.php";
      echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';

}
?>
