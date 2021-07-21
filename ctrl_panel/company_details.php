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

$sql="SELECT * FROM `company_address` WHERE `id`='1'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);

if($_POST[call_submit]!=""){


$sq="UPDATE `company_address` SET `com_name`='$_POST[com_name]',`address`='$_POST[address]',`pincode`='$_POST[pincode]',`state`='$_POST[state]',`contact_no`='$_POST[contact_no]',`url`='$_POST[url]',`email`='$_POST[email]',`gst_no`='$_POST[gst_no]' WHERE `id`='1'";
$qu=mysqli_query($con,$sq);

header("location:$log_url?msg=Successfully Updated");


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
<small>Change Password</small>
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
<i class="fa fa-list"></i> Change Password
</div>
</div>




<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td ><B>Company Name:</B></td>
<td><input  type="text" class="form-control" name="com_name"  value="<?=$row[com_name]?>" required /></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td ><B>Address:</B></td>
<td><textarea name="address" id="address"  class="form-control"  rows="5" cols="36" ><?=$row[address]?></textarea></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>Pincode:</B></td>
<td><input  type="text" class="form-control" name="pincode" onkeypress="return keyRestrict(event, '1234567890')"   value="<?=$row[pincode]?>"  /></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>State Name:</B></td>
<td><input  type="text" class="form-control" name="state"  value="<?=$row[state]?>"  /></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>GSTN No:</B></td>
<td><input  type="text" class="form-control" name="gst_no"  value="<?=$row[gst_no]?>"  /></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td ><B>Contact No:</B></td>
<td><input  type="text" class="form-control" name="contact_no"  onkeypress="return keyRestrict(event, '1234567890')"  value="<?=$row[contact_no]?>"  /></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>Email:</B></td>
<td><input  type="text" class="form-control" name="email"  onkeypress="return keyRestrict(event, '1234567890')"  value="<?=$row[email]?>"  /></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td ><B>Website URL:</B></td>
<td><input  type="text" class="form-control" name="url"  value="<?=$row[url]?>"  /></td>
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