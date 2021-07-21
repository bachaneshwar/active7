<?php
include_once("../ctrl_panel/lib_panel/config.php");
session_start();
$spid=$_SESSION[spid];
$sel_sp = "select * from `member` WHERE `spid`='$spid'" ;
$res_sp = mysqli_query($con,$sel_sp);
$row_sp = mysqli_fetch_array($res_sp);
$date=date("Y-m-d");

$renewal1=explode("-",$date);
$renewal2=trim($renewal1[2])."/".trim($renewal1[1])."/".trim($renewal1[0]);


$doj=$row_sp[doj];
$renewal3=explode("-",$doj);
$renewal4=trim($renewal3[2])."/".trim($renewal3[1])."/".trim($renewal3[0]);



$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);

$sql_8="SELECT * FROM `generate_payout` WHERE `gen_payout_id`='$_GET[payout_id]'";
$res_8=mysqli_query($con,$sql_8);
$row_8=mysqli_fetch_array($res_8);



$sql8="SELECT * FROM `payout`  WHERE `spid`='$_SESSION[spid]' and `gen_payout_id`<='$row_8[gen_payout_id]' AND `gen_payout_id`!='0' GROUP BY `gen_payout_id`";
$res8=mysqli_query($con,$sql8);
$num8=mysqli_num_rows($res8);

$sql6="SELECT * FROM `generate_payout`  WHERE `gen_payout_id`<='$row_8[gen_payout_id]' GROUP BY `gen_payout_id`";
$res6=mysqli_query($con,$sql6);
$num6=mysqli_num_rows($res6);

$sql8="SELECT SUM(`binary_income`),SUM(`level_income`),SUM(`referral_income`),SUM(`td`),SUM(`sc_amount`),SUM(`total_amt`)  FROM `payout`  WHERE `gen_payout_id`='$row_8[gen_payout_id]' AND `spid`='$_SESSION[spid]'";
$res8=mysqli_query($con,$sql8);
$row8=mysqli_fetch_array($res8);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
Incentive Statement
</title>


<style type="text/css">
#tbReceipt{font-family:Arial;font-size:12px}
#tbReceipt table, tbody{max-width:100%}
#tbDetails td {padding:5px;}
</style>

<link href="./Incentive Statement_files/thm-christmas.min.css" rel="stylesheet" type="text/css">

<!--[if !IE 7]>
<style type="text/css">
#wrapper-page {display:table;height:100%}
</style>
<![endif]-->

<style type="text/css">
img, div, li, span{ behavior: url(iepngfix.htc) }
</style>

<script src="./Incentive Statement_files/jquery-1.3.2.optimized.js" type="text/javascript"></script>
<script src="./Incentive Statement_files/functions.optimized.js" type="text/javascript"></script>
<script src="./Incentive Statement_files/jquery.blockUI.optimized.js" type="text/javascript"></script>

</head>
<body style="background: #fff">
<form name="form1" method="post" action="payout_display.php" id="form1">


<script type="text/javascript">
//<![CDATA[
var theForm = document.forms['form1'];
if (!theForm) {
theForm = document.form1;
}
function __doPostBack(eventTarget, eventArgument) {
if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
theForm.__EVENTTARGET.value = eventTarget;
theForm.__EVENTARGUMENT.value = eventArgument;
theForm.submit();
}
}
//]]>
</script>


<table id="tbReceipt" width="750" border="0" cellspacing="0" cellpadding="0" align="center" style="padding: 20px">
<tbody><tr>
<td style="text-align: right">
<span id="lbldate" class="label" style="font-family:Verdana;font-size:11px;">Date: <?=$renewal2?></span></td>
</tr>
<tr>
<td>
<center>
<span id="spError" class="errmsg"></span>
<table id="tbVoucher" width="100%" border="0" cellspacing="0" cellpadding="0" align="center" style="border: 5px double #000">
<tbody><tr>
<td style="border-bottom: 4px double #000">
<table id="tbHeader" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tbody><tr>
<td width="15%" style="height: 50px; vertical-align: top">
<img src="../company_logo/logo.png" id="imgLogo" alt="Logo" style="height:60px;border-width:0px;">
<br>
</td>
<td style="height: 50px;">
<p style="float: right">
<span id="spCompanyName" style="font-family: Georgia, Times New Roman, Times, serif;
font-size: large; color: #5e8ea5; font-weight: bold"><?=$row_sp1[com_name]?></span>
<br>
<span id="spCompanyAddr"><?=$row_sp1[address]?>, PinCode- <?=$row_sp1[pincode]?>, <?=$row_sp1[state]?>. Contact No. <?=$row_sp1[contact_no]?>. URL - <?=$row_sp1[url]?></span>
<br>
<span id="spCompanyContacts"></span>&nbsp;<span id="spCompanyEmail"></span>
<br>
<span id="spCompanyURL" class="display-none"><?=$row_sp1[url]?></span>
</p>
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td style="border-bottom: 4px double #000; text-align: center; color: #000" class="bgtable">
<span id="spTitle" style="font-size: large; padding: 3px; text-align: center"> Commission Statement</span>
</td>
</tr>
<tr>
<td>
<table id="tbDetails" width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
<tbody><tr>
<td class="bold-text bbdr lbdr rbdr" style="width: 50%">
<center>
<span id="spIdentity" class="bold-text black">Associate</span>&nbsp;Details</center>
</td>
<td class="bold-text bbdr rbdr" style="width: 50%;">
<center>
Commission Details</center>
</td>
</tr>
<tr>
<td class="vtop black-border">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="align-left">
<tbody><tr>
<td class="bold-text" style="width: 20%">
<span id="spIdentity1" class="bold-text black">Associate</span>&nbsp;Name</td>
<td class="align-left">
:&nbsp;<span id="lblName" class="label"><?=$row_sp[sname]?></span></td>
</tr>
<tr>
<td class="bold-text">
<span id="spIdentity2" class="bold-text black">Associate</span>&nbsp;ID</td>
<td class="align-left">
:&nbsp;<span id="lblMemno" class="label"><?=$spid?></span></td>
</tr>
<tr>
<td class="bold-text vtop">
Address</td>
<td class="align-left">
:&nbsp;<span id="lblAddr" class="label"><?=$row_sp[addr]?></span></td>
</tr>
<tr>
<td class="bold-text">
Contact No.</td>
<td class="align-left">
:&nbsp;<span id="lblmob" class="label"><?=$row_sp[mob]?></span></td>
</tr>
<tr>
<td class="bold-text">
State</td>
<td class="align-left">
:&nbsp;<span id="lblState" class="label"><?=$row_sp[state]?></span></td>
</tr>
<tr>
<td class="bold-text">
Pincode</td>
<td class="align-left">
:&nbsp;<span id="lblPincode" class="label"><?=$row_sp[pincode]?></span></td>
</tr>
</tbody></table>
</td>
<td class="vtop bbdr rbdr" colspan="4">
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="align-left">
<tbody><tr>
<td class="bold-text" style="width: 35%">
Company Commission No.</td>
<td class="align-left">
:&nbsp;<span id="lblPayNo" class="label"><?=$num6?></span></td>
</tr>
<tr>
<td class="bold-text" style="width: 40%">
<span id="mempayno" class="label">Associate Commission No.</span></td>
<td class="align-left">
:&nbsp;<span id="lblmempay" class="label"><?=$num8?></span></td>
</tr>
<tr>
<td class="bold-text">
Period</td>
<td class="align-left">
:&nbsp;<span id="lblStart" class="label"><?=$row_8[start_date]?></span>&nbsp;<b>to</b>&nbsp;<span id="lblEnd" class="label"><?=$row_8[end_date]?></span></td>
</tr>
<tr>
<td class="bold-text" style="width: 40%">
<span id="mempayno" class="label">Commission Date</span></td>
<td class="align-left">
:&nbsp;<span id="lblmempay" class="label"><?=$row_8[gen_date]?></span></td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>
</td>
</tr>
<tr>
<td>
<center style="font-size: 12; font-weight: bold; padding: 3px">
Commission DETAILS</center>
</td>
</tr>
<tr>
<td>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="align-left">
<tbody><tr>
<td style="width: 50%" colspan="2">
<table id="tblearning" cellspacing="0" cellpadding="4" border="0" style="width:100%;border-collapse:collapse;">
<tbody><tr id="TableRow1">
<td id="TableCell1" class="align-center bold-text tbdr bbdr rbdr lbdr" style="width:50%;">Earning(s)</td><td id="TableCell2" class="align-center bold-text tbdr bbdr rbdr" style="width:50%;">Amount</td>
</tr>

<tr>
<td class="left bold-text lbdr" style="padding:5px;">Referral Income</td><td class="lbdr rbdr" style="padding:5px;text-align:right;">
<?=$row8[2]?></td>
</tr>
<tr>
<td class="left bold-text lbdr" style="padding:5px;">Matching Income</td><td class="lbdr rbdr" style="padding:5px;text-align:right;">
<?=$row8[0]?></td>
</tr>
<tr>
<td class="left bold-text lbdr" style="padding:5px;">Self Income</td><td class="lbdr rbdr" style="padding:5px;text-align:right;">
<?=$row8[1]?></td>
</tr>
<tr>
<td class="left tbdr bold-text bbdr lbdr" style="padding:5px;">Total Income</td><td class="right tbdr lbdr bbdr bold-text" style="padding:5px;text-align:right;">
<?=$row8[0]+$row8[1]+$row8[2]?></td>
</tr>
</tbody></table>
</td>
<td style="width: 50%" colspan="2">
<table id="tbldeduction" cellspacing="0" cellpadding="4" border="0" style="width:100%;border-collapse:collapse;">
<tbody><tr id="TableRow2">
<td id="TableCell5" class="align-center bold-text tbdr bbdr rbdr">Deduction(s)</td><td id="TableCell6" class="align-center bold-text tbdr bbdr rbdr">Amount</td>
</tr>

<tr>
<td class="left bold-text" style="padding:5px;">TDS Charge</td><td class="lbdr rbdr" style="padding:5px;text-align:right;"><?=$row8[3]?></td>
</tr>
<tr>
<td class="left bold-text" style="padding:5px;">Donation Charge</td><td class="lbdr rbdr" style="padding:5px;text-align:right;"><?=$row8[4]?>
</td>
</tr>
<tr>
<td class="left bold-text" style="padding:5px;"><br/></td><td class="lbdr rbdr" style="padding:5px;text-align:right;"></td>
</tr>

<tr>
<td class="left tbdr bold-text bbdr lbdr" style="padding:5px;">Total</td><td class="right tbdr lbdr bbdr bold-text rbdr" style="padding:5px;text-align:right;">
<?=$row8[3]+$row8[4]?></td>
</tr>
</tbody></table>
</td>
</tr>

<tr>
<td class="bold-text black vtop left lbdr tbdr bbdr rbdr" style="width:36%;padding: 3px" colspan="2">
Net Payable</td>
<td class="vtop right tbdr bbdr rbdr" style="padding-right: 3px; text-align: right">
&nbsp;<span id="lblNetAmt" style="font-size:15px;color:#990000"><b><?=$row8[5]?></b></span></td>
</tr>
<tr>
<td colspan="13" class="bold-text black lbdr">
<span class="errmsg">*</span> NOTE: This is a Computer generated statement, no signature
&nbsp;&nbsp;is required.</td>
</tr>
<tr>
<td class="bold-text vtop left lbdr" style="height: 22px">
</td>
<td style="height: 22px">
&nbsp;</td>
</tr>
<tr>
<td class="bold-text vtop left lbdr">
</td>
<td>
&nbsp;</td>
</tr>
<tr>
<td class="bold-text vtop left lbdr">
</td>
<td>
&nbsp;</td>
</tr>
</tbody></table>
</td>
</tr>
</tbody></table>

</center>
</td>
</tr>
</tbody></table>
<br>
<center>
<div id="pnlButton">

<div class="tdEmpty width-200">
</div>
<div class="tdLabel width-200">
</div>
<div class="tdControl buttons width-150">
<a onclick="window.print();" id="lnkPrint" class="positive" href="javascript:__doPostBack('lnkPrint','')">Print</a>

</div>

</div>
</center>
</form>


</body></html>