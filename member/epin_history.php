<?php 
include("include/top.php");
include("include/menu.php");

$approve_dt=date('Y-m-d');


?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Generation History</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>E-wallet</a></li>
          <li><a href="#" class="active">Generation History</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
		<h1><br/></h1>
             <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered">
			
<thead> 
<tr >
<th >Sl.</th>
<th >Pin No</th>
<th >Package</th>
<th >Amount</th>
<th >TDS Charge</th>
<th >Admin Charge</th>
<th >Total</th>
<th >Date</th>
</tr>
</thead> 

<?
$sql="SELECT * FROM  `epin_transfer` WHERE `trans_by`='$_SESSION[spid]' AND `gen_type`='1' ORDER BY  `transfer_id` DESC";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res))
{
$c++;

unset($total_charge);
$package_det=$my->total_row($con,package,package_id,$row[package_id]);
$total_charge=$row['tds']+$row['admin']+$row['pin_amount'];

?>
<tr  valign="middle">
<td ><b><?=$c?>.</b></td>
<td ><?=$row['pin_no']?></td>
<td ><?=$package_det['package_name']?></td>
<td ><?=$row['pin_amount']?></td>
<td ><?=$row['tds']?></td>
<td ><?=$row['admin']?></td>
<td ><?=$total_charge?></td>
<td ><?=$row['trans_date']?></td>

</tr>
<?

}
?>

</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>