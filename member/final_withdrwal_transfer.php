<?php 
include("include/top.php");
include("include/menu.php");


ob_start();
$date=date("Y-m-d");
$dateget=getdate(strtotime($date));
$week_day=$dateget['weekday'];

$last_day=date("Y-m-d",strtotime("+1 month -1 second",strtotime(date("Y-m-1"))));
$today=date("Y-m-d");

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];
$pack_st=$row[st];

$sqc="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$rqc=mysqli_query($con,$sqc);
$rowqc=mysqli_fetch_array($rqc);

$sqlm_1="SELECT * FROM `amount_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);

$total_amt=$_POST['amount'];


$final_amount=($total_amt+$tds_amt+$sc_amt);



if($_POST[submit_with]!=""){

if($_POST[pass]==$pass){



$total_amt=$_POST['amount'];
$final_amount=($total_amt);


if($rowqc[rest_amt]>=$final_amount){

$ewallet_wd     = ($rowqc[withdrawal]+$total_amt);
$ewallet_bal    = ($rowqc[rest_amt]-$final_amount);


if($ewallet_bal>=0){



$sql8="INSERT INTO `withdrawal`(`spid`,`amount`,`apply_dt`)VALUES('$_SESSION[spid]','$_POST[amount]','$date')";
$res8=mysqli_query($con,$sql8);
if($res8){

$sql71="UPDATE `ewallet` SET `rest_amt`='$ewallet_bal',`withdrawal`='$ewallet_wd' WHERE `spid`='$_SESSION[spid]'";
$res71=mysqli_query($con,$sql71);

}


$msg="Sucessfully applied to Administrator";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=withdrwal_transfer.php?m=5&msg1='.$msg1.'">';
}
else{
$msg1="You do n't have sufficent balance.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=withdrwal_transfer.php?m=5&msg1='.$msg1.'">';
}

}
else{
$msg1="Please Type Correct Amount.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=withdrwal_transfer.php?m=5&msg1='.$msg1.'">';
}

}else{
$msg1="Please Type Correct Transaction Password";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=withdrwal_transfer.php?m=5&msg1='.$msg1.'">';
}



}
$today=date("Y-m-d");
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
if( form.elements['amount'].value=="" ) { alert("Please type Amount."); form.elements['amount'].focus(); return false; }
}
</script>

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Withdrawal</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> E-Wallet</a></li>
          <li><a href="withdrwal_transfer.php?m=5" class="active">Withdrawal</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
<?php		
$zsql="SELECT * FROM `amount_rate` WHERE `id`='1'";
$zres=mysqli_query($con,$zsql);
$zrow=mysqli_fetch_array($zres);
$withdraw_limit=$zrow[withdrawal];

if($_POST[amount]<$withdraw_limit){
header("location:withdrwal_transfer.php?msg1=Minimum withdrawal limit $withdraw_limit.");		
}
?>		
		
		<br/>

            <div class="panel-heading">
                <h3>Withdrawal Confirmation Panel</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  method="post" action="final_withdrwal_transfer.php?m=5" onsubmit="return validate_form(this)" autocomplete="off">
			
     <table class="table table-bordered"> 



<tr>
<td colspan="4"><br></td>
</tr>
</tr>

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">Amount</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><b></b>
<?=$_POST[amount]?>
<input type="hidden" name="amount" value="<?=$_POST[amount]?>" onkeypress="return keyRestrict(event, '1234567890')" readonly required/ /> 
</td>
</tr>




<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">Transaction Password</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><input name="pass" id="pass" type="password" class="field_gray" value="" required></td></tr>

<tr>
<td colspan="4"><br></td>
</tr>
</tr>

<tr>
<td  colspan="4" align='center' valign='middle'>
<center><input type="submit" name="submit_with" value="Withdrawal" class="btn btn-md bg-purple"></center>
</td>
</tr>

</table>








<tr>
<td align="center" style="color:red">
<br/>
</td>
</tr>

</table>
 <!-- /form-horizontal -->
          </form>    </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>