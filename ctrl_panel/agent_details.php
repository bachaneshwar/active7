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
<h1>Agent</h1>
<small>Active Agent Details</small>
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
<i class="fa fa-list"></i> Active Agent Details
</div>
</div>


<?
if($_POST[call_submit]!=""){

$bitcoin_address=mysqli_real_escape_string($con,$_POST[bitcoin_address]);

$query="UPDATE `sales_agent` SET `sname`='$_POST[sname]',`fname`='$_POST[fname]',`mother_name`='$_POST[mother_name]',`dob`='$_POST[dob]',`mob`='$_POST[mob]',`sex`='$_POST[sex]',`addr`='$_POST[addr]',`country`='$_POST[country]',`state`='$_POST[state]',`pincode`='$_POST[pincode]',`bank`='$_POST[bank]',`branch`='$_POST[branch]',`acc_no`='$_POST[acc_no]',`pan`='$_POST[pan]' ,`ifsc_code`='$_POST[ifsc_code]',`nominee_name`='$_POST[nominee_name]',`nominee_rel`='$_POST[nominee_rel]',`email`='$_POST[email]',`aadhar`='$_POST[aadhar]',`city`='$_POST[city]',`acc_type`='$_POST[acc_type]',`paytm`='$_POST[paytm]',`bitcoin_address`='$bitcoin_address' WHERE `agent_code`='$_POST[agent_code]'";
$rows=mysqli_query($con,$query);	

if($rows){
if($_POST[sub]==1){
header("location:agent_join_dtls.php?pg=$_POST[pg]");
}else{
header("location:member_search.php?pg=$_POST[pg]");
}
}

}
?>




<script language="javascript" type="text/javascript" src="ajax.js"></script>                 


<div class="panel-body">

			
<script type="text/javascript">
function validate_form(form){
if( form.elements['sname'].value=="" ) { alert("Please type Name"); form.elements['sname'].focus(); return false; }
if( form.elements['mob'].value=="" ) { alert("Please type your Mobile no."); form.elements['mob'].focus(); return false; }
if( form.elements['mob'].value!="" ) { 
var number = form.elements['mob'].value;
var number1=number.length;
if(number1!=10){alert("Please type valid Number"); form.elements['mob'].focus(); return false; }  
}
}
</script>	

<?
$member_det=$my->total_row($con,sales_agent,agent_code,$_REQUEST[agent_code]);
?>


<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">

<tr>
	<td colspan="2"><br></td>
</tr>



<tr>
<td>Name <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="sname" id="sname" value="<?=$member_det[sname]?>" ></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>




<tr>
	<td >Mobile Number <span style="color:#ff0000">*</span></td>
	<td><input type="text" name="mob" value="<?=$member_det[mob]?>" class="form-control" maxlength="10" onkeypress="return keyRestrict(event, '1234567890')">
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >E-mail</td>
	<td><input type="email" name="email" value="<?=$member_det[email]?>" class="form-control"  ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Address</td>
		<td><textarea name="addr" class="form-control"  rows="6" cols="24"><?=$member_det[addr]?></textarea></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >City </td>
	<td><input type="text" name="city" class="form-control"  value="<?=$member_det[city]?>" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >State </td>
	<td><input type="text" name="state" class="form-control" value="<?=$member_det[state]?>" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >Country</td>
	<td>
	<input type="text" name="state" class="form-control" value="<?=$member_det[country]?>" >
  
	</td>
</tr>

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



<tr>
	<td >PAYTM Number <span style="color:#ff0000"></span></td>
	<td><input type="text" name="paytm" value="<?=$member_det[paytm]?>" class="form-control" maxlength="10" onkeypress="return keyRestrict(event, '1234567890')">
	</td>
</tr>
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
	<td >Bank Name</td>
	<td><input type="text" name="bank" class="form-control" value="<?=$member_det[bank]?>" ></td>
</tr>
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
<tr>
	<td >Account Number </td>
	<td><input type="text" name="acc_no" value="<?=$member_det[acc_no]?>" class="form-control" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >IFSC Code</td>
	<td><input type="text" name="ifsc_code" value="<?=$member_det[ifsc_code]?>" class="form-control" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Nominee Name</td>
	<td><input type="text" name="nominee_name" class="form-control"  value="<?=$member_det[nominee_name]?>"  ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Nominee Relation</td>
	<td><input type="text" name="nominee_rel" class="form-control"  value="<?=$member_det[nominee_rel]?>" ></td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr>

<tr >
<td colspan="2">
<input type="hidden" name="agent_code" class="form-control" value="<?=$member_det[agent_code]?>" readonly />
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