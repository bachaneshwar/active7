<?php 
include("include/top.php");
include("include/menu.php");

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->
<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Refferal Coupon</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i>Refferal Coupon</a></li>
          <li><a href="#" class="active">Details</a></li>
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
<td align="center"><b>Used By</th>
<td align="center"><b>Name</th>
<td align="center"><b>Coupon Amount<b></th>




</tr>
<?php

$sql7="SELECT * FROM `coupon`  WHERE `refer_by`='$_SESSION[spid]' AND `st`='1' ORDER BY  `coupon_id` DESC";
$res7=mysqli_query($con,$sql7);
while($row7=mysqli_fetch_array($res7)){
	$c++;
	
unset($remain_amount);	
$coupon_amount+=$row7[coupon_amount];


$sqll="select * from `member` where `spid`='$row7[spid]' ";
$res1=mysqli_query($con,$sqll);
$row1=mysqli_fetch_array($res1);

?>
<tr >
<td  align="center"><?=$c?></td>
<td  align="center"><?=$row7[coupon_code]?></td>
<td  align="center"><?=$row7[transfer_date]?></td>
<td  align="center"><?=$row1[spid]?></td>
<td  align="center"><?=$row1[sname]?></td>
<td  align="center"><?=$row7[coupon_amount]?></td>




</tr>
<?php } ?>

<tr >
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"><?=$coupon_amount?></td>
</tr>

		</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>