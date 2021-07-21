<?php 
include("include/top.php");
include("include/menu.php");
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Payout</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Benefit</a></li>
          <li><a href="#" class="active"> Level Payout</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->


<div class="row">
    
    <!-- //////////////////////////////////////////////////// Responsvie Table Bordered -->
    <div class=" col-xs-12">
        <div class="panel">
            <div class="panel-heading">
                <h3> Payout</h3>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <div class="table-responsive">
            <table class="table table-bordered"> 
           <tr >
<th >Sr.</th>
<th >Start Date</th>
<th >End Date
</th>
<th >Total Earning</th>
<th >Total Deduction</th>
<th >Net Amount
</th>
<th >Statement
</th>
<!--
<th >Status
</th>
-->
</tr>
<?php
$sql7="SELECT * FROM `payout`  WHERE `spid`='$_SESSION[spid]' AND `total_amt`!='0' GROUP BY `endt` ORDER BY  `endt` DESC  ";
$res7=mysqli_query($con,$sql7);
while($row7=mysqli_fetch_array($res7)){
	$c++;
	$deduct=$row7[td]+$row7[sc_amount]+$row7[draft_charge]+$row7[rep_amt];
	

?>
<tr >
<td  align="center"><?=$c?></td>
<td  align="center"><?=$row7[stdt]?></td>
<td  align="center"><?=$row7[endt]?></td>
<td  align="center"><?=$row7[binary_amt]+$row7[direct_amt]+$row7[level_amt]?></td>
<td  align="center"><?=$deduct?></td>
<td  align="center"><?=$row7[total_amt]?></td>
<td  align="center"><a href="member_payout.php?payout_id=<?=$row7[payout_id]?>" target="blank">Statement</a></td>
<!--
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
<?php
}?>
		</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>