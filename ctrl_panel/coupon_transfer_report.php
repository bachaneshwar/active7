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


if($_REQUEST[coupon_id]!=""){

$sql7="UPDATE `coupon` SET `monthly_limit`='$_POST[monthly_limit]' WHERE `coupon_id`='$_POST[coupon_id]'";
$res7=mysqli_query($con,$sql7);

$nurl="$log_url?pg=$_GET[pg]&lid=$_REQUEST[lid]&spid=$_REQUEST[spid]&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
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
<div class="header-icon"><i class="glyphicon glyphicon-pawn"></i></div>
<div class="header-title">
<h1>Coupon Transfer Details</h1>
<small>By Date</small>
</div>
</section>	

<!-- Main content -->
<section class="content">



<?php
if($_GET[pg])
{
$pg=$_GET[pg];
}
else
{
$pg=1;
}
$upper=100;
$lower=$upper*($pg-1);
$sql="select * from `coupon`  WHERE `transfer_date`>='$_REQUEST[start_date]' AND `transfer_date`<='$_REQUEST[end_date]'";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
$pgno=intval($num/$upper);
if($num%$upper!=0)
{
$pgno=$pgno+1;
}


if($_GET[pg]==""){
$c=0;
}
else{
$c=($_GET[pg]-1)*$upper;
}
?>


<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i>  Coupon Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?>
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
<th scope="col" class="rounded">Date</th>
<th scope="col" class="rounded">Coupon Code</th>
<th scope="col" class="rounded">Coupon Amount</th>
<th scope="col" class="rounded">Used Amount</th>
<th scope="col" class="rounded">Remain Amount</th>
<th scope="col" class="rounded">Refer By</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Monthly Limit</th>

</tr>
</thead>
<tbody>

<?php
$msgsql="select * from `coupon`  WHERE `transfer_date`>='$_REQUEST[start_date]' AND `transfer_date`<='$_REQUEST[end_date]'  ORDER BY `coupon_id` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$decode_val=base64_encode($row[memid]);
$decode_time=base64_encode(time());

$srow=$my->total_row($con,member,spid,$row[spid]);


$dt1=explode("-",$row[transfer_date]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];
$prow=$my->total_row($con,member,spid,$row[refer_by]);


?>

<tr>
<td><?=$c?></td>
<td><?=$srow[spid]?></td>
<td><?=$srow[sname]?></td>
<td><?=$dt2?></td>
<td><?=$row[coupon_code]?></td>
<td><?=$row[coupon_amount]?></td>
<td><?=$row[used_amount]?></td>
<td><?=$row[coupon_amount]-$row[used_amount]?></td>
<td><?=$prow[spid]?></td>
<td><?=$prow[sname]?></td>

<td>

<form method="post" action="">
<input type="hidden" name="coupon_id" value="<?=$row[coupon_id]?>" readonly />
<input type="hidden" name="start_date" value="<?=$_REQUEST[start_date]?>" readonly />
<input type="hidden" name="end_date" value="<?=$_REQUEST[end_date]?>" readonly />


<input type="text" name="monthly_limit" value="<?=$row[monthly_limit]?>"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  style="width:60px;font-size:12px" required  />
<input type="submit" name="submit" id="submit" value="Submit" style="width:60px;font-size:12px" />
</form>

</td>

</tr>

<? } ?>

</tbody>
</table>
</div>

<div class="pagination">
<?
$pre=$pg-1;
$nxt=$pg+1;

if($pg!=1)
print "<A HREF='coupon_transfer_report.php?pg=$pre&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='coupon_transfer_report.php?pg=$i&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='coupon_transfer_report.php?pg=$nxt&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]'class='next'>Next &raquo;</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;<span class='next'>Next &raquo;</span>";
?> 
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