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
    <h1 class="dash-title">Daily Income</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Benefit</a></li>
          <li><a href="#" class="active">Daily Income Details</a></li>
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


	<form action="" method="post" name="newform" class="form-horizontal"  onsubmit="return validate_form(this);" >
      <table class="table table-bordered">


<tr>
<td>From Date</td>
<td>
<input type="text" name="start_date"  id="start_date" value='' class="form-control" style="width:200px" readonly  />
<span id="cal3">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
<script type="text/javascript">
var cal = new Zapatec.Calendar.setup({

inputField:"start_date",
ifFormat:"%Y-%m-%d",
button:"cal3",
showsTime:false

});

</script>

</td>
</tr>


<tr>
<td>To Date</td>
<td>
<input type="text" name="end_date"  id="end_date" value='' class="form-control" style="width:200px" readonly  />
<span id="cal4">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
<script type="text/javascript">
var cal1 = new Zapatec.Calendar.setup({

inputField:"end_date",
ifFormat:"%Y-%m-%d",
button:"cal4",
showsTime:false

});

</script>
</td>
</tr>


<tr >
<td colspan="2">
<br/>
               <center> <input type="submit" name='call_submit' class="btn btn-md bg-purple"/> </center>
</td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

</table>

</form>




            <table class="table table-bordered">
           <tr >
<td align="center"><b>Sr.<b></th>
<td align="center"><b>Date</th>
<td align="center"><b>Referral</th>
<td align="center"><b>Matching<b></th>
<td align="center"><b>Level<b></th>
<td align="center"><b>TDS<b></th>
<td align="center"><b>Donation<b></th>
<td align="center"><b>Total<b></th>
<!--
<td align="center"><b>Statement</th>
-->
<td align="center"><b>Payout Status<b></th>


</tr>
<?php
if($_POST[call_submit]==""){
$sql7="SELECT * FROM `payout`  WHERE `spid`='$_SESSION[spid]'  AND `endt`='$today_date' ORDER BY  `payout_id` DESC";
}else{
$sql7="SELECT * FROM `payout`  WHERE `spid`='$_SESSION[spid]'  AND `endt`>='$_POST[start_date]' AND `endt`<='$_POST[end_date]' ORDER BY  `payout_id` DESC";
}
$res7=mysqli_query($con,$sql7);
while($row7=mysqli_fetch_array($res7)){
	$c++;




$binary_income+=$row7[binary_income];
$level_income+=$row7[level_income];
$referral_income+=$row7[referral_income];

$td+=$row7[td];
$sc_amount+=$row7[sc_amount];
$total_amt+=$row7[total_amt];

if($row7[gen_payout_id]==0){
$msg="Pending";
}else{
$msg="Generated";
}

?>
<tr >
<td  align="center"><?=$c?>.</td>
<td  align="center"><?=$row7[endt]?></td>

<td  align="center"><?=$row7[referral_income]?></td>
<td  align="center"><?=$row7[binary_income]?></td>
<td  align="center"><?=$row7[level_income]?></td>

<td  align="center"><?=$row7[td]?></td>
<td  align="center"><?=$row7[sc_amount]?></td>
<td  align="center"><?=$row7[total_amt]?></td>

<!--
<td  align="center"><a href="member_payout.php?payout_id=<?=$row7[payout_id]?>" target="blank">Statement</a></td>
<td  align="center"><a href="payout_carry_forward_details.php?spid=<?=$_SESSION[spid]?>&endt=<?=$row7[endt]?>&st=4">Carry Forward Details</a></td>
-->

<td  align="center"><?=$msg?></td>
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
<td  align="center" colspan="2">Total</td>
<td  align="center"><?=$referral_income?></td>
<td  align="center"><?=$binary_income?></td>
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
