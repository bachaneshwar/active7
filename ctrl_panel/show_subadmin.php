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

if($_GET[did]!=""){
$decode_id=base64_decode($_GET[did]);
$my->delete(admin,userid,$decode_id);
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$log_url.'?lid='.$dtls_link[sublink_id].'&pg='.$_GET[pg].'">';		 
}



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
<div class="header-icon"><i class="fa fa-envelope-o"></i></div>
<div class="header-title">
<h1>Settings</h1>
<small>SubAdmin Details</small>
</div>
</section>	

<!-- Main content -->
<section class="content">





<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> SubAdmin Details 
</div>
</div>
<div class="panel-body">



<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">
<th>Sr</th>
<th>User Name</th>
<th>Admin Type</th>
<th>Action</th>
</tr>
</thead>
<tbody>

<?php
$sql="SELECT * FROM `admin`";
$res=mysqli_query($con,$sql);
while($msgrow=mysqli_fetch_array($res)){
$c++;


$decode_val=base64_encode($msgrow[userid]);
$decode_time=base64_encode(time());

?>

<tr>
<td><?=$c?></td>
<td><?=$msgrow[user]?></td>
<td><?=$msgrow[type]?></td>
<td>
<a href="edit_subadmin.php?userid=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>&sub=1" type="button" class="btn btn-add btn-sm" ><i class="fa fa-pencil"></i></a>
<!---
<a href="<?=$log_url?>?lid=<?=$dtls_link[sublink_id]?>&did=<?=$decode_val?>&<?=$decode_time?>&pg=<?=$_GET[pg]?>" type="button" class="btn btn-danger btn-sm"  onclick="return confirm('Are you sure to delete?')"><i class="fa fa-trash-o"></i> </a>
-->
</td>
</tr>

<? } ?>

</tbody>
</table>
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