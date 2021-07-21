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

$sql1="SELECT * FROM `admin` WHERE `userid`='$_SESSION[userid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);
$pass=$row1[pass];

if($_POST[call_submit]!=""){
$old_pass=md5($_POST[old_pass]);

if($old_pass==$pass){
$encode_value=md5($_POST[pass]);
$sql="UPDATE `admin` SET `pass`='$encode_value' WHERE `userid`='$_SESSION[userid]'";
$re=mysqli_query($con,$sql);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?msg=Successfully Updated">';		 
}else{
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?msg=Please type correct old Password">';		 
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


<script type="text/javascript">
function validate_form(form){
if( form.elements['old_pass'].value=="" ) { alert("Please type Old Password."); form.elements['old_pass'].focus(); return false; }  
if( form.elements['pass'].value=="" ) { alert("Please type New Password."); form.elements['pass'].focus(); return false; }
if( form.elements['pass'].value!="" ){ 
var pas=form.elements['pass'].value;
 var len=pas.length;
if(len<5){
alert("New Password strength more than four."); form.elements['pass'].focus(); return false;
}
}
if( form.elements['con_pass'].value=="" ) { alert("Please type New Confirm Password."); form.elements['con_pass'].focus(); return false; }
if( form.elements['con_pass'].value!="" ){ 
var pas1=form.elements['con_pass'].value;
 var len1=pas1.length;
if(len1<5){
alert("Confirm Password strength more than four."); form.elements['con_pass'].focus(); return false;
}
}
if(form.elements['con_pass'].value!=""){
var a1 =form.elements['pass'].value;
var a2 =form.elements['con_pass'].value;
if(a1!=a2){
alert("Please type Correct Confirm Password"); form.elements['con_pass'].focus(); return false;
}
}
}
</script>

<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td ><B>Old Password:</B></td>
<td><input  type="password" class="form-control" name="old_pass"  value="" required /></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>
<tr>
<td><B>New Password:</B></td>
<td><input  type="password" class="form-control" name="pass" required /></td>
</tr>


<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>Confirm Password:</B></td>
<td ><input  type="password" class="form-control" name="con_pass" required /></td>
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