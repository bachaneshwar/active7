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
<div class="header-icon"><i class="glyphicon glyphicon-th"></i></div>
<div class="header-title">
<h1>Payout</h1>
<small>Show All Universal Stage D Payout</small>
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
<i class="fa fa-list"></i> Show All Universal Stage D
</div>
</div>




<div class="panel-body">




<form action="all_payout2.php" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Payout Date</td>
<td>
<select name="endt" class="form-control" style="width:350px" required>
<option value="" selected required>Select Payout Date</option>
<?php
$sql="SELECT * FROM `staged_payout` GROUP BY `endt` ORDER BY `endt` DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
?>
<option value="<?=$row[endt]?>"><?=$row[endt]?></option>
<?}?>
</select>
</td>
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