<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
ob_start();

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




<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-user"></i></div>
<div class="header-title">
<h1>Business Details</h1>
<small>Business Entry</small>
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
<i class="fa fa-list"></i> Business Entry
</div>
</div>

<script type="text/javascript">
function validate_form(form){
if( form.elements['agent_code'].value=="" ) { alert("Please type  Agent Id"); form.elements['agent_code'].focus(); return false; } 
if( form.elements['spname'].value=="" ) { alert("Please type correct Agent Id"); form.elements['agent_code'].focus(); return false; }
if( form.elements['start_date'].value=="" ) { alert("Please type Start Date"); form.elements['start_date'].focus(); return false; } 
if( form.elements['end_date'].value=="" ) { alert("Please type End Date"); form.elements['end_date'].focus(); return false; } 
}
</script>	



<div class="panel-body">




<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Agent ID</td>
<td><input type="text" class="form-control" name="agent_code" id="sponsorid" onkeyup="zajax22();"  style="width:300px" required /></td>
</tr>	

<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Agent Name</td>
<td><input type="text" class="form-control" name="spname" id="spname" style="width:300px" readonly /></td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Start Date</td>
<td>
<input type="text" name="start_date"  id="start_date" value='' style="width:300px" class="form-control" size="20" readonly  />
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

<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>End Date</td>
<td>
<input type="text" name="end_date"  id="end_date" value='' style="width:300px" class="form-control" size="20" readonly  />
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

<tr ><td colspan="2"><br/></td></tr>


</table> 




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />

<br/>
</div>




</form>

<?
if($_POST[call_submit]!=""){
?>
<div class="table-responsive">

<center>Business Details From <?=$_REQUEST[start_date]?> To <?=$_REQUEST[end_date]?></center>
<br/>

<table id="dataTableExample1" class="table table-bordered table-striped table-hover">
<thead>
<tr class="info">
<th scope="col" class="rounded">Agent Id</th>
<th scope="col" class="rounded">Name</th>
<th scope="col" class="rounded">Rank</th>
<th scope="col" class="rounded">Direct Business</th>
<th scope="col" class="rounded">Team Business</th>
<th scope="col" class="rounded">Total Business</th>

</tr>
</thead>
<tbody>

<?php


$msgsql="select SUM(`business_amount`) from `sales_business` WHERE `entry_dt`>='$_REQUEST[start_date]' AND `entry_dt`<='$_REQUEST[end_date]' AND `agent_code`='$_REQUEST[agent_code]'";
$msgres=mysqli_query($con,$msgsql);
$msgrow=mysqli_fetch_array($msgres);
$direct_business=$msgrow[0];

if($direct_business==""){$direct_business=0;}

$vsql1="SELECT * FROM `sales_agent` WHERE `agent_code`='$_REQUEST[agent_code]'";
$vres1=mysqli_query($con,$vsql1);
$vrow1=mysqli_fetch_array($vres1);

$vsql2="SELECT * FROM `sales_agent` WHERE `agent_bianry` LIKE '$vrow1[agent_bianry]%' AND `agent_level`>'$vrow1[agent_level]' ORDER BY `agent_level` ASC";
$vres2=mysqli_query($con,$vsql2);
while($vrow2=mysqli_fetch_array($vres2))
{

$msgsql1="select SUM(`business_amount`) from `sales_business` WHERE `entry_dt`>='$_REQUEST[start_date]' AND `entry_dt`<='$_REQUEST[end_date]' AND `agent_code`='$vrow2[agent_code]'";
$msgres1=mysqli_query($con,$msgsql1);
$msgrow1=mysqli_fetch_array($msgres1);

$down_business+=$msgrow1[0];

}



if($down_business==""){$down_business=0;}
$srow=$my->total_row($con,sales_agent,agent_code,$_POST[agent_code]);
$arow=$my->total_row($con,sales_rank,sales_rank_id,$srow[sales_rank_id]);

$team_business=($direct_business+$down_business);


?>

<tr>
<td><?=$srow[agent_code]?></td>
<td><?=$srow[sname]?></td>
<td><span style="color:<?=$arow[rank_color]?>;font-weight:bold"><?=$arow[designation]?></span></td>
<td><?=$direct_business?></td>
<td><?=$down_business?></td>
<td><?=$team_business?></td>
</tr>
</tbody>
</table>
</div>


<? } ?>

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