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

$sq="SELECT * FROM `ewallet` WHERE `spid`='$_POST[spid]'";
$rq=mysqli_query($con,$sq);
$rowq=mysqli_fetch_array($rq);
$nq=mysqli_num_rows($rq);
if($nq>0){
if($_POST[spid]!="$_SESSION[spid]"){
$sql7="SELECT * FROM  `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res7=mysqli_query($con,$sql7);
$num7=mysqli_num_rows($res7);
$row7=mysqli_fetch_array($res7);

$user1=$row7[rest_amt];
$rest_amt=$_POST[rest_amt];


if($rest_amt<=$user1){
$today=date("Y-m-d");
$ewallet_res_amt=$user1-$rest_amt;

$updtamt=$rest_amt+$rowq[rest_amt];
$totamt=$rest_amt+$rowq[total_amt];

$send_transfer_amt=$row7[send_transfer_amt]+$rest_amt;
$get_transfer_amt=$rowq[get_transfer_amt]+$rest_amt;

$sql71="UPDATE `ewallet` SET `rest_amt`='$ewallet_res_amt',`send_transfer_amt`='$send_transfer_amt' WHERE `spid`='$_SESSION[spid]'";
$res71=mysqli_query($con,$sql71);

$sql72="UPDATE `ewallet` SET `rest_amt`='$updtamt',`total_amt`='$totamt',`get_transfer_amt`='$get_transfer_amt' WHERE `spid`='$_POST[spid]'";
$res72=mysqli_query($con,$sql72);

$sql8="INSERT INTO `transfer_details`(`spid`,`transfer_id`,`amount`,`payment_dt`,`transfer_mode`)VALUES('$_POST[spid]','$_SESSION[spid]','$rest_amt','$today','Transfer')";
$res8=mysqli_query($con,$sql8);

$msg="Amounts are Successfully Transfered to $_POST[spid]&st=5";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL=fund_transfer.php?msg='.$msg.'">';
}
else{
$msg1="You don't have enough amount.&st=5";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=fund_transfer.php?msg1='.$msg1.'">';
}
}
else{
$msg1="You can't transfer amount your own account&st=5";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=fund_transfer.php?msg1='.$msg1.'">';
}
}
else{
$msg1="Please Type Correct Associate ID &st=5";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=fund_transfer.php?msg1='.$msg1.'">';
}
}
else{
$msg1="Please Type Correct Transaction Password &st=5";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=fund_transfer.php?msg1='.$msg1.'">';
}
}

$sqc="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$rqc=mysqli_query($con,$sqc);
$rowqc=mysqli_fetch_array($rqc);


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
if( form.elements['wallet_id'].value=="" ) { alert("Please choose Wallet Type."); form.elements['wallet_id'].focus(); return false; }
}
</script>
<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Wallet To Wallet Transfer</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> E-Wallet</a></li>
          <li><a href="#" class="active">Wallet To Wallet Transfer Panel</a></li>
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
			
			
<form class="form-horizontal"  method="post" action="wallet_transfer_panel.php" onsubmit="return validate_form(this)" autocomplete="off">	
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

<tr>
	<td >Wallet Type<span style="color:#ff0000">*</span></td>
<td>
<select class="form-control" name="wallet_id" id="wallet_id"  required>
<option value="">Select Wallet </option>
<option value="1">Noraml Wallet To Repurchase Wallet</option>
<option value="2">Repurchase Wallet To Noraml Wallet</option>
</select>
</td>
</tr>
<tr ><td colspan="2"><br/></td></tr>
<tr >
<td colspan="2">
<center><input type="submit" name="call_trans" class="btn btn-md bg-purple" value="Submit" /></center>
</td>
</tr>
</table>
</form>    


</div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>