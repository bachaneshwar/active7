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

$decode_val=base64_decode($_REQUEST[userid]);

?>


<?php


if($_POST[call_submit]!=""){

$encode_value=md5($_POST[pass]);
$sql="UPDATE `admin` SET `pass`='$encode_value' WHERE `userid`='$_POST[userid]'";
$re=mysqli_query($con,$sql);

echo '<META HTTP-EQUIV="Refresh" Content="0; URL=show_subadmin.php?msg=Message Sent Sucessfully.">';		 

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
<small>Change Subadmin Password</small>
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
if( form.elements['pass'].value=="" ) { alert("Please type Password."); form.elements['pass'].focus(); return false; }
}
</script>

<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr ><td colspan="2"><br/></td></tr>
<tr>
<td><B>New Password:</B></td>
<td><input  type="password" class="form-control" name="pass" required /></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>

</table> 




<div class="form-group">



<input type="hidden" name="userid" value="<?=$decode_val?>" />

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