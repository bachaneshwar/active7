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
$password=md5($_POST[password]);


$sel="INSERT INTO `admin`(`user`,`pass`,`type`)VALUES('$_POST[user]','$password','admin')";
$qu=mysql_query ($sel);

if($qu){
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?msg=Successfully Added">';		 
}else{
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?msg=Operation Failed">';		 
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
<small>Create SubAdmin</small>
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
<i class="fa fa-list"></i> Create SubAdmin
</div>
</div>


<script type="text/javascript">
function validate_form(form){
if( form.elements['user'].value=="" ) { alert("Please type New Username."); form.elements['user'].focus(); return false; }  
if( form.elements['password'].value=="" ) { alert("Please type Password."); form.elements['password'].focus(); return false; }  
}
</script>

<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">




<tr ><td colspan="2"><br/></td></tr>
<tr>
<td><B>New Username:</B></td>
<td><input  type="text" class="form-control" name="user" required/></td>
</tr>


<tr ><td colspan="2"><br/></td></tr>


<tr>
<td ><B>Password:</B></td>
<td ><input  type="password" class="form-control" name="password" required/></td>
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