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
$cuponins="INSERT INTO `active_pass`(`active_pass_name`,`st`) VALUES ('$_POST[acname]','1')";
$qu1=mysqli_query($con,$cuponins);

// $sq="UPDATE `amount_rate` SET `amount`='$_POST[amount]',`Sgst`='$_POST[Sgst]',`Cgst`='$_POST[Cgst]' WHERE `id`='1'";
// $qu=mysqli_query($con,$sq);

 echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?msg=Successfully Insert&lid=79">';

}
?>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-gear"></i></div>
<div class="header-title">
<h1>Settings</h1>
<small>Add Active Coupon</small>
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
<i class="fa fa-list"></i> Add Active Coupon  &nbsp;&nbsp;&nbsp; 
</div>
</div>


<div class="panel-body">

<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">




<!-- <tr>
<td ><B>TDS Charge (%):</B></td>
<td><input  type="text" class="form-control" name="tds" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
value="<?=$row[tds]?>"  required /> </td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td ><B>TDS PAN Charge (%):</B></td>
<td><input  type="text" class="form-control" name="tds_pan" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
value="<?=$row[tds_pan]?>"  required /> </td>
</tr>
<tr ><td colspan="2"><br/></td></tr>-->


<tr>
<td ><B>Active Coupon Name :</B></td>
<td><input  type="text" class="form-control" name="acname"    value="<?=$row[amount]?>"  required /> </td>
</tr>
<tr ><td colspan="2"><br/></td></tr>


<!-- <tr>
<td ><B>Sgst (%):</B></td>
<td><input  type="text" class="form-control" name="Sgst" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?=$row[Sgst]?>" required /> </td>
</tr>
<tr ><td colspan="2"><br/></td></tr> 

<tr>
<td ><B>Cgst (%):</B></td>
<td><input  type="text" class="form-control" name="Cgst" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"   value="<?=$row[Cgst]?>" required /> </td>
</tr>
<tr ><td colspan="2"><br/></td></tr>  -->



</table>




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Reset" />
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
