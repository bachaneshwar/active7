<?php 
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">EMI Details</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Booking Panel</a></li>
          <li><a href="#" class="active">EMI Details</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered"> 
            <thead> 
			
<tr>
<th>Sr</th>
<!--
<th scope="col" class="rounded">Member Id</th>
<th scope="col" class="rounded">Name</th>-->
<th scope="col" class="rounded">Phase</th>
<th scope="col" class="rounded">Plot No</th>
<th scope="col" class="rounded">Area</th>
<th scope="col" class="rounded">EMI </th>
<th scope="col" class="rounded">Date</th>
<th scope="col" class="rounded">Next EMI</th>
<th scope="col" class="rounded">Slip</th>
</tr>
            </thead> 


<?php
$msgsql="select * from `emi_payment` as emi,`plot_booking` as plbk  WHERE plbk.spid='$_SESSION[spid]' AND plbk.status='1' AND emi.status='1' AND plbk.plot_bkId=emi.plot_bkId ORDER BY emi.emi_payId ASC";
$msgres=mysqli_query($con,$msgsql);
while($row=mysqli_fetch_array($msgres)){
$c++;


$decode_val=base64_encode($row[memid]);
$decode_time=base64_encode(time());

$plrow=$my->total_row($con,plot_booking,plot_bkId,$row[plot_bkId]);

$srow=$my->total_row($con,member,spid,$plrow[spid]);

$prow=$my->total_row($con,plot,plot_id,$plrow[plot_id]);
$phrow=$my->total_row($con,phase,phase_id,$prow[phase_id]);
$parea=$my->total_row($con,area,area_id,$prow[area_id]);


if($row[st]==0){
$msg="<font style='color:black;'>Block</font>";
}
if($row[st]==1){
$msg="<font style='color:blue;'>Active</font>";
}

$dt1=explode("-",$row[payment_dt]);
$dt2=$dt1[2]."-".$dt1[1]."-".$dt1[0];

$dt3=explode("-",$row[next_emidt]);
$dt4=$dt3[2]."-".$dt3[1]."-".$dt3[0];
?>
<tr  valign="middle">

           
<td><?=$c?></td>
<!--
<td><?=$plrow[spid]?></td>
<td><?=$srow[sname]?></td>
-->
<td><?=$phrow[phase_name]?></td>
<td><?=$prow[plot_name]?></td>
<td><?=$parea[area_name]?></td>
<td><?=$row[payment_amt]?></td>
<td><?=$dt2?></td>
<td><?=$dt4?></td>

<td><a href="emi_slip.php?slipno=<?=$row[emi_payId]?>&sub=2" target="_blank" style='text-decoration:none'>Slip</a></td>


</tr>
<?php
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