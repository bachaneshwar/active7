<?php
include_once("../ctrl_panel/lib_panel/config.php");
session_start();
$spid=$_REQUEST[spid];
$sel_sp = "select * from `member` WHERE `spid`='$spid'" ;
$res_sp = mysqli_query($con,$sel_sp) ;
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

$sre="SELECT * FROM `package` WHERE `package_id`='$row_sp[package_id]'";
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

<link href="member/./Welcome Letter_files/thm-christmas.min.css" rel="stylesheet" type="text/css">

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
<img id="imgLogo" src="active7_logo.jpeg" style="height:60px;border-width:0px;">
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
<p class="para"><b>Dear Member</b><br>

Welcome to Active7.in a Service Industry powered by  Adrika 24/7 forwarded to you on behalf of our company and we are extremely proud and happy you as Member (Service Reciever)

We believe that each of our Member must be accepted and efforts must be made to make them comfortable so that they can make their best performance. Our best source of business is from word of mouth of valued Member like you who are giving us opportunity to serve a big group of customers and helping us by giving window in every single house of India and making active7.in a big success.

It’s our Member  belief and practice that we treat each other as we like to be treated, so rest assured ,you are at the right place , we assure you great success ahead.
 During registration member agreed with terms and conditions of the  Companyas aplicable .
Invoice details</p>
<p class="para"><br/></p>


</td>
</tr>


<tr>
<td style="text-align: left">
<table style="border:1px solid black" cellspacing="2" cellpadding="2">
Invoice No:
<tr>
<td style="border:1px solid black">&nbsp;Date Of Registration</td>
<td style="border:1px solid black">&nbsp;<?=$renewal4?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Invoice No:</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp[invoice_vch_no]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;User ID</td>
<td style="border:1px solid black">&nbsp;<?=$spid?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Name</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp[sname]?></td>
</tr>

<!--
<tr>
<td style="border:1px solid black">&nbsp;Password</td>
<td style="border:1px solid black">&nbsp;<?=$row_sp[pass]?></td>
</tr>
-->



<?
$csel_sp = "select * from `member` WHERE `spid`='$row_sp[sponsorid]'" ;
$cres_sp = mysqli_query($con,$csel_sp) ;
$crow_sp = mysqli_fetch_array($cres_sp);
?>

<tr>
<td style="border:1px solid black">&nbsp;Sponsor Id: <?=$row_sp[sponsorid]?></td>
<td style="border:1px solid black">&nbsp;Name: <?=$crow_sp[sname]?></td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;GST Number:</td>
<td style="border:1px solid black">&nbsp;19ASKPB2083Q1Z8</td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Servise Fees (1 Year): </td>
<td style="border:1px solid black">&nbsp;:Rs- 118/-</td>
</tr>

<tr>
<td style="border:1px solid black">&nbsp;Total Amount: </td>
<td style="border:1px solid black">&nbsp;:Rs- 118/- (One Hundred Eighteen Only)</td>
</tr>


<!--
<tr>
<td style="border:1px solid black">&nbsp;Package Details :</td>
<td style="border:1px solid black">&nbsp;<?=$des[package_name]?></td>
</tr>
-->

</table>
</td>
</tr>


<tr>
<td style="padding-left: 5px; padding-right: 5px">




<p class="para"><br/></p>
<p class="para"></p>
<p>
</p>
<p class="bold-text para">
<span id="spCompanyName" style="font-family:Comic Sans MS;font-size: 20px; color: #466f1e;">Welcome to 'Active7' Mission</span></p>
<br>
<p class="para">
We are looking forward to a long-term relationship with Adrika24/7
</p><p class="para">
Thanks & Regards</p>
<p class="bold-text para">
	<b>Adrika24/7  Team</b>
</p>
<p><b>Note  :  This is computer generated receipt does not required signature. By Buying this Sevice you in agreement to the terms and conditions of Adrika24/7 also mentioned on the website.</b></p>
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
<center>
<div class="noprint tdControl buttons">
<a onclick="window.print();" id="btnPrint" class="positive" usesubmitbehavior="False" href="javascript:__doPostBack('btnPrint','')">Print</a>
<a id="btnPrint" class="btn btn-success"  usesubmitbehavior="False" href="register.php?m=7">Back</a>
</center>
</div>

</div>
</td>
</tr>
</tbody></table>




</body></html>
