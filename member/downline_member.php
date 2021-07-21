<?php
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
<div class="col-xs-12 dashboard-header">
<h1 class="dash-title">Downline Member</h1>
<!-- //////////////////////////////////////////////////// Breadcrumb -->
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Team View</a></li>
<li><a href="#" class="active">Downline Member</a></li>
</ol> <!-- /breadcrumb -->
</div> <!-- /dashboard -->
</div> <!-- /row -->
<div class="panel-body">
<div class="row">
<div class="col-sm-6">


<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid_downline" style="width:200px" required /></td>

</tr>
<tr ><td colspan="2"><br/></td></tr>

</table>




<div class="form-group">


<input type="hidden" name="st" value="1" />

<input type="hidden" name="spid" value="<?=$_SESSION[spid]?>" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>




</form>


</div>
<div class="col-sm-6">





<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>
</div>
</div>
</div>

<div class="row">

<!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
<div class=" col-xs-12">
<div class="panel">
<div class="panel-heading">
<h3>Downline Member Details of <?=$_SESSION[spid]?> &nbsp; <?=$_POST[leg]?></h3>
</div> <!-- /panel-heading -->
<div class="panel-body m-t-0">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>Sr.</th>
<th>Name</th>
<th>Member ID</th>
<th>Sponsor ID</th>
<!-- <th>Total BV</th> -->
<th>DOJ</th>
<th>Level</th>

</tr>
</thead>
<tbody>
<?php
unset($p);unset($b);
$vsql1="SELECT * FROM `binary_level` WHERE `spid`='$_SESSION[spid]'";
$vres1=mysqli_query($con,$vsql1);
$vrow1=mysqli_fetch_array($vres1);


if($_POST[spid_downline]){
$vsql2="SELECT * FROM `binary_level` WHERE `binary` LIKE '$vrow1[binary]%' AND `level`>'$vrow1[level]' AND `spid`='$_POST[spid_downline]' ORDER BY `level` ASC";
}else if($_POST[leg]){

$vsql2="SELECT * FROM `binary_level` WHERE `binary` LIKE '$vrow1[binary]$_POST[leg]%' AND `level`>'$vrow1[level]' ORDER BY `level` ASC";

}else{
$vsql2="SELECT * FROM `binary_level` WHERE `binary` LIKE '$vrow1[binary]%' AND `level`>'$vrow1[level]' ORDER BY `level` ASC";

}
$vres2=mysqli_query($con,$vsql2);
while($vrow2=mysqli_fetch_array($vres2))
{


unset($personal_pv);unset($personal_bv);
$sqll="select * from `member` where `spid`='$vrow2[spid]' ";
$res1=mysqli_query($con,$sqll);
$row1=mysqli_fetch_array($res1);
$ch++;
//print "<br>";
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
<th scope="row"><?=$ch?></th>
<td><?=$row1[sname]?></td>
<td><?=$row1[spid]?></td>
<td><?=$row1[sponsorid]?></td>
<!-- <td><?echo $personal_bv;?></td> -->
<td><?=$dt2?></td>
<td><?=$vrow2[level]-$vrow1[level]?></td>
</tr>
<?php
}
?>

<tr>
<th scope="row"></th>
<td></td>
<td></td>
<td></td>
<td><?echo $total_bv;?></td>
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
