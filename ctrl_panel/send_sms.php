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

$sel_parent_bin_lev = "select * from `member` where `spid`='$_POST[spid]'";
$res_parent_bin_lev = mysqli_query($con,$sel_parent_bin_lev) ;

$row_parent_bin_lev = mysqli_fetch_assoc($res_parent_bin_lev);

$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);

$message="Dear ".$row_parent_bin_lev[sname].", Welcome you to ".$row_sp1[com_name].". Your login ID: ".$row_parent_bin_lev[spid]." Pwd: ".$row_parent_bin_lev[pass].", Epin Pass: ".$row_parent_bin_lev[epin_password].", Transaction Pass: ".$row_parent_bin_lev[trans_password]." respectively. www.successlifeopportunity.online";
SMS_Sender($row_parent_bin_lev[mob],$message);


}
?>

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-users"></i></div>
<div class="header-title">
<h1>Member</h1>
<small>Member Search</small>
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
<i class="fa fa-list"></i> Member Search
</div>
</div>




<div class="panel-body">



<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid" style="width:200px" required /></td>

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