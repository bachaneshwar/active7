<?php
include("include/top.php");
include("include/menu.php");

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->
<div id="content-panel" style="background-color:white;">
<div class="container-fluid">

<script type="text/javascript">
function validate_form(form){
if( form.elements['start_date'].value=="" ) { alert("Please type From Date"); form.elements['start_date'].focus(); return false; }
if( form.elements['end_date'].value=="" ) { alert("Please type To Date"); form.elements['end_date'].focus(); return false; }
}
</script>

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Weekly Income</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Benefit</a></li>
          <li><a href="#" class="active">Weekly Payout Details</a></li>
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
<td align="center"><b>Start Dt</th>
<td align="center"><b>End Dt</th>
<td align="center"><b>Referral</th>
<td align="center"><b>Matching<b></th>
<td align="center"><b>Level<b></th>
<td align="center"><b>TDS<b></th>
<td align="center"><b>Donation<b></th>
<td align="center"><b>Net Amount<b></th>
<td align="center"><b>Statement<b></th>

</tr>

<?php


$sql7="SELECT * FROM `payout`  WHERE `gen_payout_id`!='0' AND `spid`='$_SESSION[spid]' GROUP BY `gen_payout_id` ORDER BY  `gen_payout_id` DESC";
$res7=mysqli_query($con,$sql7);
while($row7=mysqli_fetch_array($res7)){
$c++;


$des=$my->total_row($con,generate_payout,gen_payout_id,$row7[gen_payout_id]);


$sql8="SELECT SUM(`binary_income`),SUM(`level_income`),SUM(`referral_income`),SUM(`td`),SUM(`sc_amount`),SUM(`total_amt`)  FROM `payout`  WHERE `gen_payout_id`='$row7[gen_payout_id]' AND `spid`='$_SESSION[spid]'";
$res8=mysqli_query($con,$sql8);
$row8=mysqli_fetch_array($res8);


$binary_income+=$row8[0];
$level_income+=$row8[1];
$referral_income+=$row8[2];
$td+=$row8[3];
$sc_amount+=$row8[4];
$total_amt+=$row8[5];

?>
<tr >
<td  align="center"><?=$c?>.</td>
<td  align="center"><?=$des[start_date]?></td>
<td  align="center"><?=$des[end_date]?></td>

<td  align="center"><?=$row8[2]?></td>
<td  align="center"><?=$row8[0]?></td>
<td  align="center"><?=$row8[1]?></td>

<td  align="center"><?=$row8[3]?></td>
<td  align="center"><?=$row8[4]?></td>
<td  align="center"><?=$row8[5]?></td>


<td  align="center"><a href="member_payout.php?payout_id=<?=$row7[gen_payout_id]?>" target="blank">Statement</a></td>



<!--
<?
if($row7[st]=='1'){
?>
&nbsp;&nbsp;&nbsp;&nbsp; <a href="payment_details.php?payout_id=<?=$row7[payout_id]?>&st=4"  style="text-decoration:none">Payment View</a>
<? } ?>
</td>
-->

</tr>
<?php } ?>

<tr >
<td  align="center" colspan="3">Total</td>
<td  align="center"><?=$binary_income?></td>
<td  align="center"><?=$referral_income?></td>
<td  align="center"><?=$level_income?></td>
<td  align="center"><?=$td?></td>
<td  align="center"><?=$sc_amount?></td>
<td  align="center"><?=$total_amt?></td>
<td  align="center"></td>
</tr>

		</table>
            </div> <!-- /table-responsive -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Footer -->
<?php include("include/footer.php"); ?>
