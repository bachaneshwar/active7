<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
?>
<body class="hold-transition sidebar-mini" oncontextmenu="return false">
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

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>
<div class="header-title">
<h1>E-Wallet</h1>
<small>Wallet to Wallet Transfer</small>
</div>
</section>	

<!-- Main content -->
<section class="content">

<script type="text/javascript">
function validate_form(form){
if( form.elements['wallet_id'].value=="" ) { alert("Please choose Wallet Type."); form.elements['wallet_id'].focus(); return false; }
if( form.elements['spid'].value=="" ) { alert("Please type Associate ID."); form.elements['spid'].focus(); return false; }
}
</script>




<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> Wallet to Wallet Transfer
</div>
</div>
<div class="panel-body">
<center>
<form action="wallet_transfer_panel.php" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
	<td >Wallet Type<span style="color:#ff0000">*</span></td>
<td>
<select class="form-control" name="wallet_id" id="wallet_id"  required>
<option value="">Select Wallet </option>
<option value="1">Noraml Wallet To Repurchase Wallet</option>
<option value="2">Repurchase Wallet To Noraml Wallet</option>
</select>
</td>
</tr>

<tr><td colspan="2"><br/></td></tr>
<tr>
<td>Member Code <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="spid" style="width:200px" required /></td>
</tr>	
<tr><td colspan="2"><br/></td></tr>

</table> 
<div class="form-group">
<input type="hidden" name="st" value="1" />
<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>
</form>
</center>

<?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p style='color:green;font-weight:bold'>&nbsp;$msg</p>";
if($_REQUEST[msg1])
echo "<p style='color:red;font-weight:bold'>&nbsp;$_REQUEST[msg1]</p>";
?>	

<div class="table-responsive">

</div>





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