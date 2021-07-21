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




<?

if($_POST[call_submit]!=""){
$doj=date("Y-m-d");
$num=$_POST[fullpin];
for($i=0;$i<$num;$i++){
$full=rand(1,999999999);
$substr=substr($full,1,7);
$rq="EPIN-";
$pin=$full;
$sql="INSERT INTO `e-pin` (`generatedid`,`pin`,`date`,`memtransid`,`package_id`,`pin_type`)VALUES('admin','$pin','$doj','admin','$_POST[package_id]','topup')";
$res=mysqli_query($con,$sql);
}


$nurl="$log_url?lid=$dtls_link[sublink_id]&";

echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=Successfully Generated">';


}



?>

<script type="text/javascript">
function validate_form(form){
if( form.elements['package_id'].value=="" ) { alert("Please select one Package"); form.elements['package_id'].focus(); return false; }
if( form.elements['fullpin'].value=="" ) { alert("Please type pin no"); form.elements['fullpin'].focus(); return false; }
}
</script>


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

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>

<div class="header-title">
<h1>Package - E-Pin</h1>
<small>E-Pin Creation</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">
<h4><?=$action_type?> Package</h4>
</div>
</div>
<div class="panel-body">
<form action="" method="post" onsubmit="return validate_form(this)">


<div class="form-group">
<label>Package</label>
<select class="form-control" name="package_id" required>
<option value="">Select Package </option>
<?
$area_det=$my->check_all_asc($con,package,st,1,package_id);
foreach($area_det as $k1=>$v1){
?>
<option value="<?=$v1[package_id]?>"><?=$v1[package_name]?></option>
<?}?>
</select>
</div>

<div class="form-group">
<label>Pin No</label>
<input type="text" class="form-control" name="fullpin" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
</div>



<div class="form-group">
<input type="hidden" name="subId" value="<?=$value_det['package_id']?>" />


<?
if($_GET[eid]!=""){
?>
<input type="hidden" name="st" value="<?=$value_det[st]?>" />
<?} else{?>
<input type="hidden" name="st" value="1" />
<?}?>


<input type="submit" name="call_submit" class="btn btn-add"  value="Submit" />
	 <?php
		$msg=$_REQUEST[msg];
		echo "<center><font color=\"#ff0066\" size=\"2\">".$msg."</font></center>";

		 ?>
</div>
</form>
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
