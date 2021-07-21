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
<div class="header-icon"><i class="glyphicon glyphicon-user"></i></div>
<div class="header-title">
<h1>Genealogy</h1>
<small>Direct agent_join_dtls</small>
</div>
</section>	

<!-- Main content -->
<section class="content">





<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> Direct Agent Details of <?=$_REQUEST[agent_code]?>
</div>
</div>
<div class="panel-body">



<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th>Sr</th>
<th scope="col" class="rounded">Agent Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Mobile</th>
<th scope="col" class="rounded">DOJ</th>
<th scope="col" class="rounded">Rank</th>
<th scope="col" class="rounded">Status</th>
</tr>
</thead>
<tbody>

<?php
$msgsql="select * from `sales_agent` WHERE `sponsorid`='$_REQUEST[agent_code]' ORDER BY `agent_id` ASC";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$srow=$my->total_row($con,sales_agent,agent_code,$row[parentspid]);


if($row[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($row[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}

$dt1=explode("-",$row[doj]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];


$arow=$my->total_row($con,sales_rank,sales_rank_id,$row[sales_rank_id]);

?>

<tr>
<td><?=$c?></td>
<td><?=$row[agent_code]?></td>
<td><?=$row[sname]?></td>
<td><?=$row[mob]?></td>
<td><?=$dt2?></td>
<td><span style="color:<?=$arow[rank_color]?>;font-weight:bold"><?=$arow[designation]?></span></td>
<td><?=$msg?></td>

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