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
<small>Wallet balance</small>
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

<i class="fa fa-list"></i> Wallet balance
</div>
</div>
<div class="panel-body">
<center>
<table style="width:100%">

<?
$sql="SELECT * FROM `admin_wallet_repurchase` WHERE `walletid`='1'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
?>
<tr>
	<td >Wallet Balance<span style="color:#ff0000"></span></td>
<td>
<?=$row[walletamt]?>
</td>
</tr>

</table>

</center>


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