<?php
include "../ctrl_panel/lib_panel/config.php";

 $memcheck="SELECT * FROM `member` WHERE `sponsorid`='$_REQUEST[spname]' AND `member_status`='1' AND `st`='1'";
$Qmemcheck=mysqli_query($con,$memcheck);
$Qnum=mysqli_num_rows($Qmemcheck);
if ($Qnum>=3) {
echo "ok";
}

 ?>
