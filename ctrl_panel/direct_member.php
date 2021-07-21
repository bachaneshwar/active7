<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
ob_start();

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




<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-user"></i></div>
<div class="header-title">
<h1>Genealogy</h1>
<small>Direct Member</small>
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
<i class="fa fa-list"></i> Direct Member
</div>
</div>




<div class="panel-body">

<?php

if($_POST[call_submit]!=""){
$doj=date("Y-m-d");

$sqlx="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$resx=mysqli_query($con,$sqlx);
$numspid=mysqli_num_rows($resx);

if($numspid>0){		

$nurl="direct_member_report.php?lid=$dtls_link[sublink_id]&spid=$_POST[spid]&";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';


}
else{
$nurl="$log_url?lid=$dtls_link[sublink_id]&";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'msg=Member ID is invalid.">';

}

}
?>


<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid" style="width:300px" required /></td>

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