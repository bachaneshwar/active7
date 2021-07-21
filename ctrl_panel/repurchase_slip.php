<?php
include("include/conn.php");
session_start();

$zsel_sp = "select * from `repurchase_details` WHERE `rep_detid`='$_GET[pid]'" ;
$zres_sp = mysqli_query($con,$zsel_sp) ;
$zrow_sp = mysqli_fetch_array($zres_sp);

$spid=$zrow_sp[spid];
$sel_sp = "select * from `member` WHERE `spid`='$spid'" ;
$res_sp = mysqli_query($con,$sel_sp) ;
$row_sp = mysqli_fetch_array($res_sp);
$date=date("Y-m-d");

$renewal1=explode("-",$date);
$renewal2=trim($renewal1[2])."/".trim($renewal1[1])."/".trim($renewal1[0]);


$doj=$zrow_sp[purchase_dt];
$renewal3=explode("-",$doj);
$renewal4=trim($renewal3[2])."/".trim($renewal3[1])."/".trim($renewal3[0]);



$sel_sp1 = "select * from `company_address`" ;
$res_sp1 = mysqli_query($con,$sel_sp1) ;
$row_sp1 = mysqli_fetch_array($res_sp1);

$sre="SELECT * FROM `repurchase_package` WHERE `repurchase_package_id`='$zrow_sp[repurchase_package_id]'";
$ret=mysqli_query($con,$sre);
$des=mysqli_fetch_array($ret);	

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0037)http://ur4tune.com/WelcomeLetter.aspx -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>
&nbsp;&nbsp;Welcome Letter
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
<tbody><tr>
<td width="15%" style="height: 50px; vertical-align: top">
<img id="imgLogo" src="./Welcome Letter_files/logo.png" style="height:60px;border-width:0px;">
</td>
<td class="width-50">
&nbsp;</td>
<td>
<p style="float: right">
<span id="spCompanyName" style="font-family: Georgia, Times New Roman, Times, serif;
font-size: large; color: #5e8ea5; font-weight: bold"><?=$row_sp1[com_name]?></span>
<br>
<span id="spCompanyAddr"><?=$row_sp1[address]?>, PinCode- <?=$row_sp1[pincode]?>, <?=$row_sp1[state]?>. Contact No. <?=$row_sp1[contact_no]?>. URL - <?=$row_sp1[url]?></span>
<br>
<span id="spCompanyContacts"></span>&nbsp;<span id="spCompanyEmail"></span>
<br>
<span id="spCompanyURL" class="display-none"><?=$row_sp1[ur]?></span>
</p>
</td>
</tr>
</tbody></table>
</td>
</tr>




<tr>
<td style="padding-left: 5px; padding-right: 5px">
<p class="para"><br/></p>
<p class="para"></p>
<p class="para"><br/></p>


</td>
</tr>


<tr>
<td style="text-align: left">
<table style="border:1px solid black" cellspacing="2" cellpadding="2">

<tr>
<td style="border:1px solid black">&nbsp;Date Of Purchase</td>
<td style="border:1px solid black">&nbsp;<?=$renewal4?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Member ID</td>
<td style="border:1px solid black">&nbsp;<?=$spid?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Name</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp[sname]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Package Details :</td>
<td style="border:1px solid black">&nbsp;<?=$des[repurchase_package_name]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Package No:</td>
<td style="border:1px solid black">&nbsp;<?=$zrow_sp[package_no]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Total Amount :</td>
<td style="border:1px solid black">&nbsp;<?=round($des[dp_rate]*$zrow_sp[package_no])?></td>
</tr>

</table>
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
<a id="btnPrint" class="positive" usesubmitbehavior="False" href="sell_package.php">Back</a>

</div>

</div>
</td>
</tr>
</tbody></table>




</body></html>