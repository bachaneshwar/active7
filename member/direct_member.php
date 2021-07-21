<?php
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
<div class="col-xs-12 dashboard-header">
<h1 class="dash-title">Direct Member</h1>
<!-- //////////////////////////////////////////////////// Breadcrumb -->
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Team View</a></li>
<li><a href="#" class="active">Direct Member</a></li>
</ol> <!-- /breadcrumb -->
</div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">

<!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
<div class=" col-xs-12">
<div class="panel">
<div class="panel-heading">
<h3>Direct Member</h3>
</div> <!-- /panel-heading -->
<div class="panel-body m-t-0">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>Sr.</th>
<th>Name</th>
<th>Member ID</th>
<th>BV</th>
<th>Mobile</th>
<th>DOJ</th>

</tr>
</thead>
<tbody>
<?php
$sql="SELECT * FROM `member` WHERE `sponsorid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
while($row1=mysqli_fetch_array($res)){
$cl++;
unset($personal_pv);unset($personal_bv);
$sql_direct="SELECT SUM(selprod.qty*selprod.pv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row1[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
$query_direct=mysqli_query($con,$sql_direct);
$row_direct=mysqli_fetch_array($query_direct);
$personal_pv=$row_direct[0];
$total_pv+=$personal_pv;
$sql_direct1="SELECT SUM(selprod.qty*selprod.bv) FROM `sell` as sell,`sell_product` as selprod WHERE sell.customer_id='$row1[memid]' AND sell.sell_id=selprod.sell_id  AND sell.st='1'";
$query_direct1=mysqli_query($con,$sql_direct1);
$row_direct1=mysqli_fetch_array($query_direct1);
$personal_bv=$row_direct1[0];
$total_bv+=$personal_bv;

$dt1=explode("-",$row1[doj]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];


if($row[member_status]==1){
$join1=explode("-",$row1[update_dt]);
$joindt=$join1[2]."-".$join1[1]."-".$join1[0];
}else{
$joindt="";
}
?>
<tr>
<th scope="row"><?=$cl?></th>
<td><?=$row1[sname]?></td>
<td><?=$row1[spid]?></td>
<td><?echo $personal_bv?></td>
<td><?=$row1[mob]?></td>
<td><?=$dt2?></td>
</tr>
<?php
}
?>


<tr>
<th scope="row"></th>
<td></td>
<td></td>
<td><?echo $total_bv?></td>
<td></td>
<td></td>
</tr>

</tbody>
</table>

</div> <!-- /table-responsive -->
</div> <!-- /panel-body -->
</div> <!-- /panel-->
</div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>
