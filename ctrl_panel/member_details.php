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
<h1>Member</h1>
<small>Member Details</small>
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
<i class="fa fa-list"></i> Member Details
</div>
</div>


<?
if($_POST[call_submit]!=""){

 $bitcoin_address=mysqli_real_escape_string($con,$_POST[bitcoin_address]);

echo$query="UPDATE `member` SET `sname`='$_POST[sname]',`pass`='$_POST[pass]',`mob`='$_POST[mob]',`pan`='$_POST[pan]' ,`aadhar`='$_POST[aadhar]',`city`='$_POST[city]',`acc_type`='$_POST[acc_type]' WHERE `spid`='$_POST[spid]'";
$rows=mysqli_query($con,$query);

if($rows){
if($_POST[sub]==1){

$nurl="allmember.php?pg=$_POST[pg]&lid=$dtls_link[sublink_id]&";

echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';


}else{

$nurl="member_search.php?pg=$_POST[pg]&lid=$dtls_link[sublink_id]&";

echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';

}
}

}
?>




<script language="javascript" type="text/javascript" src="ajax.js"></script>


<div class="panel-body">


<script type="text/javascript">
function validate_form(form){
if( form.elements['sname'].value=="" ) { alert("Please type Member Name"); form.elements['sname'].focus(); return false; }
if( form.elements['pass'].value=="" ) { alert("Please type Password "); form.elements['pass'].focus(); return false; }
if( form.elements['mob'].value=="" ) { alert("Please type your Mobile no."); form.elements['mob'].focus(); return false; }
if( form.elements['mob'].value!="" ) {
var number = form.elements['mob'].value;
var number1=number.length;
if(number1!=10){alert("Please type valid Number"); form.elements['mob'].focus(); return false; }
}
}
</script>

<?
$member_det=$my->total_row($con,member,spid,$_REQUEST[spid]);
?>


<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">

<tr>
	<td colspan="2"><br></td>
</tr>



<tr>
<td>Member Name <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="sname" id="sname" value="<?=$member_det[sname]?>" ></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>




<tr>
	<td >Password <span style="color:#ff0000">*</span></td>
	<td><input type="password" class="form-control" name="pass" value="<?=$member_det[pass]?>" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>



<tr>
	<td >Mobile Number <span style="color:#ff0000">*</span></td>
	<td><input type="text" name="mob" value="<?=$member_det[mob]?>" class="form-control" maxlength="10" onkeypress="return keyRestrict(event, '1234567890')">
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<!-- <tr>
	<td >Father Name</td>
	<td><input type="fname" name="fname" value="<?=$member_det[fname]?>" class="form-control" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >E-mail</td>
	<td><input type="email" name="email" value="<?=$member_det[email]?>" class="form-control"  ></td>
</tr> -->
<tr>
	<td colspan="2"><br></td>
</tr>

<!-- <tr>
	<td >Address</td>
		<td><textarea name="addr" class="form-control"  rows="6" cols="24"><?=$member_det[addr]?></textarea></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr> -->


<!-- <tr>
	<td >DOB </td>
	<td><input type="date" name="dob" class="form-control"  value="<?=$member_det[dob]?>" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->



<?php
$value_det=$my->total_row($con,district,district_id,$member_det[district_id]);
$value_det1=$my->total_row($con,state,state_id,$value_det[state_id]);
$value_det2=$my->total_row($con,country,country_id,$value_det1[country_id]);
?>

<!-- <tr>
<td> Country <span style="color:#ff0000">*</span></td>
<td>

<select id="country_id" name="country_id"  onchange="return ajax1();" class="form-control" required>
<option value="">Select Country</option>
<?
$row_dt1=$my->check_all($con,country,st,1);
foreach($row_dt1 as $k1=>$v1){
?>
<option value="<?=$v1['country_id']?>" <? if($v1['country_id']==$value_det2[country_id]){?>Selected<?}?>><?=$v1['country_name']?></option>
<?
}
?>
</select>

</td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->

<!-- <tr>
<td> State <span style="color:#ff0000">*</span></td>
<td>
<div id="waitsubcat" >
<select class="form-control"  id="state_id1" name="state_id"  onchange="return ajax2();">
<?
$state_det=$my->search_row2($con,state,country_id,$value_det1['country_id'],st,1);
foreach($state_det as $k=>$v){
?>
      <option value="<?=$v[state_id]?>" <? if($v['state_id']==$value_det1[state_id]){?>Selected<?}?>><?=$v[state_name]?></option>
<? } ?>
</select>
</div>
<div id="loadsubcat"></div>
</td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr>
<tr>
<td> District <span style="color:#ff0000">*</span></td>
<td>
<div id="waitspeci">
<select class="form-control"  id="district_id" name="district_id" >
<?
$district_det=$my->search_row2($con,district,state_id,$value_det['state_id'],st,1);
foreach($district_det as $k=>$v){
?>
      <option value="<?=$v[district_id]?>" <? if($v['district_id']==$member_det[district_id]){?>Selected<?}?>><?=$v[district_name]?></option>
<? } ?>
</select>


</div>
<div id="loadspeci"></div>
</td>
</tr> -->

<!-- <tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >City/Town</td>
	<td>
	<input type="text" name="city" class="form-control" value="<?=$member_det[city]?>" >

	</td>
</tr> -->

<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->



<!-- <tr>
	<td >Pin Code</td>
	<td>
	<input type="text" name="pincode" class="form-control" value="<?=$member_det[pincode]?>" >

	</td>
</tr> -->


<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >Aadhar No <span style="color:#ff0000"></span></td>
	<td><input type="text" class="form-control"  name="aadhar"  maxlength="12"  value="<?=$member_det[aadhar]?>" value="" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >PAN No <span style="color:#ff0000"></span></td>
	<td><input type="text" class="form-control"  name="pan"  maxlength="10" value="<?=$member_det[pan]?>" value="" ></td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr>







<!-- <tr>
	<td >Account Type</td>
	<td>
<select name="acc_type" class="form-control">
<option value="">Select Account Type </option>
<option value="Savings Account" <? if($member_det[acc_type]=="Savings Account"){?> selected <? } ?> >Savings Account</option>
<option value="Current Account" <? if($member_det[acc_type]=="Current Account"){?> selected <? } ?> >Current Account</option>
</select>
	</td>
</tr> -->
<tr>
	<td colspan="2"><br></td>
</tr>

<!-- <tr>
	<td >Account Name</td>
	<td><input type="text" name="account_name" class="form-control" value="<?=$member_det[account_name]?>" ></td>
</tr> -->
<tr>
	<td colspan="2"><br></td>
</tr>

<!-- <tr>
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
</tr> -->
<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >Branch</td>
	<td><input type="text" name="branch" class="form-control" value="<?=$member_det[branch]?>" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<!-- <tr>
	<td >Account Number </td>
	<td><input type="text" name="acc_no" value="<?=$member_det[acc_no]?>" class="form-control" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >IFSC Code</td>
	<td><input type="text" name="ifsc_code" value="<?=$member_det[ifsc_code]?>" class="form-control" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Nominee Name</td>
	<td><input type="text" name="nominee_name" class="form-control"  value="<?=$member_det[nominee_name]?>"  ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Nominee Relation</td>
	<td><input type="text" name="nominee_rel" class="form-control"  value="<?=$member_det[nominee_rel]?>" ></td>
</tr> -->

<tr>
	<td colspan="2"><br></td>
</tr>

<tr >
<td colspan="2">
<input type="hidden" name="spid" class="form-control" value="<?=$member_det[spid]?>" readonly />
<input type="hidden" name="sub" class="form-control" value="<?=$_REQUEST[sub]?>" readonly />
<input type="hidden" name="pg" class="form-control" value="<?=$_REQUEST[pg]?>" readonly />

</td>
</tr>


<tr>
	<td colspan="2"><br></td>
</tr>

</table>




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>




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
