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

<style>
#output_image
{
	width:2.5in;
	heiht:3.5in;
	border:1px solid black;
}
</style>

<script type="text/javascript">
function validate_form(form){
if( form.elements['employee_code'].value=="" ) { alert("Please type Employee ID."); form.elements['employee_code'].focus(); return false; }
if( form.elements['employee_name'].value=="" ) { alert("Please type correct Employee ID."); form.elements['employee_code'].focus(); return false; } 
}
</script>

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
<div class="header-icon"><i class="fa fa-user-o"></i>

</div>
<div class="header-title">
<h1>Employee</h1>
<small>Employee Right</small>
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
<i class="fa fa-list"></i>  Employee Right 
</div>
</div>


<script>
function myFunction1() {
alert("Employee Right is created.");
}
</script>



<?

if($_POST[call_submit]!=""){

$all_row=$my->total_row($con,employee,employee_id,$_REQUEST[employee_id]);

$sql="UPDATE `authenticate_status` SET `authen_status`='0',`edit_status`='0' WHERE `employee_id`='$_POST[employee_id]'";
$res=mysqli_query($con,$sql);

$sublink_id=$_POST[sublink_id];
$edlink_id=$_POST[edlink_id];


foreach($sublink_id as $k1=>$v1){
$authen_num=$my->second_num($con,authenticate_status,employee_id,$_POST[employee_id],sublink_id,$sublink_id[$k1]);
if($authen_num==0){
$my->normal_insert5($con,authenticate_status,employee_id,$_POST[employee_id],sublink_id,$sublink_id[$k1],authen_status,1,user_id,$_POST[user_id],entry_date,$_POST[entry_date]);
}else{
$my->normal_UPDATE2($con,authenticate_status,authen_status,1,employee_id,$_POST[employee_id],sublink_id,$sublink_id[$k1]);
}
}

/*

foreach($edlink_id as $k1=>$v1){
$edit_num=$my->third_num(authenticate_status,employee_id,$_POST[employee_id],sublink_id,$edlink_id[$k1],authen_status,1);
if($edit_num>0){
$my->normal_UPDATE2(authenticate_status,edit_status,1,employee_id,$_POST[employee_id],sublink_id,$edlink_id[$k1]);
}
}

*/

header("location:$log_url?lid=$dtls_link[sublink_id]");


}
?>




<div class="panel-body">

<form class="col-sm-6" name="newform" method="post" onsubmit="return validate_form(this);" >
<div class="form-group">
<label>Employee ID</label>
<input type="text" class="form-control" name="employee_code" id="employee_code"  onkeyup="return ajax2()" placeholder="Enter Employee ID" required>
</div>
<div class="form-group">
<label>Employee Name</label>
<input type="text" class="form-control" name="employee_name" id="employee_name"  placeholder="Employee Name" readonly >
</div>


<div class="reset-button">
<input type="submit" name="submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset" class="btn btn-warning"  value="Exit" />

</div>
</form>
<br/><br/>
<center>
<?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p><span style='color:brown;font-size:14px;font-weight:bold'>$msg</span></p>";
?>
</center>

</div>


<?
if($_POST[submit]!=""){

$value_num=$my->second_num($con,employee,employee_code,$_POST[employee_code],st,1);

if($value_num>0){
$value_det=$my->total_row($con,employee,employee_code,$_POST[employee_code]);
}else{
header("location:$log_url?lid=$dtls_link[sublink_id]");
}


if($value_num>0){
?>


<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;" >
<div class="btn-group" id="buttonlist"> 
<i class="fa fa-list"></i>  Employee Right 
</div>
</div>


<div class="panel-body">

<form class="col-sm-6" action="" method="post" name="newform1" onsubmit="myFunction1();">

<table style="width:160%">

<tr>
<td style="font-weight: bold;font-size: 16px;color:#283747;">Employee ID - 
<td style="font-weight: bold;font-size: 14px;color:#424949;"><?=$value_det[employee_code]?></td>
<td style="font-weight: bold;font-size: 16px;color:#283747;">Employee Name - </td>
<td style="font-weight: bold;font-size: 14px;color:#424949;"><?=$value_det[employee_name]?></td>
</tr>	
<!-- <tr><td colspan="4"><br/></td></tr> -->
</table>



<table class="table table-bordered"> 
<?php
//$details_link=$my->check_all(link,st,1);
$details_link=$my->check_all_asc($con,link,st,1,order_by);

foreach($details_link as $kk=>$kv){
	
?>
<tr>
<td><center><h4><b><?=$kv[link_name]?></b></h4></center></td>
</tr> 
<tr>
<td>
<table class="table table-bordered"> 

<tr>
<td width="100"></td>
<td></td>
<!--
<td width="150">Edit / Block</td>
-->

</tr>

<?
$sub_details_link=$my->search_row2($con,sublink,link_id,$kv[link_id],st,1);
foreach($sub_details_link as $kk1=>$kv1){
	
if($kv1[sublink_id]!=77 && $kv1[sublink_id]!=79 && $kv1[sublink_id]!=80){

$status_num=$my->third_num($con,authenticate_status,employee_id,$value_det[employee_id],sublink_id,$kv1[sublink_id],authen_status,1);
$ed_num=$my->third_num($con,authenticate_status,employee_id,$value_det[employee_id],sublink_id,$kv1[sublink_id],edit_status,1);
?>
<script>
function myFunction(x, _this) {
	x.style.backgroundColor = _this.checked ? '#e0e0ea' : '#FFF';
}
</script>
<tr <?if($status_num>0){?>style="background: #e0e0ea;"<?}?> id="h_<?=$kv1[sublink_id]?>">
<td width="100"><input type="checkbox" name="sublink_id[<?=$kv1[sublink_id]?>]" onChange="myFunction(h_<?=$kv1[sublink_id]?>, this)" value="<?=$kv1[sublink_id]?>" <?if($status_num>0){?>Checked<?}?>/></td>
<td><?=$kv1[sublink_name]?></td>
<!--
<td width="150">
<?
if($kv1[edit_del]==1){
?>
<input type="checkbox" name="edlink_id[<?=$kv1[sublink_id]?>]" value="<?=$kv1[sublink_id]?>" <?if($status_num>0 && $ed_num>0){?>Checked<?}?>/>
<? } ?>
</td>
-->
</tr>
<?}}?>
</table>
</td>
</tr> 
<?}?>
</table>


<div class="form-group">
<input type="hidden" name="employee_id" value='<?=$value_det[employee_id]?>' />

<input type="hidden" name="st" value="1" />
<input type="hidden" name="user_id" value="<?=$_SESSION['employee_id']?>" />
<input type="hidden" name="entry_date" value='<?=$today_date?>' />
<input type="hidden" name="entry_time" value='<?=$create_date?>' />

<center><input type="submit" name="call_submit" class="btn btn-success"  value="Submit" /></center>

</div>

</form>

</div>

<? }} ?>


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