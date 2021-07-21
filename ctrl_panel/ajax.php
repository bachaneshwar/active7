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

if($_POST[call_submit]!=""){


 
 }
?>


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-pawn"></i></div>
<div class="header-title">
<h1>Create Chalan</h1>
<small></small>
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
<i class="fa fa-list"></i> Create Chalan
</div>





<div class="panel-body">


<script type="text/javascript">
function validate_form(form){
if( form.elements['seacrh_sec_id'].value=="" ) { alert("Please choose Search Section"); form.elements['seacrh_sec_id'].focus(); return false; } 
if( form.elements['seacrh_sec_id'].value=="1" ) {
if( form.elements['customer_mobile'].value=="" ) { alert("Please type Mobile"); form.elements['customer_mobile'].focus(); return false; }  
}
if( form.elements['seacrh_sec_id'].value=="2" ) {
if( form.elements['customer_id'].value=="" ) { alert("Please choose Customer"); form.elements['customer_id'].focus(); return false; }  
}
}
</script>

<script type="text/javascript">
function planchq(){
var a=document.adddesignation.seacrh_sec_id.value;
if(a=='1'){
document.getElementById("th1").style.display="";
document.getElementById("th2").style.display="none";
}
else if(a=="2"){
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="";
}
else if(a==""){
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="none";

}
}
</script>

<style>

.frmSearch {margin: 2px 0px;padding:5px;border-radius:4px;}
#country-list{float:left;list-style:none;margin-top:-3px;padding:0;width:190px;position: absolute;}
#country-list li{padding: 5px; background: #f0f0f0; border-bottom: #bbb9b9 1px solid;}
#country-list li:hover{background:#ece3d2;cursor: pointer;}
#search-box{padding: 5px;border: #a8d4b1 1px solid;border-radius:4px;}
</style>

<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
	$("#search-box").keyup(function(){
		$.ajax({
		type: "POST",
		url: "getcustomer.php",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search-box").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search-box").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>


<!-- Content (Right Column) -->
<div id="content" class="box">
<script src="newajax.js"></script>      







<form action="chalan_details.php" method="post" onSubmit="return validate_form(this);" name="adddesignation" autocomplete="off">


<table width="100%" border="4" cellpadding="0" cellspacing="0" >




<tr class="formblock_content_title " id="th17" >
<td  width="10%" colspan="2"> Search Section: <span class="red_star">*</span></td>
<td width="20%" align="left" colspan="2">

<select id="seacrh_sec_id" name="seacrh_sec_id" title="Select Joining Section" class="input-text" onchange="planchq();" >
<option value="">Select Search Section</option>
<option value="1"> By Mobile</option>
<option value="2"> By Name</option>
</select>
</td>
<td width="20%" align="left" colspan="2"><span class="tips"></span></td>
</tr>

<tr class="formblock_content_title " id="th1" style="display:none">
<td class="form_txt" width="10%" colspan="2" >Customer Mobile : <span class="red_star">*</span></td>
<td width="20%" align="left" colspan="2" >
<input name="customer_mobile" id="customer_mobile"  type="text" size="50"  class="input-text" onkeypress="return keyRestrict(event, '1234567890')" >
</td>
<td width="20%" align="left" colspan="2"><span class="tips"></span></td>
</tr>



<tr class="formblock_content_title " id="th2"  style="display:none">
<td class="form_txt" width="10%" colspan="2"  > Customer Name : <span class="red_star">*</span></td>
<td width="20%" align="left" colspan="2" >
<!--
<select title="Select Customer" class="input-text" id="customer_id" name="customer_id" >
<option value="">Select Customer</option>
<?
$city_det=$my->check_all($con,customer,st,1);
foreach($city_det as $k=>$v){
?>	  
<option value="<?=$v['customer_id']?>"><?=$v['customer_name']?></option>
<? } ?>	  
</select>
-->

<div class="frmSearch">
<input type="text" id="search-box" name="customer_name"  placeholder="Customer Name" autocomplete="off" style="width:200px;height:30px"  />
<div id="suggesstion-box"></div>
</div>

</td>
<td width="20%" align="left" colspan="2"  ><span class="tips"></span></td>
</tr>



<tr>
<td  align="center" colspan="6"><br>
<input type='submit' class='all_button' value='Submit' name='search_entry' id='submitBtn'>
</td>
</tr>
</table>
</form>

<span style="font-weight:bold;font-size:12px;color:brown"><?=$_GET[msg]?></span>






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
