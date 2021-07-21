<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
?>
<body class="hold-transition sidebar-mini">
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
<?php
include_once("include/header_down.php");
?>       
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<?php
include_once("include/menu.php");
?>


<?php

if($_POST[call_submit]!=""){
$doj=date("Y-m-d");

$sql="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$res=mysqli_query($con,$sql);
$numspid=mysqli_num_rows($res);

if($numspid>0){			 
$num=$_POST[fullpin];
for($i=0;$i<$num;$i++){
$full=rand(1,999999999);
$substr=substr($full,1,7);
$pin=$full;
$sql="INSERT INTO `e-pin` (`generatedid`,`pin`,`date`,`memtransid`,`transfer`,`package_id`)VALUES('admin','$pin','$doj','$_POST[spid]','admin','$_POST[package_id]')";
$res=mysqli_query($con,$sql);
}

if($res){
$tsql="INSERT INTO `epin_transfer` (`trans_by`,`pin_no`,`trans_date`,`spid`)VALUES('admin','$num','$doj','$_POST[spid]')";
$tres=mysqli_query($con,$tsql);

header("location:$log_url?msg=EPINS SUCCESSFULLY TRANSFERED.");
}
}
else{
header("location:$log_url?msg=Member ID is invalid.");

}
}

?>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-gear"></i></div>
<div class="header-title">
<h1>Booking E-Pin</h1>
<small>Pin Transfer</small>
</div>
</section>	

<!-- Main content -->
<section class="content">
<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 
<i class="fa fa-list"></i> Pin Transfer
</div>
</div>




<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid" required></td>

</tr>	
<tr ><td colspan="2"><br/></td></tr>


<tr>
<td >Pin No</td>
<td><input  type="text" class="form-control" name="fullpin" onkeypress="return keyRestrict(event, '1234567890')"  required /> </td>
</tr>
<tr ><td colspan="2"><br/></td></tr>





</table> 




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>




</form>


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>

</div>
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once("include/footer_top.php");
?>
</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<?php
include_once("include/footer_down.php");
?>

</body>

</html>