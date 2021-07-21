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
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>
<div class="header-title">
<h1>Sales Agent</h1>
<small>Rank Details</small>
</div>
</section>	

<!-- Main content -->
<section class="content">






<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> Sales Rank
</div>
</div>
<div class="panel-body">


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"3\">".$msg."</font></center>";
?>

<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th >Sr</th>
<th scope="col" class="rounded">Designation</th>
<th scope="col" class="rounded">Target</th>
<th scope="col" class="rounded">Salary</th>
<th scope="col" class="rounded">On Target</th>
<th scope="col" class="rounded">Below Target</th>
<th scope="col" class="rounded">Above Target</th>
<th scope="col" class="rounded">Direct</th>
<th scope="col" class="rounded">Action</th>
</tr>
</thead>
<tbody>

<?php


$msgsql="select * from `sales_rank` ORDER BY `sales_rank_id` ASC";
$msgres=mysqli_query($con,$msgsql);
while($row1=mysqli_fetch_array($msgres)){
$c++;
?>

<tr>
<td style="font-size:12px"><?=$c?></td>
<form method="post" action="total_rank_action.php">
<td style="font-size:12px">
<input type="text" name="designation" value="<?=$row1[designation]?>" style="width:120px;font-size:11px" required  />
</td>
<td style="font-size:12px">
<input type="text" name="target" value="<?=$row1[target]?>" style="width:60px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
</td>
<td style="font-size:12px">
<input type="text" name="salary" value="<?=$row1[salary]?>" style="width:60px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" />
</td>
<td style="font-size:12px">
<input type="text" name="target_percent" value="<?=$row1[target_percent]?>" style="width:40px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /> %
</td>
<td style="font-size:12px">
<input type="text" name="below_percent" value="<?=$row1[below_percent]?>" style="width:40px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /> %
</td>
<td style="font-size:12px">
<input type="text" name="above_percent" value="<?=$row1[above_percent]?>" style="width:40px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /> %
</td>
<td style="font-size:12px">
<input type="text" name="direct_percent" value="<?=$row1[direct_percent]?>" style="width:40px;font-size:12px" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" /> %
</td>
<td>
<input type="hidden" name="sales_rank_id" value="<?=$row1[sales_rank_id]?>" readonly />
<input type="submit" name="submit" id="submit" value="Submit" style="width:60px;font-size:12px" />
</form>
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