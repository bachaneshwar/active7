<?php 
include("include/top.php");
include("include/menu.php");



$zsel_bin = "select * from `binary_level` where `spid`='$_SESSION[spid]'" ;
$zres_bin = mysqli_query($con,$zsel_bin);
$zrow_bin = mysqli_fetch_array($zres_bin) ;

?>


<style type="text/css">
img{
border:0px;
}	
</style>
<script type="text/javascript" src="js/ajax-dynamic-content.js"></script>
<script type="text/javascript" src="js/ajax.js"></script>
<script type="text/javascript" src="js/ajax-tooltip.js">
/************************************************************************************************************
(C) www.dhtmlgoodies.com, June 2006

This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.	

Terms of use:
You are free to use this script as long as the copyright message is kept intact. However, you may not
redistribute, sell or repost it without our permission.

Thank you!

www.dhtmlgoodies.com
Alf Magne Kalleland

************************************************************************************************************/	
</script>	


<link rel="stylesheet" href="css/ajax-tooltip.css" media="screen" type="text/css">
<!--
<link rel="stylesheet" href="css/ajax-tooltip-demo.css" media="screen" type="text/css"> 
-->
<?php

$sel_bin = "select * from `binary_level` where `spid`='$_POST[srch]'" ;
$res_bin = mysqli_query($con,$sel_bin);
$num_bin = mysqli_num_rows($res_bin);
if($num_bin==0){
if($_GET[id]){
$id=base64_decode($_GET[id]);
}
else{
$id =$_SESSION[spid];
}
}else{
$id = "$_POST[srch]";
$row_bin = mysqli_fetch_array($res_bin) ;

$sel_bin_id2 = "select `binary` from `binary_level` where `spid`='$id'" ;
$res_bin_id2 = mysqli_query($con,$sel_bin_id2) ;
$row_bin_id2 = mysqli_fetch_array($res_bin_id2) ;


if($row_bin[level]<=$zrow_bin[level]){
$id =$_SESSION[spid];
}
 
}



/*Left Right calculation start*/
$sel_bin_id = "select `binary` from `binary_level` where `spid`='$id'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
//print_r($row_bin_id) ;
$left_pt = $row_bin_id[0]."L" ;
$sel_left_calc = "select * from `binary_level` where `binary` LIKE '$left_pt%'" ;
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
$leftno = $num_left_calc ;

$right_pt = $row_bin_id[0]."R" ;
$sel_right_calc = "select * from `binary_level` where `binary` LIKE '$right_pt%'" ;
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_num_rows($res_right_calc) ;
$rightno = $num_right_calc ;



$strong_pt = $row_bin_id[0]."M" ;
$sel_strong_calc = "select * from `binary_level` where `binary` LIKE '$strong_pt%'" ;
$res_strong_calc = mysqli_query($con,$sel_strong_calc) ;
$num_strong_calc = mysqli_num_rows($res_strong_calc) ;
$strongno = $num_strong_calc ;


/*Left Right calculation end*/
$sq4="SELECT * FROM `member` WHERE `spid`='$id'";
$rr=mysqli_query($con,$sq4);
$step1=mysqli_fetch_array($rr);
if($step1[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step1[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step1[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step1[member_status]=="3"){
$img="images1/metal logo.png";
}




$first_sel_left_calc1="Select * from `binary_level` bin,`member` mat WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%'AND mat.member_status='1'";
$first_res_left_calc1 = mysqli_query($con,$first_sel_left_calc1) ;
$first_num_left_calc1 = mysqli_num_rows($first_res_left_calc1) ;
if($first_num_left_calc1>0){
$first_num_left_calc1=$first_num_left_calc1;
}else{
$first_num_left_calc1=0;
}

$first_sel_right_calc1="Select * from `binary_level` bin,`member` mat WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%' AND mat.member_status='1'";
$first_res_right_calc1 = mysqli_query($con,$first_sel_right_calc1) ;
$first_num_right_calc1 = mysqli_num_rows($first_res_right_calc1);
if($first_num_right_calc1>0){
$first_num_right_calc1=$first_num_right_calc1;
}else{
$first_num_right_calc1=0;
}

$first_sel_strong_calc1="Select * from `binary_level` bin,`member` mat WHERE bin.spid=mat.spid AND bin.binary LIKE '$strong_pt%' AND mat.member_status='1'";
$first_res_strong_calc1 = mysqli_query($con,$first_sel_strong_calc1) ;
$first_num_strong_calc1 = mysqli_num_rows($first_res_strong_calc1);
if($first_num_strong_calc1>0){
$first_num_strong_calc1=$first_num_strong_calc1;
}else{
$first_num_strong_calc1=0;
}
?>

<!-- //////////////////////////////////////////////////// Content-Panel div -->

<div id="content-panel">
<div class="container-fluid">

<div class="row">
<div class="col-xs-12 dashboard-header">
<h1 class="dash-title">Binary Tree</h1>
<!-- //////////////////////////////////////////////////// Breadcrumb -->
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Team View</a></li>
<li><a href="#" class="active">Binary Tree</a></li>
</ol> <!-- /breadcrumb -->
</div> <!-- /dashboard -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Blank Page -->


<div class="row">
<div class="col-xs-12">
<div class="panel">
<br/>

<!-- /panel-heading -->
<div class="panel-body m-t-0">
<table style="width:100%">
<tr>
<td>               

<table class="table table-striped">
<tr class="danger"><th width="33%">Left Side Member <?=$leftno?></th><th rowspan="3" width="34%">
<form action="genealogy.php" method="POST" >

<div class="input-group">
<input class="form-control" type="text" name="srch" required placeholder="Search ID">

<div class="input-group-btn">
<input type="submit" class="btn btn-danger" id="usrname" value="Search" />
</div><!-- /btn-group -->
</div>

</form>
<h1><?=$id?></h1><br>Name : <?=$step1[sname]?></th><th width="33%">Right Side Member <?=$rightno?></th></tr>
<tr class="success"><th>Left Side Green  <?=$first_num_left_calc1?></th><th>Right Side Green <?=$first_num_right_calc1?></th></tr>
<tr class="success"><th>Middle Side Member  <?=$strongno?></th><th>Middle Side Green <?=$first_num_strong_calc1?></th></tr>

</table>
</td>
<td>	

<table class="table table-striped">
<tr class="success"><th style="text-align:left"><img src="images/thumb/green.png" width="25px"/>Paid Member</th></tr>
<tr class="danger"><th style="text-align:left"><img src="images/thumb/red.png" width="25px"/> Joined Member</th></tr>
<tr class="info"><th style="text-align:left"><img src="images/thumb/gray.png" width="25px"/> Unjoined Member</th></tr>
</table>
</td>
</tr>
</table>	

<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>

<td colspan="9" align="center" height="120" valign="top" width="100%">



<table width="100%" border="0" height="100%">
<!-- first level-->
<tr>
<td width="33%" align="center"></td>
<td width="33%" align="center"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;">
<div id="line" style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div>
<div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div><br>
<?
if($step1[spid]!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($step1[spid])?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$step1[spid]?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$step1[spid]?></span><br/>
<?=$step1[sname]?>
</a>
<?} else{ ?>
<?=$name?>
<? } ?>
<br/><br/>
</div>
</div></td>
<td width="33%" align="center"><font size="5"></td>
</tr>
</table>

</td>

</tr>
<!-- end first level -->
<tr>
<td colspan="9" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top">
<table style="margin: 0px; padding: 0px; height: 1px; background-color:#3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" 
width="70%">
<tbody><tr><td></td></tr></tbody>
</table>
</td>
<!-- 2nd level -->
</tr>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='L' AND  `parentspid`= '$step1[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step2_l=mysqli_fetch_array($rr);
$name=$step2_l[sname];
$spid=$step2_l[spid];
$doj=$step2_l[doj];
if($step2_l[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step2_l[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step2_l[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step2_l[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}
?>
<tr>

<td colspan="3" align="center" height="120" valign="top" width="33%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step1[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step1[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>

</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='M' AND  `parentspid`= '$step1[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step2_r=mysqli_fetch_array($rr);
$name=$step2_r[sname];
$spid=$step2_r[spid];
$doj=$step2_r[doj];
if($step2_r[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step2_r[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step2_r[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step2_r[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}
?>
<td colspan="3" align="center" height="120" valign="top" width="33%">

<div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;">
<div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div>
<div style="border: 0px solid #3570AF; padding: 0px; width: 100%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step1[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step1[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</td>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='R' AND  `parentspid`= '$step1[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step2_s=mysqli_fetch_array($rr);
$name=$step2_s[sname];
$spid=$step2_s[spid];
$doj=$step2_s[doj];
if($step2_s[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step2_s[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step2_s[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step2_s[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}
?>
<td colspan="3" align="center" height="120" valign="top" width="33%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div>
<div style="border: 0px solid #3570AF; padding: 0px; width: 100%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step1[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step1[spid]?>&LEG=S" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>

</div>
<div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>

</tr>


<!-- end 2nd level-->
<tr>

<td colspan="3" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top">
<table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="70%">
<tbody><tr><td></td></tr></tbody></table>
</td>

<td colspan="3" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top">
<table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="70%"><tbody><tr><td></td></tr></tbody>
</table>
</td>


<td colspan="3" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top">
<table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="70%"><tbody><tr><td></td></tr></tbody>
</table>
</td>

<!-- 3rd level -->
</tr>

<tr>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='L' AND  `parentspid`= '$step2_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step3_l_l=mysqli_fetch_array($rr);
$name=$step3_l_l[sname];
$spid=$step3_l_l[spid];
$doj=$step3_l_l[doj];
if($step3_l_l[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step3_l_l[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step3_l_l[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step3_l_l[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>

<td  align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>		
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_l[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_l[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>

<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>
<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='M' AND  `parentspid`= '$step2_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step3_l_r=mysqli_fetch_array($rr);
$name=$step3_l_r[sname];
$spid=$step3_l_r[spid];
$doj=$step3_l_r[doj];
if($step3_l_r[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step3_l_r[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step3_l_r[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step3_l_r[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>
<td  align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_l[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_l[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='R' AND  `parentspid`= '$step2_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step3_l_s=mysqli_fetch_array($rr);
$name=$step3_l_s[sname];
$spid=$step3_l_s[spid];
$doj=$step3_l_s[doj];
if($step3_l_s[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step3_l_s[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step3_l_s[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step3_l_s[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>
<td  align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_l[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_l[spid]?>&LEG=S" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>


<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='L' AND  `parentspid`= '$step2_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_l_l=mysqli_fetch_array($rr);
$name=$step4_l_l[sname];
$spid=$step4_l_l[spid];
$doj=$step4_l_l[doj];
if($step4_l_l[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step4_l_l[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step4_l_l[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step4_l_l[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>

<td  align="center" height="120" valign="top" width="11%">
<div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()"><span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span></a>
<?} else{ ?>
<? if($step2_r[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_r[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div>
</div>
</td>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='M' AND  `parentspid`= '$step2_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_r_r=mysqli_fetch_array($rr);
$name=$step4_r_r[sname];
$spid=$step4_r_r[spid];
$doj=$step4_r_r[doj];
if($step4_r_r[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step4_r_r[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step4_r_r[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step4_r_r[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>
<td  align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_r[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_r[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>


<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='R' AND  `parentspid`= '$step2_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_r_s=mysqli_fetch_array($rr);
$name=$step4_r_s[sname];
$spid=$step4_r_s[spid];
$doj=$step4_r_s[doj];
if($step4_r_s[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step4_r_s[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step4_r_s[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step4_r_s[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>
<td  align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_r[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_r[spid]?>&LEG=S" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>



<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='L' AND  `parentspid`= '$step2_s[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_l_l=mysqli_fetch_array($rr);
$name=$step4_l_l[sname];
$spid=$step4_l_l[spid];
$doj=$step4_l_l[doj];
if($step4_l_l[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step4_l_l[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step4_l_l[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step4_l_l[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>

<td  align="center" height="120" valign="top" width="11%">
<div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()"><span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span></a>
<?} else{ ?>
<? if($step2_s[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_s[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div>
</div>
</td>

<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='M' AND  `parentspid`= '$step2_s[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_r_r=mysqli_fetch_array($rr);
$name=$step4_r_r[sname];
$spid=$step4_r_r[spid];
$doj=$step4_r_r[doj];
if($step4_r_r[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step4_r_r[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step4_r_r[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step4_r_r[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>
<td align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_s[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_s[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>


<?
$sq4="SELECT * FROM  `member` WHERE  `leg`='R' AND  `parentspid`= '$step2_s[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_r_s=mysqli_fetch_array($rr);
$name=$step4_r_s[sname];
$spid=$step4_r_s[spid];
$doj=$step4_r_s[doj];
if($step4_r_s[member_status]=="0"){
$img="images/thumb/red.png";
}
elseif($step4_r_s[member_status]=="1"){
$img="images/thumb/green.png";
}
elseif($step4_r_s[member_status]=="2"){
$img="images/thumb/yellow.png";
}
elseif($step4_r_s[member_status]=="3"){
$img="images1/metal logo.png";
}
}
else
{
$name="N/A";
$spid="";
$doj="";
$img="images/thumb/gray.png";
}

?>
<td  align="center" height="120" valign="top" width="11%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="genealogy.php?id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/genealogy.php?spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_s[spid]!=""){ ?><a href="register.php?st=8&SPONSOR=<?=$step2_s[spid]?>&LEG=S" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div>
</td>
</tr>



<!-- end 3rd level -->




</tbody>
</table>

</td>
</tr>

</tbody>
</table>


</td>

</tr>

</table>

</td>

</tr>

</table>		   


<table style="width:100%">

<tr>
<td style="height:80px;border:1px solid white"></td>
</tr>
</table>


</div> <!-- /panel-body -->
</div> <!-- /panel-->
</div> <!-- /col -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Footer -->
<div class="row">
<footer>
<div id="credits">
<div class="col-xs-12">  
<p> Copyright© 2019  by <?=$row_sp1[com_name]?>. All Rights Reserved.</p>
</div> <!-- /col-sm-12 -->
</div> <!-- /credits -->
</footer> <!-- /footer-->
</div> <!-- /row -->

</div> <!-- /container-fluid -->
</div> <!-- /content-panel -->

<!-- /////////////////////////////// Scripts /////////////////////////////// -->  
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Offline jQuery script -->  
<!-- <script  type="text/javascript" src="jquery.min"></script>  -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script  type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- Menu Script -->
<script  type="text/javascript" src="js/menu/metisMenu.min.js"></script>
<script type="text/javascript" src="js/menu/nanoscroller.js"></script>
<!-- Custom scripts -->
<script  type="text/javascript" src="js/jquery-functions.js"></script>

</body>


</html>