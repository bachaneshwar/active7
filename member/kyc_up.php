<?php
include("include/top.php");
include("include/menu.php");


$mem_dtls=$my->total_row($con,member,spid,$_SESSION[spid]);



?>

<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
<div class="col-xs-12 dashboard-header">
<h1 class="dash-title">KYC Setting</h1>
<!-- //////////////////////////////////////////////////// Breadcrumb -->
<ol class="breadcrumb">
<li><a href="kyc_up.php?m=1"><i class="fa fa-home" aria-hidden="true"></i> KYC</a></li>
<li><a href="kyc_up.php?m=1" class="active">Upload</a></li>
</ol> <!-- /breadcrumb -->

</div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">




<script language="javascript" type="text/javascript" src="ajax.js"></script>

<div class="col-md-12 col-sm-12 col-xs-12">



<div class="panel">
<br/>

<div class="panel-heading">
<p class="text-muted">



</p>
</div> <!-- /panel-heading -->
<div class="panel-body m-t-0">

<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

if(isset($_POST[submit1]))
{

@mkdir("uploads");

$fname1	  = $_FILES[adhaar_image][name];
$tmp_name1 = $_FILES[adhaar_image][tmp_name];

$ext1 = strtolower(end(explode(".",$fname1)));
$sqlf = "select * from `member` where `spid` = '$_SESSION[spid]'";
$resf = mysqli_query($con,$sqlf);
$rowf = mysqli_fetch_array($resf);

if($fname1)
{
   if($ext1==jpg || $ext1==jpeg || $ext1==pdf || $ext1==png){
    unlink($rowf[Adhaar_Image]);

 		$path1 = "uploads/".$fname1;
 		move_uploaded_file($tmp_name1,$path1);

	$sql1 = "update `member` SET `adhaar_image`='$fname1' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql1);
  }
}

$sql_in="UPDATE `member` SET `aadhar`='$_POST[aadhar]',`aadhar_st`='1',`kyc_updt`='1' where `spid`='$_SESSION[spid]' ";
$res_in=mysqli_query($con,$sql_in);
if($res_in){$msg="update successfully";}
header("location:kyc_up.php?m=1");

}

if(isset($_POST[submit2]))
{

@mkdir("uploads");

$fname2	  = $_FILES[pan_image][name];
$tmp_name2 = $_FILES[pan_image][tmp_name];

$ext2 = strtolower(end(explode(".",$fname2)));


$sqlf = "select * from `member` where `spid` = '$_SESSION[spid]'";
$resf = mysqli_query($con,$sqlf);
$rowf = mysqli_fetch_array($resf);


if($fname2)
{
   if($ext2==jpg || $ext2==jpeg || $ext2==pdf || $ext2==png){
    unlink($rowf[PAN_Image]);

 		$path2 = "uploads/".$fname2;
 		move_uploaded_file($tmp_name2,$path2);

	$sql2 = "update `member` SET `pan_image`='$fname2' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql2);
  }
}



$sql_in="UPDATE `member` SET `pan`='$_POST[pan]',`pan_st`='1',`kyc_updt`='1' where `spid`='$_SESSION[spid]' ";
$res_in=mysqli_query($con,$sql_in);
if($res_in){$msg="update successfully";}
header("location:kyc_up.php?m=1");
}



if(isset($_POST[submit3]))
{

@mkdir("uploads");

$fname3	  = $_FILES[cheque_image][name];
$tmp_name3 = $_FILES[cheque_image][tmp_name];

$fname4	  = $_FILES[member_image][name];
$tmp_name4 = $_FILES[member_image][tmp_name];

$ext3 = strtolower(end(explode(".",$fname3)));
$ext4 = strtolower(end(explode(".",$fname4)));


$sqlf = "select * from `member` where `spid` = '$_SESSION[spid]'";
$resf = mysqli_query($con,$sqlf);
$rowf = mysqli_fetch_array($resf);


if($fname3)
{
   if($ext3==jpg || $ext3==jpeg || $ext3==pdf || $ext3==png){
    unlink($rowf[Image]);

 		$path3 = "uploads/".$fname3;
 		move_uploaded_file($tmp_name3,$path3);

  $sql3 = "update `member` SET `cheque_image`='$fname3' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql3);
  }
}

if($fname4)
{
   if($ext4==jpg || $ext4==jpeg || $ext4==pdf || $ext4==png){
    unlink($rowf[Image]);

 		$path4 = "uploads/".$fname4;
 		move_uploaded_file($tmp_name4,$path4);

    $sql3 = "update `member` SET `member_image`='$fname4' where `spid`='$_SESSION[spid]'";
	mysqli_query($con,$sql3);
  }
}

$sql_in="UPDATE `member` SET `paytm`='$_POST[paytm]',`acc_type`='$_POST[acc_type]',`bank_id`='$_POST[bank_id]',`branch`='$_POST[branch]',`acc_no`='$_POST[accno]',`account_name`='$_POST[account_name]',`ifsc_code`='$_POST[ifsc]',`bank_st`='1',`kyc_updt`='1' where `spid`='$_SESSION[spid]' ";
$res_in=mysqli_query($con,$sql_in);
if($res_in){$msg="update successfully";}
header("location:kyc_up.php?m=1");

}



$sql13="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res13=mysqli_query($con,$sql13);
$zrow3=mysqli_fetch_array($res13);
?>


<form action="" name="newform"   enctype="multipart/form-data" method="post" onsubmit="return validate_form(this)" >


<table class="table table-bordered">

<tr>
<td colspan="2"><center><h1>Aadhaar Update Panel</h1></center></td>
</tr>


<tr>
<td colspan="2"><br></td>
</tr>

<tr>
<td >Aadhaar  No <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control"  name="aadhar"  maxlength="12"  value="<?=$zrow3[aadhar]?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required ></td>
</tr>


<tr>
<td >Aadhaar  Card <span style="color:#ff0000">*</span></td>
<td>
<input type="file" class="form-control" name="adhaar_image"  id="adhaar_image" <?if($zrow3[adhaar_image]==""){?> required <? } ?>/>
<?
if($zrow3[adhaar_image]!=""){
?>
<img src="uploads/<?=$zrow3[adhaar_image]?>" width = "200" height = "200"   />
<? } ?>
</td>
</tr>



<tr>
<td colspan="2">
<center>
<?
if($zrow3[aadhar_updt]=='0'){
?>
<input type="submit" value="Aadhaar Update" name="submit1" class="btn btn-md bg-purple"/>
<? }else{ ?>
<p style="font-size:15px;font-weight:bold">Aadhaar is approved.</p>
<? } ?>
</center>
</td>
</tr>






</table>

</form>
<form action="" name="newform"   enctype="multipart/form-data" method="post" onsubmit="return validate_form(this)" >

<table class="table table-bordered">

<tr>
<td colspan="2"><center><h1>PAN Update Panel</h1></center></td>
</tr>


<tr>
<td colspan="2"><br></td>
</tr>

<tr>
<td >PAN No <span style="color:#ff0000">*</span></td>
<td>
<input type="text" class="form-control"  name="pan"  maxlength="10"  value="<?=$zrow3[pan]?>"  required >
</td>
</tr>


<tr>
<td >Pan Card <span style="color:#ff0000">*</span></td>
<td>
<input type="file" class="form-control" name="pan_image"  id="pan_image" <?if($zrow3[pan_image]==""){?> required <? } ?> />
<?
if($zrow3[pan_image]!=""){
?>
<img src="uploads/<?=$zrow3[pan_image]?>" width = "200" height = "200"   />
<? } ?>
</td>
</tr>

<tr>
<td colspan="2">
<center>
<?
if($zrow3[pan_updt]=='0'){
?>
<input type="submit" value="Pan Update" name="submit2" class="btn btn-md bg-purple"/>
<? }else{ ?>
<p style="font-size:15px;font-weight:bold">PAN is approved.</p>
<? } ?>
</center>
</td>
</tr>





</table>

</form>

<form action="" name="newform"   enctype="multipart/form-data" method="post" onsubmit="return validate_form(this)" >

<table class="table table-bordered">

<tr>
<td colspan="2"><center><h1>Bank Account Update Panel</h1></center></td>
</tr>


<tr>
<td colspan="2"><br></td>
</tr>

<!--
<tr>
<td >PAYTM Number <span style="color:#ff0000"></span></td>
<td><input type="text" name="paytm" value="<?=$zrow3[paytm]?>" class="form-control" maxlength="10" onkeypress="return keyRestrict(event, '1234567890')">
</td>
</tr>

<tr>
<td colspan="2"><br></td>
</tr>
-->

<tr>
<td >Account Type <span style="color:#ff0000">*</span></td>
<td>
<select name="acc_type" class="form-control" required>
<option value="" >Select Type</option>
<option value="Savings Account" <?php if($zrow3[acc_type]=="Savings Account"){?>selected<?}?>>Savings Account</option>
<option value="Current Account" <?php if($zrow3[acc_type]=="Current Account"){?>selected<?}?>>Current Account</option>
</select>

</td>

</tr>






<tr>

<td >Bank <span style="color:#ff0000">*</span></td>

<td>

<select id="bank_id" name="bank_id" class="form-control" required>
<option value="">Select Bank</option>
<?
$row_dt1=$my->check_all($con,bank,st,1);
foreach($row_dt1 as $k1=>$v1){
?>
<option value="<?=$v1['bank_id']?>" <?php if($v1[bank_id]==$zrow3[bank_id]){?>selected<?}?>><?=$v1['bank_name']?></option>
<?
}
?>
</select>

</td>

</tr>



<tr>

<td >Branch <span style="color:#ff0000">*</span></td>

<td><input type="text" name="branch" class="form-control" value="<?=$zrow3[branch]?>" required /></td>

</tr>


<tr>

<td >Account Number <span style="color:#ff0000">*</span></td>

<td><input type="text" name="accno" value="<?=$zrow3[acc_no]?>" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required /></td>

</tr>



<tr>

<td >Account Name <span style="color:#ff0000">*</span></td>

<td><input type="text" name="account_name" value="<?=$zrow3[account_name]?>" class="form-control" required /></td>

</tr>


<tr>
<td >IFSC Code <span style="color:#ff0000">*</span></td>
<td><input type="text" name="ifsc" value="<?=$zrow3[ifsc_code]?>" class="form-control" required /></td>
</tr>



<tr>
<td >Cancel Cheque/ Passbook <span style="color:#ff0000">*</span></td>
<td>
<input type="file" class="form-control" name="cheque_image"  id="cheque_image" <?if($zrow3[cheque_image]==""){?> required <? } ?>/>
<?
if($zrow3[cheque_image]!=""){
?>
<img src="uploads/<?=$zrow3[cheque_image]?>" width = "200" height = "200"   />
<? } ?>
</td>
</tr>


<tr>
<td >Photo <span style="color:#ff0000">*</span></td>
<td>
<input type="file" class="form-control" name="member_image"  id="member_image" <?if($zrow3[member_image]==""){?> required <? } ?>/>
<?
if($zrow3[member_image]!=""){
?>
<img src="uploads/<?=$zrow3[member_image]?>" width = "200" height = "200"   />
<? } ?>
</td>
</tr>


<tr>
<td colspan="2">
<center>
<?
if($zrow3[bank_updt]=='0'){
?>
<input type="submit" value="Bank Update" name="submit3" class="btn btn-md bg-purple"/>
<? }else{ ?>
<p style="font-size:15px;font-weight:bold">Account No is approved.</p>
<? } ?>
</center>
</td>
</tr>



</table>


</form>
<!-- /form-horizontal -->
</div>


<!-- /panel-body -->
</div> <!-- /panel-->
</div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>
