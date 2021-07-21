<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");

if($_POST[call_submit]!=""){

$date=date("Y-m-d");


$sq="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$rq=mysqli_query($con,$sq);
$nq=mysqli_num_rows($rq);
	
$sq1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]' AND `member_status`='1'";
$rq1=mysqli_query($con,$sq1);
$nq1=mysqli_num_rows($rq1);



if($nq>0){

if($nq1>0){

$sql2="INSERT INTO `repurchase_details`(`spid`,`repurchase_package_id`,`package_no`,`purchase_dt`)VALUES('$_POST[spid]','$_POST[repurchase_package_id]','$_POST[package_no]','$date')";
$rq2=mysqli_query($con,$sql2);
$id=mysqli_insert_id($con);


if($rq2){

$nurl="repurchase_slip.php?pid=$id";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}

}
else{
$nurl="$log_url?msg=Please TopUp First.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}

}
else{
$nurl="$log_url?msg=Please Type Correct Member ID";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}





}
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


<script type="text/javascript">
function validate_form(form){
if( form.elements['package_id'].value=="" ) { alert("Please Select one Package."); form.elements['package_id'].focus(); return false; }  
if( form.elements['id'].value=="" ) { alert("Please type Serial No."); form.elements['id'].focus(); return false; }  
if( form.elements['pin'].value=="" ) { alert("Please type E-Pin."); form.elements['pin'].focus(); return false; }
if( form.elements['spid'].value=="" ) { alert("Please type Associate ID."); form.elements['spid'].focus(); return false; }
}
</script>	


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>
<div class="header-title">
<h1>Repurchase</h1>
<small>Sell Package</small>
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
<i class="fa fa-list"></i> Sell Package
</div>
</div>




<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">
<tr>
	<td >Package<span style="color:#ff0000">*</span></td>
<td>
<select class="form-control" name="repurchase_package_id" id="repurchase_package_id"  required>
<option value="">Select Package </option>
<?
$area_det=$my->check_all($con,repurchase_package,st,1);
foreach($area_det as $k1=>$v1){
?>
<option value="<?=$v1[repurchase_package_id]?>"><?=$v1[repurchase_package_name]?></option>
<?}?>
</select>
</td>
</tr>	




<tr ><td colspan="2"><br/></td></tr>


<tr>
	<td >Package No<span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="package_no"  id="package_no"   onkeypress="return keyRestrict(event, '1234567890')" required />
</td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>




<tr>
	<td >Member ID<span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="spid"  id="spid"  required />
</td>
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