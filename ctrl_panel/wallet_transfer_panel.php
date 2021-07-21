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


if($_POST[transfer_submit]!="")
{
$sql="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);


$sql7="SELECT * FROM  `ewallet` WHERE `spid`='$_POST[spid]'";
$res7=mysqli_query($con,$sql7);
$num7=mysqli_num_rows($res7);
$row7=mysqli_fetch_array($res7);

$payment_amt=$_POST[payment_amt];
$rep_amt=$row7[repurchase_amt];
$rest_amt=$row7[rest_amt];

if($_POST[wallet_id]==1){
$balance_chk=$rest_amt;
}else{
$balance_chk=$rep_amt;
}

if($payment_amt<=$balance_chk){
$today=date("Y-m-d");

if($_POST[wallet_id]==1){
$ewallet_normal=$rest_amt-$payment_amt;
$ewallet_repurchase=$rep_amt+$payment_amt;
}else{
$ewallet_normal=$rest_amt+$payment_amt;
$ewallet_repurchase=$rep_amt-$payment_amt;
}

$sql71="UPDATE `ewallet` SET `rest_amt`='$ewallet_normal',`repurchase_amt`='$ewallet_repurchase' WHERE `spid`='$_POST[spid]'";
$res71=mysqli_query($con,$sql71);


$sql8="INSERT INTO `wallet_transfer_details`(`spid`,`transfer_by`,`amount`,`payment_dt`,`wallet_id`)VALUES('$_SESSION[spid]','ADMIN','$payment_amt','$today','$_POST[wallet_id]')";
$res8=mysqli_query($con,$sql8);

$msg="Amounts are Successfully Transfered&st=5";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=wallet_to_wallet.php?msg='.$msg.'">';
}
else{
$msg1="You don't have enough amount.&st=5";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=wallet_to_wallet.php?msg1='.$msg1.'">';
}




}





$sqc1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$rqc1=mysqli_query($con,$sqc1);
$rowqc1=mysqli_fetch_array($rqc1);
if($rowqc1[spid]==""){
$msg1="Please Type Correct Member ID.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=wallet_to_wallet.php?msg1='.$msg1.'">';
}

$sqc="SELECT * FROM `ewallet` WHERE `spid`='$_POST[spid]'";
$rqc=mysqli_query($con,$sqc);
$rowqc=mysqli_fetch_array($rqc);


if($_REQUEST[wallet_id]==2){
$rem_msg="Repurchase";
$remain_balance=$rowqc[repurchase_amt];
}else{
$rem_msg="Noramal";
$remain_balance=$rowqc[rest_amt];
}



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
<div class="header-icon"><i class="fa fa-shopping-basket"></i></div>
<div class="header-title">
<h1>E-Wallet</h1>
<small>Wallet to Wallet Transfer</small>
</div>
</section>	

<!-- Main content -->
<section class="content">

<script type="text/javascript">
function validate_form(form){
if( form.elements['payment_amt'].value=="" ) { alert("Please type Transfer Amount."); form.elements['payment_amt'].focus(); return false; }
if( form.elements['payment_amt'].value!="" ) {
var val1=0,val2=0;
val1=parseFloat(form.elements['balance_amt'].value);
val2=parseFloat(form.elements['payment_amt'].value);
if(val2>val1){alert("Please type Correct Transfer Amount."); form.elements['payment_amt'].focus(); return false;}
}
if( form.elements['pass'].value=="" ) { alert("Please type Transaction Password."); form.elements['pass'].focus(); return false; }
}
</script>





<div class="row">
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist"> 

<i class="fa fa-list"></i> Wallet to Wallet Transfer
</div>
</div>
<div class="panel-body">
<center>
<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext">Member Id</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><?=$_REQUEST[spid]?>   ( <?=$rowqc1[sname]?> )</td>
</tr>



<tr><td colspan="2"><br/></td></tr>

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" style="color:green;font-weight:bold;font-size:14px"><?=$rem_msg?> Wallet</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle" style="color:green;font-weight:bold;font-size:14px"> 
<?=$remain_balance?>
<input type="hidden" name="balance_amt"  value="<?=$remain_balance?>" required readonly /> 
<input type="hidden" name="wallet_id"  value="<?=$_REQUEST[wallet_id]?>" required readonly /> 
<input type="hidden" name="spid"  value="<?=$_REQUEST[spid]?>" required readonly /> 

</td>
</tr>
<tr><td colspan="2"><br/></td></tr>


<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext">Transfer Amount</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle">
<input type="text" name="payment_amt" maxlength="5" onCopy="return false" onPaste="return false" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"  required /> 
</td>
</tr>

	
<tr><td colspan="2"><br/></td></tr>

</table> 
<div class="form-group">
<input type="hidden" name="st" value="1" />
<input type="submit" name="transfer_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>
</form>
</center>



<div class="table-responsive">

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