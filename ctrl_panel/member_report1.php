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
<div class="header-icon"><i class="fa fa-users"></i></div>
<div class="header-title">
<h1>Reward Show By date</h1>
<small>Reward Show By date</small>
</div>
</section>

<!-- Main content -->
<section class="content">




<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist">

<i class="fa fa-list"></i>  Reward Show By date <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?>
</div>
</div>
<div class="panel-body">


<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th>Sr</th>
<th scope="col" class="rounded">Member Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Sponsor Id</th>
<th scope="col" class="rounded">Reward</th>

</tr>
</thead>
<tbody>

<?php
$msgsql="SELECT * FROM `reward_generation` WHERE `stdt`>='$_REQUEST[start_date]' AND `endt`<='$_REQUEST[end_date]' AND `st`='1' ORDER BY `rd_id` ASC";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
    $msgsql1 = "select * from `member` where `spid`='$row[spid]'";
    $msgres1=mysqli_query($con,$msgsql1);
    $row1=mysqli_fetch_array($msgres1);
$c++;
$msgsql2 = "select * from `reward_select` where `reward_id`='$row[reward_id]'";
    $msgres2=mysqli_query($con,$msgsql2);
    $row2=mysqli_fetch_array($msgres2);

$decode_val=base64_encode($row[memid]);
$decode_time=base64_encode(time());

$srow=$my->total_row($con,member,spid,$row1[sponsorid]);


if($row[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($row[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}

$dt1=explode("-",$row1[doj]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];


?>

<tr>
<td><?=$c?></td>
<td><?=$row[spid]?></td>
<td><?=$row1[sname]?></td>
<td><?=$row1[sponsorid]?></td>
<td><?=$row2[prize]?></td>


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
