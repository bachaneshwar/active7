<?php
include("include/top.php");
include("include/menu.php");





?>

<?

if($_POST[call_submit]!=""){

$sql1="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_array($res1);
$remain_amt=$row1[rest_amt];

$doj=date("Y-m-d");

if($_POST[package_id]!="" && $_POST[fullpin]>0){

$sql1p="SELECT * FROM `package` WHERE `package_id`='$_POST[package_id]'";
$res1p=mysqli_query($con,$sql1p);
$row1p=mysqli_fetch_array($res1p);


$pack_amt=$row1p[package_amount]*$_POST[fullpin];


if($remain_amt>=$pack_amt){

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$numspid=mysqli_num_rows($res);

if($numspid>0){
$num=$_POST[fullpin];


$tsql="INSERT INTO `epin_transfer` (`trans_by`,`pin_no`,`trans_date`,`spid`,`package_id`)VALUES('$_SESSION[spid]','$num','$doj','$_SESSION[spid]','$_POST[package_id]')";
$tres=mysqli_query($con,$tsql);
$transfer_id=mysqli_insert_id($con);



$sql_sum="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res_sum=mysqli_query($con,$sql_sum);
$row_sum=mysqli_fetch_array($res_sum);
$final_amt=$row_sum[rest_amt]-$pack_amt;

$sql1w="UPDATE `ewallet` SET `rest_amt`='$final_amt' WHERE `spid`='$_SESSION[spid]'";
$res1w=mysqli_query($con,$sql1w);

if($tres){

for($i=0;$i<$num;$i++){
$full=rand(1,999999999);
$substr=substr($full,1,7);
$pin=$full;
$sql="INSERT INTO `e-pin` (`generatedid`,`pin`,`date`,`memtransid`,`transfer`,`package_id`,`pin_type`,`transfer_id`)VALUES('$_SESSION[spid]','$pin','$doj','$_SESSION[spid]','mywallet','$_POST[package_id]','Topup','$transfer_id')";
$res=mysqli_query($con,$sql);
}




$nurl="$log_url?msg=EPINS SUCCESSFULLY Created.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';

}



}
else{
$nurl="$log_url?msg=Member ID is invalid.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
}

}else{
$nurl="$log_url?msg=Not Enough money.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
}


}
else{
$nurl="$log_url?msg=Operarion Failed";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';
}

}
?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

	<script type="text/javascript">
function validate_form(form){
if( form.elements['package_id'].value=="" ) { alert("Please select one Product"); form.elements['package_id'].focus(); return false; }
if( form.elements['fullpin'].value=="" ) { alert("Please type E-Pin No."); form.elements['fullpin'].focus(); return false; }
}
</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">MyWallet Status</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> MyWallet</a></li>
          <li><a href="current_ewallet_status.php?m=5" class="active">MyWallet Status</a></li>
        </ol> <!-- /breadcrumb -->

    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">



    <div class="col-md-12 col-sm-12 col-xs-12">



        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3>MyWallet Status</h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <table class="table table-bordered">
<!--
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Total Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;<?=$total_amt?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
-->


<form action="" method="post" name="newform" onsubmit="return validate_form(this)">

<tr>
<td><span style="color:green;font-size:13px;font-weight:bold">Select a Package</span></td>
<td>&nbsp;&nbsp;:</td>
<td>
<select class="form-control" name="package_id"  required>
<option value="">Select Package </option>
<?
$area_det=$my->check_all_asc($con,package,st,1,package_id);
foreach($area_det as $k1=>$v1){
?>
<option value="<?=$v1[package_id]?>"><?=$v1[package_name]?>(<?=$v1[package_amount]?>)</option>
<?}?>
</select>
</td>

</tr>
<tr>
<td><span style="color:green;font-size:13px;font-weight:bold">Pin no.</span></td>
<td>&nbsp;&nbsp;:</td>
<td><input type="number" class="form-control" name="fullpin" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required></td>

</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<?PHP IF($_SESSION[kyc]=="1"){ ?>
<tr>
<td colspan="3">
<center>
<input type="submit" name="call_submit" class="btn btn-md bg-purple"  value="Submit" />
</center>

</td>

</tr>
<?php } ?>
</form>
     <?php
        $msg=$_REQUEST[msg];
        echo "<center><font color=\"#ff0066\" size=\"2\">".$msg."</font></center>";

         ?>

<!--
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Withdrawal Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;  <?=$row1[withdrawal]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Transfer Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;  <?=$row1[send_transfer_amt]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Receiving Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;  <?=$row1[get_transfer_amt]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>

<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Total Investment Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp;<?=$row1[invest_amt]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>





<tr>
<td><span style="color:#ff0000;font-size:13px;font-weight:bold">Total Payout Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><span style="color:#663300;font-size:12px;font-weight:bold">&nbsp;&nbsp; <?=$row1[ref_bonus]?></span></td>
</tr>
<tr>
<td colspan="3"><br></td>
</tr>
-->
</table>
 <!-- /form-horizontal -->
            </div>


			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>
