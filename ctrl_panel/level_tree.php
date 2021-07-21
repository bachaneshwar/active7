<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
?>
<body class="hold-transition sidebar-mini" oncontextmenu="return false">
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

<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->

<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-user"></i></div>
<div class="header-title">
<h1>Genealogy</h1>
<small>Matrix Tree</small>
</div>
</section>	

<!-- Main content -->
<section class="content">





<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> Level Tree Details of <?=$_REQUEST[spid]?>
</div>
</div>
<div class="panel-body">

<?
$vsql1="SELECT * FROM `binary_level` WHERE `spid`='$_REQUEST[spid]'";
$vres1=mysqli_query($con,$vsql1);
$vrow1=mysqli_fetch_array($vres1);


$sel_bin_id = "select * FROM `binary_level` where `spid`='$vrow1[spid]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;
$level_binary = $row_bin_id[level_binary];
$level_level = $row_bin_id[level_level];



?>

<div class="table-responsive">

<table style="width:800px"  border="0" cellpadding="1" cellspacing="1">
<?
 $sel_left_calc="Select * from `binary_level` bin,`member` mat WHERE bin.spid=mat.spid AND bin.level_binary LIKE '$level_binary%'  AND bin.level_level!='$level_level' GROUP BY bin.level_level ORDER BY bin.level_level ASC";
$res_left_calc = mysqli_query($con,$sel_left_calc) ;
$num_left_calc = mysqli_num_rows($res_left_calc) ;
if($num_left_calc>0){
while($row_left_calc=mysqli_fetch_array($res_left_calc)){

?> 
  <tr>
<td style="border:1px solid #663300;">  
<center>
<a onclick="document.getElementById('div_name<?=$row_left_calc[level_level]?>').style.display='';return false;" href="" 
style="text-decoration:none;font-weight:bold;font-size:13px"> LEVEL  <?=$row_left_calc[level_level]-$level_level?></a>
</center>

<div id="div_name<?=$row_left_calc[level_level]?>" style="display:none;margin:15px 15px 0px 15px;padding:5px;border:1px solid #aaa;width:900px">

<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">
<th scope="col" class="rounded" style='text-align:center'>Sr.</th>
<th scope="col" class="rounded" style='text-align:center'>Member Id</th>
<th scope="col" class="rounded" style='text-align:center'>Name</th>
<th scope="col" class="rounded" style='text-align:center'>Sponsor Id</th>
<th scope="col" class="rounded" style='text-align:center'>Parent Id</th>

<th scope="col" class="rounded" style='text-align:center'>DOJ</th>
<th scope="col" class="rounded" style='text-align:center'>Place</th>

</tr>
</thead>
<?
$vsql2="SELECT * FROM `binary_level` WHERE `level_binary` LIKE '$level_binary%' AND `level_level`='$row_left_calc[level_level]'";
$vres2=mysqli_query($con,$vsql2);
while($vrow2=mysqli_fetch_array($vres2))
{


$ch++;

$sqll="select * from `member` where `spid`='$vrow2[spid]' ";
$res1=mysqli_query($con,$sqll);
$row1=mysqli_fetch_array($res1);


//$total_package_amt+=$row2[package_amt];
//$total_amt+=$total_package_amt;


?>
<tr align="center" valign="middle">
<td align="center" style="border:1px solid #663300;font-size:12px;"><?=$ch?></td>
<td style="border:1px solid #663300;font-size:12px;">
<? if($row1[member_status]==0){?> <span style='color:red;font-size:12px;'><?=$vrow2[spid]?></span><? } else { ?><span style='color:green;font-size:12px;'><?=$vrow2[spid]?></span><? } ?>
</td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[sname]?></td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[sponsorid]?></td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[parentspid]?></td>

<td style="border:1px solid #663300;font-size:12px;"><?=$row1[doj]?></td>
<td style="border:1px solid #663300;font-size:12px;"><?=$row1[leg]?></td>

</tr>
<?  }?>

</table>


<center>
<a onclick="document.getElementById('div_name<?=$row_left_calc[level_level]?>').style.display='none';return false;" href="" 
style="text-decoration:none;font-weight:bold;font-size:14px;color:red">HIDE</a>
</center>
</div>
<br />
<td>
</tr>

<? } } ?>

</table>


</div>





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