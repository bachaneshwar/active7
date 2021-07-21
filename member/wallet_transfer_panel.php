<?php 
include("include/top.php");
include("include/menu.php");



if($_POST[submit]!="")
{
$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];

if($_POST[pass]==$pass){

$sql7="SELECT * FROM  `ewallet` WHERE `spid`='$_SESSION[spid]'";
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

$sql71="UPDATE `ewallet` SET `rest_amt`='$ewallet_normal',`repurchase_amt`='$ewallet_repurchase' WHERE `spid`='$_SESSION[spid]'";
$res71=mysqli_query($con,$sql71);


$sql8="INSERT INTO `wallet_transfer_details`(`spid`,`transfer_by`,`amount`,`payment_dt`,`wallet_id`)VALUES('$_SESSION[spid]','$_SESSION[spid]','$payment_amt','$today','$_POST[wallet_id]')";
$res8=mysqli_query($con,$sql8);

$msg="Amounts are Successfully Transfered&st=5";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=wallet_transfer.php?msg='.$msg.'">';
}
else{
$msg1="You don't have enough amount.&st=5";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=wallet_transfer.php?msg1='.$msg1.'">';
}


}
else{
$msg1="Please Type Correct Transaction Password &st=5";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=wallet_transfer.php?msg1='.$msg1.'">';
}
}

$sqc="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
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
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">
function keyRestrict(e, validchars) {
var key='', keychar='';
key = getKeyCode(e);
if (key == null) return true;
keychar = String.fromCharCode(key);
keychar = keychar.toLowerCase();
validchars = validchars.toLowerCase();
if (validchars.indexOf(keychar) != -1)
return true;
if ( key==null || key==0 || key==8 || key==9 || key==13 || key==27 )
return true;
return false;
}
function getKeyCode(e) {
if (window.event)
return window.event.keyCode;
else if (e)
return e.which;
else
return null;
}
</script>
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
<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Repurchase Wallet</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> E-Wallet</a></li>
          <li><a href="#" class="active">Repurchase Wallet</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

            <div class="panel-heading">
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  method="post" action="" onsubmit="return validate_form(this)" autocomplete="off">
			



 <table class="table table-bordered"> 



<tr class="box-bg">
<td colspan="4">
<?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p style='color:green;font-weight:bold'>&nbsp;$msg</p>";
if($_REQUEST[msg1])
echo "<p style='color:red;font-weight:bold'>&nbsp;$_REQUEST[msg1]</p>";
?>	
</td>
</tr>
</tr>

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" style="color:green;font-weight:bold;font-size:14px"><?=$rem_msg?> Wallet</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle" style="color:green;font-weight:bold;font-size:14px"> 
<?=$remain_balance?>
<input type="hidden" name="balance_amt"  value="<?=$remain_balance?>" required readonly /> 
<input type="hidden" name="wallet_id"  value="<?=$_REQUEST[wallet_id]?>" required readonly /> 

</td>
</tr>


<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext">Transfer Amount</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle">
<input type="text" name="payment_amt" maxlength="5" onCopy="return false" onPaste="return false" onkeypress="return keyRestrict(event, '1234567890')" required /> 
</td>
</tr>



<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">Transaction Password</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><input name="pass" id="pass" type="password" class="field_gray" value="" required ></td>
</tr>

<tr>
<td  align='center' valign='middle' colspan="4"><input type="submit" name="submit" value="Fund Transfer" class="btn btn-md bg-purple"></td>
</tr>

</table>


 <!-- /form-horizontal -->
          </form>  
			</div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>