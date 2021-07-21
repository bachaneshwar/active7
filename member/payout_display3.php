<?php 
include("include/top.php");
include("include/menu.php");

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->
<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Payout Details</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Benefit</a></li>
          <li><a href="#" class="active">Repurchase Payout Details</a></li>
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
<td align="center"><b>Start Date</th>
<td align="center"><b>End Date</th>
<td align="center"><b>Own Commission<b></th>
<td align="center"><b>Team Commission<b></th>
<td align="center"><b>TDS<b></th>
<td align="center"><b>Admin<b></th>
<td align="center"><b>Net Amount<b></th>
<!--<td align="center"><b>Statement</th>

<th >Status</th>
-->

</tr>
<?php

$sql7="SELECT * FROM `repurchase_payout`  WHERE `spid`='$_SESSION[spid]' AND `total_amt`!='0' ORDER BY  `payout_id` DESC";
$res7=mysqli_query($con,$sql7);
while($row7=mysqli_fetch_array($res7)){
	$c++;
	$deduct=$row7[td]+$row7[sc_amount];
	
$direct_income+=$row7[direct_income];
$downline_income+=$row7[downline_income];
$td+=$row7[td];
$sc_amount+=$row7[sc_amount];
$total_amt+=$row7[total_amt];

?>
<tr >
<td  align="center"><?=$c?></td>
<td  align="center"><?=$row7[stdt]?></td>
<td  align="center"><?=$row7[endt]?></td>
<td  align="center"><?=$row7[direct_income]?></td>
<td  align="center"><?=$row7[downline_income]?></td>
<td  align="center"><?=$row7[td]?></td>
<td  align="center"><?=$row7[sc_amount]?></td>
<td  align="center"><?=$row7[total_amt]?></td>


<!--<td  align="center"><a href="member_payout.php?payout_id=<?=$row7[payout_id]?>" target="blank">Statement</a></td>

<td  align="center"><a href="payout_carry_forward_details.php?spid=<?=$_SESSION[spid]?>&endt=<?=$row7[endt]?>&st=4">Carry Forward Details</a></td>
<td  align="center"><?=$msg?>
<?
if($row7[st]=='1'){
?>
&nbsp;&nbsp;&nbsp;&nbsp; <a href="payment_details.php?payout_id=<?=$row7[payout_id]?>&st=4"  style="text-decoration:none">Payment View</a>
<? } ?>
-->
</td>

</tr>
<?php } ?>

<tr >
<td  align="center"></td>
<td  align="center"></td>
<td  align="center"></td>

<td  align="center"><?=$direct_income?></td>
<td  align="center"><?=$downline_income?></td>
<td  align="center"><?=$td?></td>
<td  align="center"><?=$sc_amount?></td>
<td  align="center"><?=$total_amt?></td>
</tr>

		</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>