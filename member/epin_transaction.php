<?php 
include("include/top.php");
include("include/menu.php");

$sql="SELECT * FROM `member` WHERE `spid`='$_SESSION[spid]'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_array($res);
$pass=$row[trans_password];


if($_SESSION[epin]!="antaraseal")
{
header("location:login_epinpassword.php?msg=You are not a valid user.&m=8");
}

$today=date("Y-m-d");
if($_POST[submit]!="")
{
if($_POST[pass]==$pass){

$spid=strtoupper($_POST[spid]);


$sq="SELECT * FROM `member` WHERE `spid`='$spid'";
$rq=mysqli_query($con,$sq);
$nq=mysqli_num_rows($rq);
if($nq>0){
if($spid!="$_SESSION[spid]"){
$sql7="SELECT * FROM  `e-pin` WHERE `memtransid`='$_SESSION[spid]' AND `package_id`='$_POST[package_id]'  AND`status`='1'";
$res7=mysqli_query($con,$sql7);
$num7=mysqli_num_rows($res7);
if($num7>=$_POST[pin_no]){
for($i=1;$i<=$_POST[pin_no];$i++){

$sql8="SELECT * FROM  `e-pin` WHERE `memtransid`='$_SESSION[spid]'  AND `package_id`='$_POST[package_id]' AND `status`='1' ORDER BY `id` ASC";
$res8=mysqli_query($con,$sql8);
$row8=mysqli_fetch_array($res8);

$sql8="UPDATE `e-pin` SET `memtransid`='$spid',`senderid`='$_SESSION[spid]',`date`='$today',`transfer`='transfer' WHERE `status`='1' AND `id`='$row8[id]'";
$re8=mysqli_query($con,$sql8);
}

	 $msg="Pins are Successfully Transfer to $spid&m=8";
	 echo '<META HTTP-EQUIV="Refresh" Content="0; URL=epin_transaction.php?msg='.$msg.'">';
}
else{
$msg1="You don't have enough pin.&m=8";
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=epin_transaction.php?msg1='.$msg1.'">';
}
}
else{
$msg1="You can't transfer pin your own ID &m=8";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=epin_transaction.php?msg1='.$msg1.'">';
}
}
else{
$msg1="Please Type Correct Associate ID &m=8";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=epin_transaction.php?msg1='.$msg1.'">';
}
}
else{
$msg1="Please Type Correct Transaction Password &m=8";
		  echo '<META HTTP-EQUIV="Refresh" Content="0; URL=epin_transaction.php?msg1='.$msg1.'">';
}
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


<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">E-Pin Transfer</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-home" aria-hidden="true"></i> E-Pin </a></li>
          <li><a href="#" class="active">E-Pin Transfer</a></li>
        </ol> <!-- /breadcrumb -->
    </div> <!-- /dashboard -->
</div> <!-- /row -->

<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">

	<script type="text/javascript">
function validate_form(form){
if( form.elements['package_id'].value=="" ) { alert("Please select one Product"); form.elements['package_id'].focus(); return false; }
if( form.elements['pin_no'].value=="" ) { alert("Please type E-Pin No."); form.elements['pin_no'].focus(); return false; }
if( form.elements['spid'].value=="" ) { alert("Please type Associate ID."); form.elements['spid'].focus(); return false; }
if( form.elements['pass'].value=="" ) { alert("Please type Transaction Password."); form.elements['pass'].focus(); return false; }
}
</script>

    <div class="col-md-12 col-sm-12 col-xs-12">
	
	

        <div class="panel">
		<br/>

            <div class="panel-heading">
                <h3></h3>
                <p class="text-muted"></p>
            </div> <!-- /panel-heading -->
            <div class="panel-body m-t-0">
            <form class="form-horizontal"  method="post" action="" onsubmit="return validate_form(this)" autocomplete="off">
				
		
			
               <table class="table table-bordered"> 


<tr>
<td colspan="4"><br><center>					
		<?php
$msg=$_REQUEST[msg];
if($_REQUEST[msg])
echo "<p style='color:green;font-weight:bold'>&nbsp;$msg</p>";
if($_REQUEST[msg1])
echo "<p style='color:red;font-weight:bold'>&nbsp;$_REQUEST[msg1]</p>";
?>	
	</center>	</td>
</tr>
</tr>


<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">Package</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle">
<select class="form-control" name="package_id" style="width:300px" required>
<option value="">Select Package </option>
<?
$area_det=$my->check_all_asc($con,package,st,1,package_id);
foreach($area_det as $k1=>$v1){
?>
<option value="<?=$v1[package_id]?>"><?=$v1[package_name]?></option>
<?}?>
</select>

</td>
<tr>
<td colspan="4"><br></td>
</tr>
</tr>


<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">No Of Pin</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><input type="text" name="pin_no" onkeypress="return keyRestrict(event, '1234567890')" maxlength="3"/></td>
<tr>
<td colspan="4"><br></td>
</tr>
</tr>

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">Member ID</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><input name="spid" id="spid" type="text" class="field_gray"></td></tr>

<tr>
<td colspan="4"><br></td>
</tr>
</tr>

<tr class="box-bg">
<td>&nbsp;&nbsp;</td>
<td align="left" valign="middle" class="bodytext" width="30%">Transaction Password</td>
<td align="center" valign="middle" class="bodytext">:</td>
<td align="left" valign="middle"><input name="pass" id="pass" type="password" class="field_gray" value="" ></td></tr>

<tr>
<td colspan="4"><br></td>
</tr>
<tr>
<td colspan="4" align='center' valign='middle'><input type="submit" name="submit" value="Transfer" class="btn btn-md bg-purple"></td>
</tr>

</table>
 <!-- /form-horizontal -->
          </form>    </div> 
			
		
			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->

<?php include("include/footer.php"); ?>