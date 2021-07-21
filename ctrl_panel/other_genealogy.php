<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
?>
<body class="hold-transition sidebar-mini">
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
<?php
include_once("include/header_down.php");
?>       
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<?php
include_once("include/menu.php");
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

<?
if($_REQUEST[tree_id]==1){
$table="global_tree";
$tree_nm="Global Customer";
}
if($_REQUEST[tree_id]==2){
$table="oneindia_tree";
$tree_nm="One Indias";
}
?>


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-user"></i></div>
<div class="header-title">
<h1>Genealogy</h1>
<small><?=$tree_nm?> Tree</small>
</div>
</section>	

<!-- Main content -->
<section class="content">
<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 
<i class="fa fa-list"></i> <?=$tree_nm?> Tree 
</div>
</div>




<div class="panel-body">

<?php






$csql1="SELECT * FROM `$table` ORDER BY `id` ASC LIMIT 1";
$cres1=mysqli_query($con,$csql1);
$crow1=mysqli_fetch_array($cres1);

if($_REQUEST[spid]==""){
$sel_bin = "select * from `$table` where `spid`='$_POST[srch]'" ;
$res_bin = mysqli_query($con,$sel_bin);
$num_bin = mysqli_num_rows($res_bin);
if($num_bin==0){
if($_REQUEST[srch]==""){
$id=base64_decode($_GET[id]);
}else{
$id = $crow1[spid];
}
}else{
$id =$_REQUEST[srch];
}
}else{
$id =$_REQUEST[spid];
}


/*Left Right calculation start*/
$sel_bin_id = "select `binary` from `$table` where `spid`='$id'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
//print_r($row_bin_id) ;
$left_pt = $row_bin_id[0]."L" ;
$sel_left_calc = "select * from `$table` where `binary` LIKE '$left_pt%'" ;
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
$leftno = $num_left_calc ;

$right_pt = $row_bin_id[0]."R" ;
$sel_right_calc = "select * from `$table` where `binary` LIKE '$right_pt%'" ;
$res_right_calc = mysqli_query($con,$sel_right_calc) ;
$num_right_calc = mysqli_num_rows($res_right_calc) ;
$rightno = $num_right_calc ;
/*Left Right calculation end*/
$sq4="SELECT * FROM `member` WHERE `spid`='$id'";
$rr=mysqli_query($con,$sq4);
$step1=mysqli_fetch_array($rr);


$vsql="SELECT * FROM `$table` WHERE `spid`='$id'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}




/*
$first_sel_left_calc="Select SUM(pack.unit) from `$table` bin,`member_topup` mat,`package` pack WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%'  AND pack.package_id=mat.package_id";
$first_res_left_calc = mysqli_query($con,$first_sel_left_calc) ;
$first_row_left_calc=mysqli_fetch_array($first_res_left_calc);
$carry_left_pv=$first_row_left_calc[0];
if($carry_left_pv==""){$carry_left_pv=0;}


$first_sel_left_emi="Select SUM(emi.payment_amt) from `$table` bin,`member` mat,`plot_booking` pack,`emi_payment` emi WHERE bin.spid=mat.spid AND bin.binary LIKE '$left_pt%' AND mat.st='1' AND pack.spid=mat.spid AND pack.plot_bkId=emi.plot_bkId";
$first_res_left_emi= mysqli_query($con,$first_sel_left_emi) ;
$first_row_left_emi=mysqli_fetch_array($first_res_left_emi);
$emi_left_pv=$first_row_left_emi[0];
if($emi_left_pv==""){$emi_left_pv=0;}
*/



$first_sel_right_calc="Select SUM(pack.unit) from `$table` bin,`member_topup` mat,`package` pack WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%'  AND pack.package_id=mat.package_id";
$first_res_right_calc = mysqli_query($con,$first_sel_right_calc) ;
$first_row_right_calc=mysqli_fetch_array($first_res_right_calc);
$carry_right_pv=$first_row_right_calc[0];
if($carry_right_pv==""){$carry_right_pv=0;}

/*
$first_sel_right_emi="Select SUM(emi.payment_amt) from `$table` bin,`member` mat,`plot_booking` pack,`emi_payment` emi WHERE bin.spid=mat.spid AND bin.binary LIKE '$right_pt%' AND mat.st='1' AND pack.spid=mat.spid AND pack.plot_bkId=emi.plot_bkId";
$first_res_right_emi= mysqli_query($con,$first_sel_right_emi) ;
$first_row_right_emi=mysqli_fetch_array($first_res_right_emi);
$emi_right_pv=$first_row_right_emi[0];
if($emi_right_pv==""){$emi_right_pv=0;}
*/


$first_sel_left_calc1="Select * from `$table` bin WHERE `binary` LIKE '$left_pt%' AND `st`='1'";
$first_res_left_calc1 = mysqli_query($con,$first_sel_left_calc1) ;
$first_num_left_calc1 = mysqli_num_rows($first_res_left_calc1) ;
if($first_num_left_calc1>0){
$first_num_left_calc1=$first_num_left_calc1;
}else{
$first_num_left_calc1=0;
}

$first_sel_right_calc1="Select * from `$table` bin WHERE `binary` LIKE '$right_pt%' AND `st`='1'";
$first_res_right_calc1 = mysqli_query($con,$first_sel_right_calc1) ;
$first_num_right_calc1 = mysqli_num_rows($first_res_right_calc1);
if($first_num_right_calc1>0){
$first_num_right_calc1=$first_num_right_calc1;
}else{
$first_num_right_calc1=0;
}


?>







<table style="width:100%">
<tr>
<td>               

<table class="table table-striped" >
<tr class="danger"><th width="33%">Left Member <?=$leftno?></th>
<th rowspan="3" width="34%">
<form action="other_genealogy.php" method="POST" >

<div class="input-group">
<input class="form-control" type="text" name="srch" required placeholder="Search ID">
<input type="hidden" name="tree_id" value="<?=$_REQUEST[tree_id]?>" readonly />

<div class="input-group-btn">
<input type="submit" class="btn btn-danger" id="usrname" value="Search" />
</div><!-- /btn-group -->
</div>

</form>
<h2><?=$id?></h2><br> <span style='font-size:13px'>Name : <?=$step1[sname]?></span>
</th>
<th width="33%">Right Member <?=$rightno?></th></tr>
<tr class="info"><th></th><th></th></tr>
</table>
</td>
<td>	

<table class="table table-striped">
<tr class="danger"><th style="text-align:left"><img src="images/thumb/red.png" width="25px"/> Joined Member</th></tr>
<tr class="info"><th style="text-align:left"><img src="images/thumb/gray.png" width="25px"/> Unjoined Member</th></tr>
</table>
</td>
</tr>
</table>	


<table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr>

<td colspan="8" align="center" height="120" valign="top" width="100%">



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
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($step1[spid])?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$step1[spid]?>',this);return false" onmouseout="ajax_hideTooltip()">
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
<td colspan="8" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color:#3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>
<!-- 2nd level -->
</tr>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step1[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step2_l=mysqli_fetch_array($rr);


$sqls="SELECT * FROM `member` WHERE `spid`='$step2_l[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step2_l[spid];
$doj=$step2_l[doj];


$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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

<td colspan="4" align="center" height="120" valign="top" width="50%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step1[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step1[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>

</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step1[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step2_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step2_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step2_r[spid];
$doj=$step2_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="4" align="center" height="120" valign="top" width="50%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div>
<div style="border: 0px solid #3570AF; padding: 0px; width: 100%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step1[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step1[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>



</div>
<div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div></td>

</tr>
<!-- end 2nd level-->
<tr>

<td colspan="4" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="4" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>
<!-- 3rd level -->
</tr>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step2_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step3_l_l=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step3_l_l[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];


$spid=$step3_l_l[spid];
$doj=$step3_l_l[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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

<td colspan="2" align="center" height="120" valign="top" width="25%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>		
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_l[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step2_l[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>

<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step2_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step3_l_r=mysqli_fetch_array($rr);


$sqls="SELECT * FROM `member` WHERE `spid`='$step3_l_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];


$spid=$step3_l_r[spid];
$doj=$step3_l_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="2" align="center" height="120" valign="top" width="25%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_l[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step2_l[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div></td>

<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step2_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_l_l=mysqli_fetch_array($rr);


$sqls="SELECT * FROM `member` WHERE `spid`='$step4_l_l[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step4_l_l[spid];
$doj=$step4_l_l[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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

<td colspan="2" align="center" height="120" valign="top" width="25%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()"><span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span></a>
<?} else{ ?>
<? if($step2_r[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step2_r[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step2_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step4_r_r=mysqli_fetch_array($rr);


$sqls="SELECT * FROM `member` WHERE `spid`='$step4_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step4_r_r[spid];
$doj=$step4_r_r[doj];


$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="2" align="center" height="120" valign="top" width="25%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="50"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step2_r[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step2_r[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div><div style="border-left: 0px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div></div></td>

</tr>
<!-- end 3rd level -->
<tr>

<td colspan="2" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="2" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="2" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="2" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px; background-color: #3570AF;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

</tr>
<!-- 4th level -->
<tr>

<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step3_l_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];


$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);


if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step3_l_l[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step3_l_l[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step3_l_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);


if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step3_l_l[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step3_l_l[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step3_l_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step3_l_r[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step3_l_r[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>

<? } ?>
</div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step3_l_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);


$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step3_l_r[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step3_l_r[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?></div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step4_l_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);


$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step4_l_l[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step4_l_l[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div></div></td>

<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step4_l_l[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step4_l_l[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step4_l_l[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?></div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='L' AND  `parentspid`= '$step4_r_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>		
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step4_r_r[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step4_r_r[spid]?>&LEG=L" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div></div></td>
<?
$sq4="SELECT * FROM  `$table` WHERE  `leg`='R' AND  `parentspid`= '$step4_r_r[spid]'";
$rr=mysqli_query($con,$sq4);
$num1=mysqli_num_rows($rr);
if($num1>0)
{
$step5_r_r=mysqli_fetch_array($rr);

$sqls="SELECT * FROM `member` WHERE `spid`='$step5_r_r[spid]'";
$rels=mysqli_query($con,$sqls);
$rols=mysqli_fetch_array($rels);
$name=$rols[sname];

$spid=$step5_r_r[spid];
$doj=$step5_r_r[doj];

$vsql="SELECT * FROM `$table` WHERE `spid`='$spid'";
$vres=mysqli_query($con,$vsql);
$vrow=mysqli_fetch_array($vres);

if($vrow[st]=="0"){
$img="images/thumb/red.png";
}
elseif($vrow[st]=="1"){
$img="images/thumb/green.png";
}
elseif($vrow[st]=="2"){
$img="images/thumb/yellow.png";
}
elseif($vrow[st]=="3"){
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
<td colspan="1" align="center" height="120" valign="top" width="12%"><div style="border: 0px solid rgb(255, 0, 0); height: 100%; vertical-align: top;"><div id="line" style="border-left: 1px solid #3570AF; margin: 0px; padding: 0px; width: 1px; height: 25%;"></div><div style="border: 0px solid #3570AF; padding: 0px; width: 100%; height: 50%; vertical-align: middle;"><div><img src="<?=$img?>" border="0" width="60%"></div>	
<?
if($spid!=""){
?>
<a href="other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&id=<? print $id=base64_encode($spid)?>" onmouseover="ajax_showTooltip(window.event,'demo-pages/other_genealogy.php?tree_id=<?=$_REQUEST[tree_id]?>&spid=<?=$spid?>',this);return false" onmouseout="ajax_hideTooltip()">
<span style="font-size:11px;"><?=$spid?></span><br/>
<span style="font-size:11px;"><?=$name?></span>
</a>
<?} else{ ?>
<? if($step4_r_r[spid]!=""){ ?><a href="#?st=8&SPONSOR=<?=$step4_r_r[spid]?>&LEG=R" ><?=$name?></a><? } else { ?><?=$name?><? } ?>
<? } ?>
</div></div></td>

</tr>
<!-- end 4th level -->
<tr>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>

<td colspan="1" style="margin: 0px; padding: 0px; height: 1px;" align="center" valign="top"><table style="margin: 0px; padding: 0px; height: 1px;" align="center" border="0" cellpadding="0" cellspacing="0" width="50%"><tbody><tr><td></td></tr></tbody></table></td>
</tr>

</tbody>
</table>


<table style="width:100%">

<tr>
<td style="height:80px;border:1px solid white"></td>
</tr>
</table>

</div>
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once("include/footer_top.php");
?>
</div>
<!-- /.wrapper -->
<!-- Start Core Plugins
=====================================================================-->
<?php
include_once("include/footer_down.php");
?>

</body>

</html>