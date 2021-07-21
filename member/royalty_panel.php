<?php 
include("include/top.php");
include("include/menu.php");


if($_POST[call_submit]!=""){

$sqlm_1="SELECT * FROM `amount_rate`";
$reslm_1=mysqli_query($con,$sqlm_1);
$rowlm_1=mysqli_fetch_array($reslm_1);

$date=date("Y-m-d");
$sql="SELECT * FROM `e-pin` WHERE `id`='$_POST[id]' AND `pin`='$_POST[pin]' AND `status`='1' AND `package_id`='$_POST[package_id]' AND `memtransid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
//$row=mysqli_fetch_array($res);
$num=mysqli_num_rows($res);

$sq="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$rq=mysqli_query($con,$sq);
$nq=mysqli_num_rows($rq);
$rowq=mysqli_fetch_array($rq);

$sq1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]' AND `member_status`='1'";
$rq1=mysqli_query($con,$sq1);
$nq1=mysqli_num_rows($rq1);

if($num>0)
   {
if($nq>0){


if($nq1==0){
$query="UPDATE `member` SET `member_status`='1',`update_dt`='$date' WHERE `spid`='$rowq[spid]'";	
$rows=mysqli_query($con,$query);	
}

$sql2="INSERT INTO `member_topup` (`spid`,`package_id`,`topup_dt`,`topup_dt_time`)VALUES('$rowq[spid]','$_POST[package_id]','$date','$create_date')";
$rq2=mysqli_query($con,$sql2);

$query1="UPDATE `e-pin` SET `status`='0',`memberusedid`='$rowq[spid]',`useddate`='$date' WHERE `id`='$_POST[id]'";	
$rows1=mysqli_query($con,$query1);	

if($rows1){


if($nq1==0){
tree_create($con,$rowq[spid],oneindia_tree,oneindia_tree_id,$date,$create_date);
}

if($nq1==0){
$message="Dear ".$rowq[sname].", Your Login ID: ".$rowq[spid]." is activated respectively.";
}else{
$message="Dear ".$rowq[sname].", Your Login ID: ".$rowq[spid]." is reactivated respectively.";
}


if($rowq[sponsorid]!=""){

$sel_bin_id = "select * FROM `package` where `package_id`='$_POST[package_id]'" ;
$res_bin_id = mysqli_query($con,$sel_bin_id) ;
$row_bin_id = mysqli_fetch_array($res_bin_id) ;

$sponsor_commission=round(($row_bin_id[package_amount]*$rowlm_1[sponsor_income])/100);
$td_charge=round(($sponsor_commission*$rowlm_1[tds])/100);
$sc_charge=round(($sponsor_commission*$rowlm_1[sc])/100);
$total_amt=round($sponsor_commission-($td_charge+$sc_charge));


$sql6="SELECT * FROM `ewallet` WHERE `spid`='$rowq[sponsorid]'";
$res6=mysqli_query($con,$sql6);
$num6=mysqli_num_rows($res6);
$row6=mysqli_fetch_array($res6);

$update_ewallet=$row6[total_amt]+$total_amt;
$ewallet_res_amt=$row6[rest_amt]+$total_amt;

$sql="INSERT INTO `sponsor_payout` (`stdt`,`endt`,`payout_date`,`spid`,`for_spon`,`commission`,`td`,`sc_amount`,`total_amt`)
VALUES ('$date','$date','$date','$rowq[sponsorid]','$rowq[spid]','$sponsor_commission','$td_charge','$sc_charge','$total_amt')";
$res=mysqli_query($con,$sql);


$sql7="UPDATE `ewallet` SET `total_amt`='$update_ewallet',`rest_amt`='$ewallet_res_amt' WHERE `spid`='$rowq[sponsorid]'";
$res7=mysqli_query($con,$sql7);

}



SMS_Sender($rowq[mob],$message);

$nurl="$log_url?msg=Sucessfully Done.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}

}
else{
$nurl="$log_url?msg=Please Type Correct Member ID";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}

}
else{
$nurl="$log_url?msg=Please type correct Serial No / E-Pin";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	

}



}

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">



</script>


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">TopUp</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> TopUp</a></li>
          <li><a href="current_ewallet_status.php?m=5" class="active">TopUp Member</a></li>
        </ol> <!-- /breadcrumb -->
        
    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

<script type="text/javascript">
function validate_form(form){
if( form.elements['package_id'].value=="" ) { alert("Please Select one Package."); form.elements['package_id'].focus(); return false; } 
if( form.elements['id'].value=="" ) { alert("Please type Serial No."); form.elements['id'].focus(); return false; }  
if( form.elements['pin'].value=="" ) { alert("Please type E-Pin."); form.elements['pin'].focus(); return false; }
if( form.elements['spid'].value=="" ) { alert("Please type Associate ID."); form.elements['spid'].focus(); return false; }
}
</script>	
	
<script language="javascript" type="text/javascript" src="ajax.js"></script>                 

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

            <div class="panel-heading">
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
      
<form action="" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">
<tr>
	<td >Package<span style="color:#ff0000">*</span></td>
<td>
<select class="form-control" name="package_id" id="package_id"  required>
<option value="">Select Package </option>
<?
$area_det=$my->search_row2($con,package,st,1,package_type,3);
foreach($area_det as $k1=>$v1){
?>
<option value="<?=$v1[package_id]?>"><?=$v1[package_name]?></option>
<?}?>
</select>
</td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>








<tr>
	<td >Serial No<span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="id"  id="id"   onkeypress="return keyRestrict(event, '1234567890')" required />
</td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>

<tr>
	<td >E-Pin <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="pin"  id="pin"   onkeypress="return keyRestrict(event, '1234567890')" required />
</td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>


<tr>
	<td >Member ID<span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="spid"  id="spid"  required />
</td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>


</table> 




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-md bg-purple" value="Submit" />
</div>


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>


</form>


 <!-- /form-horizontal -->
            </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>