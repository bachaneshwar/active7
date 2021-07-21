<?php
include("include/conn.php");
session_start();


$slipno=$_GET[slipno];
$sel_sp = "select * from `plot_booking` WHERE `plot_bkId`='$slipno'" ;
$res_sp = mysqli_query($con,$sel_sp) ;
$row_sp = mysqli_fetch_array($res_sp);

$sel_sp11 = "select * from `emi_payment` WHERE `plot_bkId`='$row_sp[plot_bkId]' AND `emi`='0'" ;
$res_sp11 = mysqli_query($con,$sel_sp11) ;
$row_sp11 = mysqli_fetch_array($res_sp11);


$date=date("Y-m-d");

$renewal1=explode("-",$date);
$renewal2=trim($renewal1[2])."/".trim($renewal1[1])."/".trim($renewal1[0]);


$doj=$row_sp[booking_date];
$renewal3=explode("-",$doj);
$renewal4=trim($renewal3[2])."/".trim($renewal3[1])."/".trim($renewal3[0]);

$emi=$row_sp11[next_emidt];
$renewal31=explode("-",$emi);
$renewal41=trim($renewal31[2])."/".trim($renewal31[1])."/".trim($renewal31[0]);

$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);


$srow=$my->total_row($con,member,spid,$row_sp[spid]);
$prow=$my->total_row($con,plot,plot_id,$row_sp[plot_id]);
$phrow=$my->total_row($con,phase,phase_id,$prow[phase_id]);
$arow=$my->total_row($con,area,area_id,$prow[area_id]);

$plotrow=$my->total_row($con,plot_epin,plot_bkId,$row_sp[plot_bkId]);

$payrow=$my->total_row($con,payment_method,pay_method_id,$row_sp11[pay_method_id]);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://ur4tune.com/WelcomeLetter.aspx -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
&nbsp;&nbsp;Booking Slip
</title>

<script type="text/javascript" language="javascript" src="./Welcome Letter_files/functions.js"></script>

<style type="text/css">
#tbLetter{font-family:Arial;font-size:12px}
</style>

<link href="./Welcome Letter_files/thm-christmas.min.css" rel="stylesheet" type="text/css">

<!--[if !IE 7]>
<style type="text/css">
#wrapper-page {display:table;height:100%}
</style>
<![endif]-->

<style type="text/css">
img, div, li, span{ behavior: url(iepngfix.htc) }
</style>

<script src="./Welcome Letter_files/jquery-1.3.2.optimized.js" type="text/javascript"></script>
<script src="./Welcome Letter_files/functions.optimized.js" type="text/javascript"></script>
<script src="./Welcome Letter_files/jquery.blockUI.optimized.js" type="text/javascript"></script>

</head>
<body style="background: #fff">


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



<table cellspacing="0" cellpadding="2" border="0" width="100%">
<tbody><tr>
<td>
<center>
<table id="tbLetter" align="center" cellspacing="0" cellpadding="5" style="font-family: Verdana;
width: 670px;" class="formtable">
<tbody>

<tr>
<td style="border-bottom: black 1px solid; text-align: right">
<span id="lbldate" class="label" style="font-family:Verdana;font-size:11px;">Date: <?=$renewal2?></span></td>
</tr>
<tr>
<td style="border-bottom: 4px double #666666; padding: 10px">
<table width="100%" border="0" cellspacing="0" cellpadding="4" align="center">
<tbody>
<tr>

<td width="15%" style="height: 50px; vertical-align: top">
<img id="imgLogo" src="./Welcome Letter_files/logo.png" style="height:60px;border-width:0px;">
</td>

<td class="width-50"></td>
<td>
<p >
<span id="spCompanyName" style="font-family: Georgia, Times New Roman, Times, serif;
font-size: large; color: #5e8ea5; font-weight: bold"><?=$row_sp1[com_name]?></span>
<br>
<span id="spCompanyAddr"><?=$row_sp1[address]?>, PinCode- <?=$row_sp1[pincode]?>, <?=$row_sp1[state]?>. <br/>Contact No. <?=$row_sp1[contact_no]?>. URL - <?=$row_sp1[url]?></span>
<br>

</p>
</td>
</tr>
</tbody></table>
</td>
</tr>

<tr>
<td style="padding-left: 5px; padding-right: 5px">
<center>
<br/>
<span id="spCompanyName" style="font-family:Comic Sans MS;font-size: 20px; color: #466f1e; font-weight: bold">Online  Booking Application Confirmation</span> <br/><br/>
<!--<span id="spCompanyName" style="font-family:Comic Sans MS;font-size: 36px; color: #466f1e; font-weight: bold">Congratulations!! </span><br/><br/>-->
<span id="spCompanyName" style="font-family:Comic Sans MS;font-size: 16px; color: #466f1e; font-weight: bold">You have Booked Up Successfully!</span>
</center>
</td>
</tr>

<tr>
<td style="padding-left: 5px; padding-right: 5px">
<p class="para"><br/></p>


</td>
</tr>


<tr>
<td style="text-align: left">
<table style="border:1px solid black" cellspacing="2" cellpadding="2">

<tr>
<td style="border:1px solid black">&nbsp;Booking No</td>
<td style="border:1px solid black">&nbsp;<?php printf("%06d", $row_sp[plot_bkId]);?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Transaction No</td>
<td style="border:1px solid black">&nbsp;<?php printf("%06d", $row_sp11[emi_payId]);?></td>
</tr>


<tr>
<td style="border:1px solid black">&nbsp;Date Of Booking</td>
<td style="border:1px solid black">&nbsp;<?=$renewal4?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Member ID</td>
<td style="border:1px solid black">&nbsp;<?=$srow[spid]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Name</td>
<td style="border:1px solid black">&nbsp;<?=$srow[sname]?></td>
</tr>


<tr>
<td style="border:1px solid black">&nbsp;Phase</td>
<td style="border:1px solid black">&nbsp;<?=$phrow[phase_name]?></td>
</tr>


<tr>
<td style="border:1px solid black">&nbsp;Plot No</td>
<td style="border:1px solid black">&nbsp;<?=$prow[plot_name]?> (<?=$arow[area_name]?>)</td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Booking Amount</td>
<td style="border:1px solid black">&nbsp;Rs. <?=$row_sp11[payment_amt]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Payment By</td>
<td style="border:1px solid black">&nbsp;<?=$payrow[pay_method]?></td>
</tr>
<?
if($row_sp11[pay_method_id]==2){
?>
<tr>
<td style="border:1px solid black">&nbsp;Cheque No</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[cheque_no]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Cheque Date</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[cheque_date]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Bank Details</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[bankdtls]?></td>
</tr>
<? } ?>


<?
if($row_sp11[pay_method_id]==3){
?>
<tr>
<td style="border:1px solid black">&nbsp;Transaction No</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[transition_no]?></td>
</tr>
<? } ?>


<?
if($row_sp11[pay_method_id]==4 || $row_sp11[pay_method_id]==5){
?>
<tr>
<td style="border:1px solid black">&nbsp;Card No</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[card_no]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Card Holder</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[card_holder]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Card Details</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[card_details]?></td>
</tr>
<? } ?>


<tr>
<td style="border:1px solid black">&nbsp;Transaction Details</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp11[transactionDtls]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Next EMI Date</td>
<td style="border:1px solid black">&nbsp;<?=$renewal41?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;EMI No</td>
<td style="border:1px solid black">&nbsp;1</td>
</tr>

<!--
<tr>
<td style="border:1px solid black">&nbsp;Plot E-Pin</td>
<td style="border:1px solid black">&nbsp;<?=$plotrow[plotpin]?></td>
</tr>
-->

</table>
</td>
</tr>


<tr>
<td style="padding-left: 5px; padding-right: 5px">


<p class="para"></p>
<p>
</p>
<p class="bold-text para">
<br>
<p class="para">

</p><p class="para">
Thanks & Regards</p>
<p class="bold-text para">
<?=$row_sp1[com_name]?> Team
</p>
<p></p>
</td>
</tr>


<tr>
<td class="noprint">
<center>
<span id="lblerr" class="label"></span></center>
</td>
</tr>
</tbody></table>
</center>
</td>
</tr>
<tr>
<td>
&nbsp;</td>
</tr>
<tr>
<td>
&nbsp;</td>
</tr>
<tr>
<td>
<div id="pnlButton">

<div class="tdEmpty width-200">
&nbsp;
</div>
<div class="tdLabel width-100">
&nbsp;
</div>
<div class="noprint tdControl buttons">
<a onclick="window.print();" id="btnPrint" class="positive" usesubmitbehavior="False" href="javascript:__doPostBack('btnPrint','')">Print</a>
<?
if($_GET[sub]==1){
?>
<a id="btnPrint" class="positive" usesubmitbehavior="False" href="booking_slip_gen.php">Back</a>
<? } ?>
</div>

</div>
</td>
</tr>
</tbody></table>




</body></html>