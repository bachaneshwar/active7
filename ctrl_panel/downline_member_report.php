<!DOCTYPE html>
<html lang="en">

<?php
error_reporting(0);
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


$mem_dtls=$my->total_row($con,member,spid,$_REQUEST[spid]);
$rank_dtls=$my->total_row($con,rank_details,rank_id,$mem_dtls[rank_id]);


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
<small>Downline Member</small>
</div>
</section>

<!-- Main content -->
<section class="content">





<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist">

<i class="fa fa-list"></i> Downline Member Details of <?=$_REQUEST[spid]?> &nbsp; <?=$rank_dtls[rank_name]?>
</div>
</div>
<div class="panel-body">
<div class="row">
<div class="col-sm-6">



</div>
<div class="col-sm-6">





<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>
</div>
</div>
</div>
<div class="panel-body">

<?


unset($p);unset($b);
$vsql1="SELECT * FROM `binary_level` WHERE `spid`='$_REQUEST[spid]'";
$vres1=mysqli_query($con,$vsql1);
$vrow1=mysqli_fetch_array($vres1);
?>

<div class="table-responsive">
<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">

<th>Sr</th>
<th scope="col" class="rounded">Member Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Mobile</th>
<th scope="col" class="rounded">Sponsor Id</th>
<th scope="col" class="rounded">DOJ</th>
<th scope="col" class="rounded">Status</th>
<th scope="col" class="rounded">Level</th>
<!-- <th scope="col" class="rounded">Total BV</th> -->

</tr>
</thead>
<tbody>

<?php

$vsql2="SELECT * FROM `binary_level` WHERE `binary` LIKE '$vrow1[binary]%' AND `level`>'$vrow1[level]' ORDER BY `level` ASC";
$vres2=mysqli_query($con,$vsql2);
while($vrow2=mysqli_fetch_array($vres2))
{





$sqll="select * from `member` where `spid`='$vrow2[spid]' ";
$res=mysqli_query($con,$sqll);
$row=mysqli_fetch_array($res);

unset($personal_pv);unset($personal_bv);
$sql_direct="SELECT SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
$query_direct=mysqli_query($con,$sql_direct);
$row_direct=mysqli_fetch_array($query_direct);
$personal_pv=$row_direct[0];
$p=$p+$personal_pv;
$sql_direct1="SELECT SUM(selprod.qty*selprod.bv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
$query_direct1=mysqli_query($con,$sql_direct1);
$row_direct1=mysqli_fetch_array($query_direct1);
$personal_bv=$row_direct1[0];
$b=$b+$personal_bv;

///////////////

$dt1=explode("-",$row[doj]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];

if($row[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($row[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}
///////////
$srow=$my->total_row($con,member,spid,$row[sponsorid]);






///////////

$ch++;

?>

<tr>
<td><?=$ch?></td>
<td><?=$row[spid]?></td>
<td><?=$row[sname]?></td>
<td><?=$row[mob]?></td>
<td><?=$srow[spid]?> </td>
<td><?=$dt2?></td>
<td><?=$msg?></td>
<td><?=$vrow2[level]-$vrow1[level]?></td>
<!-- <td><?=$personal_bv?></td> -->
</tr>

<? } ?>

</tbody>
</table>
<tr ><td colspan="2"><br/></td></tr>
<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>


<th>TOTAL BV</th>
<td>
<input type="text" class="form-control" name="pv" value="<?=$b;?>" style="width:200px" readonly />


</td>

</tr>
<tr ><td colspan="2"><br/></td></tr>

</table>

</form>
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
