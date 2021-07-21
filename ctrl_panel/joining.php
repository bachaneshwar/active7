<!DOCTYPE html>
<html lang="en">

<?php
include_once("include/header_top.php");
?>
<body class="hold-transition sidebar-mini">
<!--preloader-->
<div id="preloader">
<div id="status"></div>
</div>
<!-- Site wrapper -->
<div class="wrapper">
<?php
include_once("include/header_down.php");
?>
<!-- =============================================== -->
<!-- Left side column. contains the sidebar -->
<?php
include_once("include/menu.php");
$amount_dtls=$my->total_row($con,amount_rate,id,1);
$company_dtls=$my->total_row($con,company_address,id,1);

?>



<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-pawn"></i></div>
<div class="header-title">
<h1>Join Now</h1>
<small></small>
</div>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
<!-- Form controls -->
<div class="col-sm-12">
<div class="panel panel-bd lobidrag">
<div style="padding:10px;color: #010611;background-color: #e8f1f3;border-color: #b7b9bf;position: relative;">
<div class="btn-group" id="buttonlist">
<i class="fa fa-list"></i> Add New Member
&nbsp;&nbsp;&nbsp;<b style="color:red;" id="errmessage"></b>
</div>
</div>



<?
$sponsor=$my->total_row($con,member,spid,$_REQUEST[SPONSOR]);
?>

<div class="panel-body">


<script type="text/javascript">
function validate_form(form){
if( form.elements['sponsorid'].value=="" ) { alert("Please type  Sponsor Id"); form.elements['sponsorid'].focus(); return false; }
if( form.elements['spname'].value=="" ) { alert("Please type correct Sponsor Id"); form.elements['sponsorid'].focus(); return false; }
if( form.elements['assoc_name'].value=="" ) { alert("Please type Member Name"); form.elements['assoc_name'].focus(); return false; }
if( form.elements['pass'].value=="" ) { alert("Please type Password "); form.elements['pass'].focus(); return false; }
if( form.elements['conpass'].value=="" ) { alert("Please type Confirm Password"); form.elements['conpass'].focus(); return false; }
if(form.elements['conpass'].value!=""){
var a1 =form.elements['pass'].value;
var a2 =form.elements['conpass'].value;
if(a1!=a2){
alert("Please type Correct Confirm Password"); form.elements['conpass'].focus(); return false;
}
}
if( form.elements['mob_no'].value=="" ) { alert("Please type your Mobile no."); form.elements['mob_no'].focus(); return false; }
if( form.elements['mob_no'].value!="" ) {
var number = form.elements['mob_no'].value;
var number1=number.length;
if(number1!=10){alert("Please type valid Number"); form.elements['mob_no'].focus(); return false; }
}
}
</script>
<script language="javascript" type="text/javascript" src="ajax.js"></script>

<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>


<form action="insert_member.php" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">



<tr>
<td>Sponsor Id <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="sponsorid" id="sponsorid" value="<?=$sponsor[spid]?>" onkeyup="ajax21();check_mem();"  required></td>
</tr>


<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Sponsor Name <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="spname" id="spname" value="<?=$sponsor[sname]?>"  readonly></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>



<tr >

<td>Member Name <span style="color:#ff0000">*</span></td>

<td><input type="text" class="form-control" name="assoc_name" id="assoc_name" ></td>

</tr>
<tr ><td colspan="2"><br/></td></tr>
<!-- <tr>
<td>Father's Name <span style="color:#ff0000"></span></td>
<td><input type="text" class="form-control" name="fname" id="fname" ></td>
</tr> -->

<!-- <tr><td colspan="2"><br/></td></tr>

<tr>
  <td>Date Of Birth</td>
  <td><input type="date" name="dob" id="dob"></td>
</tr>
<tr><td colspan="2"><br/></td></tr> -->



<tr>
	<td >Password <span style="color:#ff0000">*</span></td>
	<td><input type="password" class="form-control" name="pass" value=""></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Confirm Password <span style="color:#ff0000">*</span></td>
	<td><input type="password" class="form-control" name="conpass" value=""></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Amount</td>
	<?php
	$get_amt="SELECT * FROM `amount_rate`";
	$QRES=mysqli_query($con,$get_amt);
	$roq1=mysqli_fetch_array($QRES);
	$joining_amt= $roq1[amount]+$roq1[Sgst]+$roq1[Cgst];
	  ?>
	<td><input type="text" name="amount" class="form-control" value="<?=$joining_amt; ?>" readonly></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td > Choose Active Pass <span style="color:#ff0000"></span></td>
	<td>
		<select class="form-control" id="sel1" name="active_pass_id">
		<option selected disabled value="Select">Select</option>
		<?php
		$get_pass= "SELECT * FROM `active_pass` WHERE `st`='1'";
		$apQ=mysqli_query($con,$get_pass);
		while($rd=mysqli_fetch_array($apQ)){
			?>
			<option value="<?=$rd[id]; ?>"><?=$rd[active_pass_name]; ?></option>

			<?php
		}
		?>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<!-- <tr>
	<td >Mobile Number <span style="color:#ff0000">*</span></td>
	<td><input type="text" name="mob_no" value="" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
	</td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->
<tr>
	<td > Payment Type <span style="color:#ff0000"></span></td>
	<td>
		<select class="form-control" id="sel1" name="payment_type">
		<option selected disabled value="Select">Select</option>
		<option value="NET BANKING">NET BANKING</option>
		<option value="CASH">CASH</option>
		<option value="CHECK">CHECK</option>
		</select>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Transaction Number </td>
	<td><input type="text" name="payment_number"  class="form-control">
	</td>
</tr>
<!-- <tr>
	<td >Address</td>
		<td><textarea name="address" class="form-control"  rows="6" cols="24"></textarea></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->


	<!-- <tr>
	<td> Country <span style="color:#ff0000">*</span></td>
	<td>

	<select id="country_id" name="country_id" class="form-control" onchange="return ajax1();" required>
	<option value="">Select Country</option>
	<?
	$row_dt1=$my->check_all($con,country,st,1);
	foreach($row_dt1 as $k1=>$v1){
	?>
	<option value="<?=$v1['country_id']?>"><?=$v1['country_name']?></option>
	<?
	}
	?>
	</select>

	</td>
	</tr> -->
	<tr>
		<td colspan="2"><br></td>
	</tr>

	<!-- <tr>
	<td> State <span style="color:#ff0000">*</span></td>
	<td>
	<div id="waitsubcat">
	<select class="form-control">
	<option value="">Select State</option>
	</select>
	</div>
	<div id="loadsubcat"></div>
	</td>
	</tr> -->
	<!-- <tr>
		<td colspan="2"><br></td>
	</tr> -->
	<!-- <tr>
	<td> District <span style="color:#ff0000">*</span></td>
	<td>
	<div id="waitspeci">
	<select  class="form-control">
	<option value="">Select District</option>
	</select>
	</div>
	<div id="loadspeci"></div>
	</td>
	</tr> -->
	<!-- <tr>
		<td colspan="2"><br></td>
	</tr> -->
<!-- <tr>
	<tr>
		<td colspan="2"><br></td>
	</tr>
	<td >District </td>
	<td><input type="text" name="dist" class="form-control" value="" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->


<!-- <tr>
	<td >City/Town</td>
	<td>
	<input type="text" name="city" class="form-control" value="<?=$member_det[city]?>" >

	</td>
</tr> -->

<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->



<!-- <tr>
	<td >PIN Code </td>
	<td><input type="text" name="zip" class="form-control" maxlength="6" value="" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->


<!-- <tr>
	<td >Aadhar No <span style="color:#ff0000"></span></td>
	<td><input type="text" class="form-control"  name="aadhar"  maxlength="12"  value="" ></td>
</tr> -->
<!-- <tr>
	<td colspan="2"><br></td>
</tr> -->

<!-- <tr>
	<td >PAN No <span style="color:#ff0000"></span></td>
	<td><input type="text" class="form-control"  name="pan"  maxlength="10" value="" ></td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr> -->





<!--

<tr>
	<td >Account Type</td>
	<td>
	<select name="acc_type" class="form-control">
<option value="" selected>Select Account Type</option>
<option value="Savings Account">Savings Account</option>
<option value="Current Account">Current Account</option>
</select>
	</td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >Bank Name</td>
	<td><input type="text" name="bank" class="form-control" value="" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Branch</td>
	<td><input type="text" name="branch" class="form-control" value="" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Account Number </td>
	<td><input type="text" name="accno" value="" class="form-control" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >IFSC Code</td>
	<td><input type="text" name="ifsc" value="" class="form-control" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

-->
<!-- <tr>
	<td >Nominee Name</td>
	<td><input type="text" name="nominee_name" class="form-control" value="" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>
<tr>
	<td >Nominee Relation</td>
	<td><input type="text" name="nominee_rel" class="form-control" value="" ></td>
</tr> -->
<!--


<tr ><td colspan="2"><br/></td></tr>


 -->


</table>




<div class="form-group" style="margin-top:20px;">


<center>
<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit"  id="call_submit" class="btn btn-success"  value="submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</center>

</div>




</form>




</div>
</div>
</div>
</div>
</section>
<!-- /.content -->
</div>
<script>
function check_mem()
{
var spname = document.getElementById('sponsorid').value;
// alert(plate_qty);
// var vch_no_det = document.getElementById('vch_no_det').value;

var a = new XMLHttpRequest();
a.onreadystatechange = function()
{
if(a.readyState == 4 && a.status == 200)
{

if (a.responseText=="ok") {
	document.getElementById("errmessage").innerHTML="Sorry! You Have Already 3 Member";
	document.getElementById("call_submit").disabled = true;

}else{
	document.getElementById("call_submit").disabled = false;
	document.getElementById("errmessage").innerHTML="";
}

}
}
// a.open("GET","getold_tem_det.php",true);
a.open("GET","member_check.php?spname="+spname,true);
a.send();

}
</script>
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
