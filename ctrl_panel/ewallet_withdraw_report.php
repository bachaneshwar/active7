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
<h1>Withdrawal</h1>
<small>Withdrawal Report</small>
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
$upper=50;
$lower=$upper*($pg-1);
$sql="select * from `withdrawal` WHERE `status_dt`>='$_REQUEST[start_date]' AND `status_dt`<='$_REQUEST[end_date]' AND `status`='1'";
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

<i class="fa fa-list"></i>  Approve Withdrawal Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?>
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
<th scope="col" class="rounded">Amount</th>
<th scope="col" class="rounded">Apply Dt</th>
<th scope="col" class="rounded">Approve Dt</th>

</tr>
</thead>
<tbody>

<?php
$msgsql="select * from `withdrawal` WHERE `status_dt`>='$_REQUEST[start_date]' AND `status_dt`<='$_REQUEST[end_date]' AND `status`='1' ORDER BY `with_d_id` ASC limit $lower,$upper";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$srow=$my->total_row($con,member,spid,$row[spid]);



$dt1=explode("-",$row[apply_dt]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];

$dt3=explode("-",$row[status_dt]);
$dt4=$dt3[2]."-".$dt3[1]."-".$dt3[0];
?>

<tr>
<td><?=$c?></td>
<td><?=$srow[spid]?></td>
<td><?=$srow[sname]?></td>
<td><?=$row[amount]?></td>
<td><?=$dt2?></td>
<td><?=$dt4?></td>

</tr>

<? } ?>

</tbody>
</table>
</div>
<div>
<table>
<form>

<?php
unset($amount);unset($tds);unset($sc);
$msgsql="select * from `withdrawal` WHERE `status_dt`>='$_REQUEST[start_date]' AND `status_dt`<='$_REQUEST[end_date]' AND `status`='1'";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){

$amount=$amount+$row[amount];
$tds=$tds+$row[tds];
$sc=$sc+$row[sc];
}
  ?>

  <td style="padding:30px;">Total Amount:</td>
  <td><input type="text" class="form-control" value="<?=$amount?>" style="width:200px" readonly/></td>




  <form>
  </table>
</div>
<div class="pagination">
<?
$pre=$pg-1;
$nxt=$pg+1;

if($pg!=1)
print "<A HREF='ewallet_withdraw_report.php?pg=$pre&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='ewallet_withdraw_report.php?pg=$i&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='ewallet_withdraw_report.php?pg=$nxt&start_date=$_REQUEST[start_date]&end_date=$_REQUEST[end_date]'class='next'>Next &raquo;</A>";
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
