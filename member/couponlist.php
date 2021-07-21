<?php 
include("include/top.php");
include("include/menu.php");

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->
<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Coupon</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Coupon</a></li>
          <li><a href="#" class="active">Coupon Details</a></li>
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
           <tr >
<td align="center"><b>Sr.<b></th>
<td align="center"><b>Coupon Code</th>
<td align="center"><b>Date</th>
<td align="center"><b>Reffer By</th>
<td align="center"><b>Monthly Limit</th>
<td align="center"><b>Coupon Amount<b></th>
<td align="center"><b>Used Amount<b></th>
<td align="center"><b>Remain Amount<b></th>



</tr>
<?php

$sql7="SELECT * FROM `coupon`  WHERE `spid`='$_SESSION[spid]' AND `st`='1' ORDER BY  `coupon_id` DESC";
$res7=mysqli_query($con,$sql7);
while($row7=mysqli_fetch_array($res7)){
	$c++;
	
unset($remain_amount);	
$coupon_amount+=$row7[coupon_amount];
$used_amount+=$row7[used_amount];

$remain_amount = ($row7[coupon_amount]-$row7[used_amount]);
if($remain_amount<0){$remain_amount=0;}

$rest_amount+=$remain_amount;
?>
<tr >
<td  align="center"><?=$c?></td>
<td  align="center"><?=$row7[coupon_code]?></td>
<td  align="center"><?=$row7[transfer_date]?></td>
<td  align="center"><?=$row7[refer_by]?></td>
<td  align="center"><?=$row7[monthly_limit]?></td>
<td  align="center"><?=$row7[coupon_amount]?></td>
<td  align="center"><?=$row7[used_amount]?></td>
<td  align="center"><?=$remain_amount?></td>



</tr>
<?php } ?>

<tr >
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"><?=$coupon_amount?></td>
<td  align="center"><?=$used_amount?></td>
<td  align="center"><?=$rest_amount?></td>

</tr>

		</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>