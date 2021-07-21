<?php 
include("include/top.php");
include("include/menu.php");


if($_POST[call_submit]!=""){

$date=date("Y-m-d");
$sql="SELECT * FROM `e-pin` WHERE `id`='$_POST[id]' AND `pin`='$_POST[pin]' AND `status`='1' AND `package_id`='$_POST[package_id]' AND `memtransid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
//$row=mysqli_fetch_array($res);
$num=mysqli_num_rows($res);

$sq="SELECT * FROM `member` WHERE `spid`='$_POST[spid]'";
$rq=mysqli_query($con,$sq);
$nq=mysqli_num_rows($rq);
	
$sq1="SELECT * FROM `member` WHERE `spid`='$_POST[spid]' AND `member_status`='1'";
$rq1=mysqli_query($con,$sq1);
$nq1=mysqli_num_rows($rq1);


if($num>0)
   {
if($nq>0){

if($nq1>0){
$sql2="INSERT INTO `member_topup` (`spid`,`package_id`,`topup_dt`)VALUES('$_POST[spid]','$_POST[package_id]','$date')";
$rq2=mysqli_query($con,$sql2);


$query1="UPDATE `e-pin` SET `status`='0',`memberusedid`='$_POST[spid]',`useddate`='$date' WHERE `id`='$_POST[id]'";	
$rows1=mysqli_query($con,$query1);	

if($rows1){

$nurl="$log_url?msg=Sucessfully Done.";
echo '<META HTTP-EQUIV="Refresh" Content="0; URL='.$nurl.'">';	
}

}
else{
$nurl="$log_url?msg=Please TopUp the ID First";
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
    <h1 class="dash-title">Repurchase</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> Repurchase</a></li>
          <li><a href="current_ewallet_status.php?m=5" class="active">Repurchase Member</a></li>
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
                <h3>Repurchase Panel</h3>
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
$area_det=$my->search_row2($con,package,st,1,package_type,2);
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