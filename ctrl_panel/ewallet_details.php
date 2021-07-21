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
<h1>E-Wallet</h1>
<small>Credit</small>
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
$sql="select * from `ewallet`";
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

<i class="fa fa-list"></i> All Ewallet Credit
</div>
</div>
<div class="panel-body">
<center>
<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">
<tr>
<td>Member Code</td>
<td><input type="text" class="form-control" name="spid" style="width:200px" required /></td>
</tr>
<tr><td colspan="2"><br/></td></tr>
</table>
<div class="form-group">
<input type="hidden" name="st" value="1" />
<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>
</form>
</center>

<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"3\">".$msg."</font></center>";
?>

<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th scope="col" class="rounded">Sr</th>
<th scope="col" class="rounded">Mem ID</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Wallet</th>
</tr>
</thead>
<tbody>

<?php
// unset($tot);
if($_POST[spid]==""){
$msgsql="select * from `ewallet` ORDER BY `id` ASC limit $lower,$upper";
}else{
$msgsql="select * from `ewallet` WHERE spid='$_POST[spid]'";
}

$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;

// $tot=$tot+$row[rest_amt];
$sql1="SELECT * FROM `member` WHERE `spid`='$row[spid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);
?>

<tr>
<td style="font-size:12px"><?=$c?></td>
<td style="font-size:12px"><?=$row1[spid]?></td>
<td style="font-size:12px"><?=$row1[sname]?></td>
<td style="font-size:12px"><?=$row[rest_amt]?></td>

</tr>
<? } ?>
<!-- <tr>
<td style="font-size:12px"><?=$c?></td>
<td style="font-size:12px"></td>
<td style="font-size:12px">total</td>
<td style="font-size:12px"><?=$tot?></td>

</tr> -->
</tbody>
</table>
</div>

<div class="pagination">
<?
if($_POST[spid]==""){
$pre=$pg-1;
$nxt=$pg+1;

if($pg!=1)
print "<A HREF='ewallet_details.php?pg=$pre&lid=$dtls_link[sublink_id]'class='previous-off'>&laquo; Previous</A>";
else
print "<span class='previous-off'>&laquo; Previous</span>";



for($i=1;$i<=$pgno;$i++)
{
if($i!=$pg)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='ewallet_details.php?pg=$i&lid=$dtls_link[sublink_id]'>$i</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;$i";
}

if($pg!=$pgno)
print "&nbsp;&nbsp;&nbsp;&nbsp;<A HREF='ewallet_details.php?pg=$nxt&lid=$dtls_link[sublink_id]'class='next'>Next &raquo;</A>";
else
print "&nbsp;&nbsp;&nbsp;&nbsp;<span class='next'>Next &raquo;</span>";
}
?>
</div>
<?php
unset($tot);
if($_POST[spid]==""){
$msgsql="select * from `ewallet` ";
}else{
$msgsql="select * from `ewallet` WHERE spid='$_POST[spid]'";
}

$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;

$tot=$tot+$row[rest_amt];
}
?>
<center>Total<input type="text" class="form-control" name="tot" value="<?=$tot?>" style="width:200px" readonly /><center>

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
