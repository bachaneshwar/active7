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
$sql="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$res=mysqli_query($con,$sql);
$numspid=mysqli_num_rows($res);

if($numspid>0){			 

if($_POST[coupon_code]==""){
$full=rand(1,999999999);
$substr=substr($full,1,7);
$coupon_code=$full+time();
}else{
$coupon_code=$_POST[coupon_code];
}

$sql="INSERT INTO `coupon` (`coupon_code`,`spid`,`transfer_date`,`coupon_amount`,`monthly_limit`,`refer_by`)VALUES('$coupon_code','$_POST[spid]','$doj','$_POST[coupon_amount]','$_POST[monthly_limit]','$_POST[refer_by]')";
$res=mysqli_query($con,$sql);

if($res){
$nurl="$log_url?lid=$dtls_link[sublink_id]&";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=COUPON SUCCESSFULLY TRANSFERED.">';
}
else{
$nurl="$log_url?lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=COUPON FAILED.">';	
}

}
else{
$nurl="$log_url?lid=$dtls_link[sublink_id]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=Member ID is invalid.">';	
}

}



?>

<script type="text/javascript">
function validate_form(form){
if( form.elements['coupon_amount'].value=="" ) { alert("Please type Coupon Amount"); form.elements['coupon_amount'].focus(); return false; }
if( form.elements['spid'].value=="" ) { alert("Please type Member ID"); form.elements['spid'].focus(); return false; }
if( form.elements['spname'].value=="" ) { alert("Please type correct Member Id"); form.elements['spid'].focus(); return false; }
if( form.elements['refer_by'].value=="" ) { alert("Please type Refferal ID"); form.elements['refer_by'].focus(); return false; }
if( form.elements['parentname'].value=="" ) { alert("Please type correct Refferal Id"); form.elements['refer_by'].focus(); return false; }
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
<script language="javascript" type="text/javascript" src="ajax.js"></script>                 

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>

<div class="header-title">
<h1>Coupon</h1>
<small>Coupon Transfer</small>
</div>
</section>
<!-- Main content -->
<section class="content">
<div class="row">
<div class="col-sm-4">
<div class="panel lobidisable panel-bd">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="panel-title">
<h4>Coupon</h4>
</div>
</div>
<div class="panel-body">
<form action="" method="post" name="newform" onsubmit="return validate_form(this)">

<div class="form-group">
<label>Coupon Code</label>
<input type="text" class="form-control" name="coupon_code"  >
</div>


<div class="form-group">
<label>Coupon Amount <span style='color:red'>*</span></label>
<input type="text" class="form-control" name="coupon_amount" maxlength="7" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
</div>

<div class="form-group">
<label>Monthly Limit <span style='color:red'>*</span></label>
<input type="text" class="form-control" name="monthly_limit" maxlength="5" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required>
</div>

<div class="form-group">
<label>Member ID <span style='color:red'>*</span></label>
<input type="text" class="form-control" name="spid" id="sponsorid" onkeyup="ajax21();"  required>
</div>

<div class="form-group">
<label>Member Name</label>
<input type="text" class="form-control" name="spname" id="spname" readonly>
</div>

<div class="form-group">
<label>Refferal ID <span style='color:red'>*</span></label>
<input type="text" class="form-control" name="refer_by" id="parentspid" onkeyup="ajax22();"  required>
</div>

<div class="form-group">
<label>Refferal Name</label>
<input type="text" class="form-control" name="parentname" id="parentname" readonly>
</div>


<div class="form-group">
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
