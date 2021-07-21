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
$user=$row1[user];

if($_POST[call_submit]!=""){
$old_user=md5($_POST[old_user]);

if($old_user==$user){
$encode_value=md5($_POST[user]);
$sql="UPDATE `admin` SET `user`='$encode_value' WHERE `userid`='$_SESSION[userid]'";
$re=mysqli_query($con,$sql);
header("location:$log_url?msg=Successfully Updated");
}else{
header("location:$log_url?msg=Please type correct old Username");
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
<small>Change Username</small>
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
<i class="fa fa-list"></i> Change Username
</div>
</div>


<script type="text/javascript">
function validate_form(form){
if( form.elements['old_user'].value=="" ) { alert("Please type Old Username."); form.elements['old_user'].focus(); return false; }  
if( form.elements['user'].value=="" ) { alert("Please type New Username."); form.elements['user'].focus(); return false; }
if( form.elements['user'].value!="" ){ 
var pas=form.elements['user'].value;
 var len=pas.length;
if(len<5){
alert("New Username strength more than four."); form.elements['user'].focus(); return false;
}
}
if( form.elements['con_user'].value=="" ) { alert("Please type New Confirm Username."); form.elements['con_user'].focus(); return false; }
if( form.elements['con_user'].value!="" ){ 
var pas1=form.elements['con_user'].value;
 var len1=pas1.length;
if(len1<5){
alert("Confirm Username strength more than four."); form.elements['con_user'].focus(); return false;
}
}
if(form.elements['con_user'].value!=""){
var a1 =form.elements['user'].value;
var a2 =form.elements['con_user'].value;
if(a1!=a2){
alert("Please type Correct Confirm Username"); form.elements['con_user'].focus(); return false;
}
}
}
</script>

<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td ><B>Old Username:</B></td>
<td><input  type="text" class="form-control" name="old_user"  value="" required/></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>
<tr>
<td><B>New Username:</B></td>
<td><input  type="text" class="form-control" name="user" required/></td>
</tr>


<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>Confirm Username:</B></td>
<td ><input  type="text" class="form-control" name="con_user" required/></td>
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