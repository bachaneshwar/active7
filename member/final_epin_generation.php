<?php 
include("include/top.php");
include("include/menu.php");


$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];
$pack_st=$row[st];


$package_det=$my->total_row($con,package,package_id,$_POST[package_id]);
$total_pin_amt=($package_det[package_amount]*$_POST[fullpin]);

$sqc="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$rqc=mysqli_query($con,$sqc);
$rowqc=mysqli_fetch_array($rqc);

$sqlm_1="SELECT * FROM `amount_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);

$total_amt=$total_pin_amt;

if($row[pan]!=""){
$tds_amt=round(($total_amt*$rowlm_1[tds])/100);
}else{
$tds_amt=round(($total_amt*$rowlm_1[tds_pan])/100);
}
$sc_amt=round(($total_amt*$rowlm_1[sc])/100);
$final_amount=($total_amt+$tds_amt+$sc_amt);


$total_charge=$total_pin_amt+$tds_amt+$sc_amt;
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






if($remain_amt>=$total_charge){

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$numspid=mysqli_num_rows($res);

if($numspid>0){          
$num=$_POST[fullpin];


$tsql="INSERT INTO `epin_transfer` (`trans_by`,`pin_no`,`trans_date`,`spid`,`package_id`,`pin_amount`,`tds`,`admin`,`gen_type`)VALUES('$_SESSION[spid]','$num','$doj','$_SESSION[spid]','$_POST[package_id]','$pack_amt','$tds_amt','$sc_amt','1')";
$tres=mysqli_query($con,$tsql);
$transfer_id=mysqli_insert_id($con);



$sql_sum="SELECT * FROM `ewallet` WHERE `spid`='$_SESSION[spid]'";
$res_sum=mysqli_query($con,$sql_sum);
$row_sum=mysqli_fetch_array($res_sum);
$final_amt=$row_sum[rest_amt]-$total_charge;

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




$nurl="epin_generation.php?m=5&msg=EPINS SUCCESSFULLY Created.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">'; 

}

 

}
else{
$nurl="epin_generation.php?m=5&msg=Member ID is invalid.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';  
}

}else{
$nurl="epin_generation.php?m=5&msg=Not Enough money.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';    
}


}
else{
$nurl="epin_generation.php?m=5&msg=Operarion Failed";
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
    <h1 class="dash-title">E-Pin</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> E-Pin</a></li>
          <li><a href="#" class="active">Generation</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">


            <div class="panel-heading">
                <h3></h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <table class="table table-bordered"> 


<form action="final_epin_generation.php" method="post" name="newform" onsubmit="return validate_form(this)">


<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">Package Name</span></td>
<td>&nbsp;&nbsp;:</td>
<td><?=$package_det[package_name]?></td>
</tr>


<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">Package Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><?=$package_det[package_amount]?></td>
</tr>

<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">Pin no.</span></td>
<td>&nbsp;&nbsp;:</td>
<td><?=$_POST[fullpin]?></td>
</tr>

<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">Pin Amount</span></td>
<td>&nbsp;&nbsp;:</td>
<td><?=$total_pin_amt?></td>
</tr>

<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">TDS Charge</td>
<td>&nbsp;&nbsp;:</td>
<td><?=$tds_amt?></td>
</tr>


<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">Admin Charge</td>
<td>&nbsp;&nbsp;:</td>
<td><?=$sc_amt?></td>
</tr>



<tr>
<td><span style="color:green;font-size:14px;font-weight:bold">Total Charge</td>
<td>&nbsp;&nbsp;:</td>
<td><?=$total_charge?></td>
</tr>


<tr>
<td colspan="3"><br></td>
</tr>


<tr>
<td colspan="3">
<center>   
<?
if($rowqc[rest_amt]>=$total_charge){
?>
<input type="hidden" name="fullpin" value="<?=$_POST[fullpin]?>" readonly />
<input type="hidden" name="package_id" value="<?=$_POST[package_id]?>" readonly />

<input type="submit" name="call_submit" class="btn btn-md bg-purple"  value="Submit" />

<? } else { ?>

Don't have sufficient fund.

<? } ?>

</center>  
</td>
</tr>




</form>


</table>
 <!-- /form-horizontal -->
            </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>