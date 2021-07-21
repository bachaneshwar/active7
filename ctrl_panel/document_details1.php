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


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="fa fa-users"></i></div>
<div class="header-title">
<h1>Master Distributor</h1>
<small>Distributor Details</small>
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
<i class="fa fa-list"></i> KYC Details
</div>
</div>


<?
if($_POST[approved]!=""){


if($_REQUEST[mid]==1){
$my->normal_UPDATE1($con,member,aadhar_updt,1,spid,$_REQUEST[spid]);
}
if($_REQUEST[mid]==2){
$my->normal_UPDATE1($con,member,pan_updt,1,spid,$_REQUEST[spid]);
}
if($_REQUEST[mid]==3){
$my->normal_UPDATE1($con,member,bank_updt,1,spid,$_REQUEST[spid]);
}

$member_det=$my->total_row($con,member,spid,$_REQUEST[spid]);

if($member_det[aadhar_updt]==1 && $member_det[pan_updt]==1 && $member_det[bank_updt]==1){
$my->normal_UPDATE3($con,member,kyc_status,1,kyc_approve_dt,$today_date,spid,$_REQUEST[spid]);
}



$nurl="pending_kyc1.php?pg=$_POST[pg]&lid=102";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	



}


?>




<script language="javascript" type="text/javascript" src="ajax.js"></script>                 


<div class="panel-body">


<?
$member_det=$my->total_row($con,member,spid,$_REQUEST[spid]);
?>


<form action="" method="post" name="newform" onsubmit="return validate_form(this);" enctype="multipart/form-data">
  <table style="width:100%">

<?
if($_REQUEST[mid]==1){
?>
  
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Aadhar No <span style="color:#ff0000"></span></td>
	<td><input type="text" name="aadhar" class="form-control"  value="<?=$member_det[aadhar]?>" ></td>

</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Aadhar Card <span style="color:#ff0000"></span></td>
	<td>
	
	<? if($member_det[adhaar_image]!=""){?><a href="../member/uploads/<?=$member_det[adhaar_image]?>"  target="_blank"><img src="../member/uploads/<?=$member_det[adhaar_image]?>" width = '200' height = '200' target="_blank"></a><?}?>
	
	</td>

</tr>
<?}?>

<?
if($_REQUEST[mid]==2){
?>

<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >PAN No <span style="color:#ff0000"></span></td>
	<td><input type="text" name="pan" class="form-control"  value="<?=$member_det[pan]?>" ></td>

</tr>

<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >PAN Card <span style="color:#ff0000"></span></td>
	<td>
	
	<? if($member_det[pan_image]!=""){?><a href="../member/uploads/<?=$member_det[pan_image]?>"  target="_blank"><img src="../member/uploads/<?=$member_det[pan_image]?>" width = '200' height = '200' target="_blank"></a><?}?>
	
	</td>

</tr>
<?}?>
<?
if($_REQUEST[mid]==3){
?>

<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Account Type</td>
	<td>
<select name="acc_type" class="form-control">
<option value="">Select Account Type </option>
<option value="Savings Account" <? if($member_det[acc_type]=="Savings Account"){?> selected <? } ?> >Savings Account</option>
<option value="Current Account" <? if($member_det[acc_type]=="Current Account"){?> selected <? } ?> >Current Account</option>
</select>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >Bank Name <span style="color:#ff0000"></span></td>
	<td><select id="bank_id" name="bank_id" class="form-control" >
<option value="">Select Bank</option>
<?
$row_dt1=$my->check_all($con,bank,st,1);
foreach($row_dt1 as $k1=>$v1){
?>
<option value="<?=$v1['bank_id']?>" <?php if($v1[bank_id]==$member_det[bank_id]){?>selected<?}?>><?=$v1['bank_name']?></option>
<?
}
?>
</select></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Branch <span style="color:#ff0000"></span></td>
	<td><input type="text" name="branch" id="branch"  class="form-control" value="<?=$member_det[branch]?>" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>



<tr>
	<td >Account Number </td>
	<td><input type="text" name="accno" id="accno" value="<?=$member_det[acc_no]?>" class="form-control" maxlength="16" ></td>
</tr>
<tr>
	<td colspan="2"><input type="hidden" name="accno_det" id="accno_det" value="0" readonly><br></td>
</tr>

<tr>
	<td >Account Name </td>
	<td><input type="text" name="account_name" id="account_name" value="<?=$member_det[account_name]?>" class="form-control"  ></td>
</tr>
<tr>
	<td colspan="2"><input type="hidden" name="accno_det" id="accno_det" value="0" readonly><br></td>
</tr>


<tr>
	<td >IFSC Code <span style="color:#ff0000"></span></td>
	<td><input type="text" name="ifsc" id="ifsc" value="<?=$member_det[ifsc_code]?>" class="form-control" onkeyup="ajax31();ajax32();ajax33();"></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >Cancel Cheque/ Passbook <span style="color:#ff0000"></span></td>
	<td>
	<? if($member_det[cheque_image]!=""){?><a href="../member/uploads/<?=$member_det[cheque_image]?>"  target="_blank"><img src="../member/uploads/<?=$member_det[cheque_image]?>" width = '200' height = '200' target="_blank"></a><?}?>
	</td>
</tr>


<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Photo  <span style="color:#ff0000"></span></td>
	<td>
	<? if($member_det[member_image]!=""){?><a href="../member/uploads/<?=$member_det[member_image]?>"  target="_blank"><img src="../member/uploads/<?=$member_det[member_image]?>" width = '200' height = '200' target="_blank"></a><?}?>
	</td>

</tr>
<?}?>

<tr>
	<td colspan="2"><br></td>
</tr>



<tr >
<td colspan="2">
<input type="hidden" name="spid" class="form-control" value="<?=$member_det[spid]?>" readonly />
<input type="hidden" name="sub" class="form-control" value="<?=$_REQUEST[sub]?>" readonly />
<input type="hidden" name="pg" class="form-control" value="<?=$_REQUEST[pg]?>" readonly />
<input type="hidden" name="mid" class="form-control" value="<?=$_REQUEST[mid]?>" readonly />

</td>
</tr>



</table> 


<?php
if($member_det[kyc_status]==0){
?>

<div class="form-group">
<center>
<input type="submit" name="approved" class="btn btn-success"  value="Approved" onclick="return confirm('Are you sure to Approved?')" />
</center>
</div>

<?}?>


</form>


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>

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