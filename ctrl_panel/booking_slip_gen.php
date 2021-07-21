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
?>

<script type="text/javascript">
function validate_form(form){
if( form.elements['spid'].value=="" ) { alert("Please type Member Id"); form.elements['spid'].focus(); return false; } 
if( form.elements['sname'].value=="" ) { alert("Please type correct Member Id"); form.elements['spid'].focus(); return false; } 
if( form.elements['totalamt'].value=="" ) { alert("Please type Total Amount"); form.elements['totalamt'].focus(); return false; } 
if( form.elements['booking_amt'].value=="" ) { alert("Please type Payment Amount"); form.elements['booking_amt'].focus(); return false; } 
if( form.elements['booking_amt'].value!="" ) { 
var val1=parseFloat(form.elements['totalamt'].value);
var val2=parseFloat(form.elements['booking_amt'].value);
if(val1>val2){alert("Please type correct Payment Amount"); form.elements['booking_amt'].focus(); return false;}
} 
if( form.elements['pay_method_id'].value=="" ) { alert("Please choose Payment Mode"); form.elements['pay_method_id'].focus(); return false; } 
if( form.elements['pay_method_id'].value==2 ) { 
if( form.elements['cheque_no'].value=="" ) { alert("Please type Cheque No"); form.elements['cheque_no'].focus(); return false; } 
if( form.elements['cheque_date'].value=="" ) { alert("Please type Cheque Date"); form.elements['cheque_date'].focus(); return false; } 
if( form.elements['bankdtls'].value=="" ) { alert("Please type Bank Details"); form.elements['bankdtls'].focus(); return false; } 
} 
if( form.elements['pay_method_id'].value==3 ) { 
if( form.elements['transition_no'].value=="" ) { alert("Please type Transaction No"); form.elements['transition_no'].focus(); return false; } 
} 
if( form.elements['pay_method_id'].value==4 ) { 
if( form.elements['card_no'].value=="" ) { alert("Please type Card No"); form.elements['card_no'].focus(); return false; } 
if( form.elements['card_holder'].value=="" ) { alert("Please type Card Date"); form.elements['card_holder'].focus(); return false; } 
if( form.elements['card_details'].value=="" ) { alert("Please type Card Details"); form.elements['card_details'].focus(); return false; } 
} 
if( form.elements['pay_method_id'].value==5 ) { 
if( form.elements['card_no'].value=="" ) { alert("Please type Card No"); form.elements['card_no'].focus(); return false; } 
if( form.elements['card_holder'].value=="" ) { alert("Please type Card Date"); form.elements['card_holder'].focus(); return false; } 
if( form.elements['card_details'].value=="" ) { alert("Please type Card Details"); form.elements['card_details'].focus(); return false; } 
} 
}
</script>	


<script type="text/javascript">
function planchq(){
var a=document.newform.pay_method_id.value;
//alert(a);
if(a=='2'){
document.getElementById("th1").style.display="";
document.getElementById("th2").style.display="";
document.getElementById("th3").style.display="";
document.getElementById("th4").style.display="";
document.getElementById("th5").style.display="";
document.getElementById("th6").style.display="";
document.getElementById("th7").style.display="none";
document.getElementById("th8").style.display="none";
document.getElementById("th9").style.display="none";
document.getElementById("th10").style.display="none";
document.getElementById("th11").style.display="none";
document.getElementById("th12").style.display="none";
document.getElementById("th13").style.display="none";
document.getElementById("th14").style.display="none";
}
else if(a=='3'){
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="none";
document.getElementById("th3").style.display="none";
document.getElementById("th4").style.display="none";
document.getElementById("th5").style.display="none";
document.getElementById("th6").style.display="none";
document.getElementById("th7").style.display="";
document.getElementById("th8").style.display="";
document.getElementById("th9").style.display="none";
document.getElementById("th10").style.display="none";
document.getElementById("th11").style.display="none";
document.getElementById("th12").style.display="none";
document.getElementById("th13").style.display="none";
document.getElementById("th14").style.display="none";
}
else if(a=='4'){
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="none";
document.getElementById("th3").style.display="none";
document.getElementById("th4").style.display="none";
document.getElementById("th5").style.display="none";
document.getElementById("th6").style.display="none";
document.getElementById("th7").style.display="none";
document.getElementById("th8").style.display="none";
document.getElementById("th9").style.display="";
document.getElementById("th10").style.display="";
document.getElementById("th11").style.display="";
document.getElementById("th12").style.display="";
document.getElementById("th13").style.display="";
document.getElementById("th14").style.display="";
}
else if(a=='5'){
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="none";
document.getElementById("th3").style.display="none";
document.getElementById("th4").style.display="none";
document.getElementById("th5").style.display="none";
document.getElementById("th6").style.display="none";
document.getElementById("th7").style.display="none";
document.getElementById("th8").style.display="none";
document.getElementById("th9").style.display="";
document.getElementById("th10").style.display="";
document.getElementById("th11").style.display="";
document.getElementById("th12").style.display="";
document.getElementById("th13").style.display="";
document.getElementById("th14").style.display="";
}
else if(a==""){
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="none";
document.getElementById("th3").style.display="none";
document.getElementById("th4").style.display="none";
document.getElementById("th5").style.display="none";
document.getElementById("th6").style.display="none";
document.getElementById("th7").style.display="none";
document.getElementById("th8").style.display="none";
document.getElementById("th9").style.display="none";
document.getElementById("th10").style.display="none";
document.getElementById("th11").style.display="none";
document.getElementById("th12").style.display="none";
document.getElementById("th13").style.display="none";
document.getElementById("th14").style.display="none";
}
else{
document.getElementById("th1").style.display="none";
document.getElementById("th2").style.display="none";
document.getElementById("th3").style.display="none";
document.getElementById("th4").style.display="none";
document.getElementById("th5").style.display="none";
document.getElementById("th6").style.display="none";
document.getElementById("th7").style.display="none";
document.getElementById("th8").style.display="none";
document.getElementById("th9").style.display="none";
document.getElementById("th10").style.display="none";
document.getElementById("th11").style.display="none";
document.getElementById("th12").style.display="none";
document.getElementById("th13").style.display="none";
document.getElementById("th14").style.display="none";
}
}
</script>


<!-- =============================================== -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="header-icon"><i class="glyphicon glyphicon-briefcase"></i></div>
<div class="header-title">
<h1>Plot Booking</h1>
<small>Booking Slip</small>
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
<i class="fa fa-list"></i> Booking Slip Generation
</div>
</div>

            



<div class="panel-body">




<form action="confirm_booking.php" method="post" name="newform" onsubmit="return validate_form(this);" >
<table style="width:100%">


<tr>
<td>Member ID</td>
<td><input type="text" class="form-control" name="spid"  id="sponsorid"    onkeyup="ajax21();"  required /></td>
</tr>	
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Member Name <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="sname" id="spname" value=""  readonly></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>


<tr>
<td>Phase <span style="color:#ff0000">*</span></td>
<td>
<select class="form-control" name="phase_id" id="phase_id" onchange="ajax29();ajax24();" required>
<option value="">Select Phase</option>
<?
$phase_det=$my->check_all_asc($con,phase,st,1,phase_name);
foreach($phase_det as $k1=>$v1){
?>
<option value="<?=$v1[phase_id]?>" <? if($v1[phase_id]==$value_det[phase_id]) {?> Selected <?}?>><?=$v1[phase_name]?></option>
<?}?>
</select>
</td>
</tr>

<tr ><td colspan="2"><br/></td></tr>


<tr>
<td>Area <span style="color:#ff0000">*</span></td>
<td>
<div id="aload">
<select class="form-control" >
<option value="">Select Area</option>
</select>
</div>
<div id="adisplay"></div>
</td>
</tr>

<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Plot <span style="color:#ff0000">*</span></td>
<td>
<div id="load">
<select class="form-control" >
<option value="">Select Plot</option>
</select>
</div>
<div id="display"></div>
</td>
</tr>

<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Total Amount <span style="color:#ff0000"></span></td>
<td><input type="text" class="form-control" name="totalamt" id="totalamt" value=""  readonly></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Payment Amount <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="booking_amt" id="booking_amt" value=""  onkeypress="return keyRestrict(event, '1234567890')" required ></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>

<tr>
<td>Payment Mode <span style="color:#ff0000">*</span></td>
<td>
<select class="form-control" name="pay_method_id" id="pay_method_id"  onchange="planchq();"  required>
<option value="">Select Payment Mode</option>
<?
$pay_det=$my->check_all_asc($con,payment_method,st,1,pay_method_id);
foreach($pay_det as $k1=>$v1){
?>
<option value="<?=$v1[pay_method_id]?>" ><?=$v1[pay_method]?></option>
<?}?>
</select>
</td>
</tr>

<tr ><td colspan="2"><br/></td></tr>

<!-------------------------------------------------------------------------------------->
<tr id='th1' style='display:none'>
<td>Cheque No <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="cheque_no" id="cheque_no" value=""  ></td>
</tr>

<tr id='th2' style='display:none'><td colspan="2"><br/></td></tr>

<tr id='th3' style='display:none'>
<td>Cheque Date <span style="color:#ff0000">*</span></td>
<td>
<input type="text" name="cheque_date"  id="cheque_date" value='' class="form-control" size="20" readonly  />
<span id="cal3">&nbsp;<img src="calendar.jpg" style="cursor:pointer;" border="0" /></span>
<script type="text/javascript">
var cal = new Zapatec.Calendar.setup({

inputField:"cheque_date",
ifFormat:"%Y-%m-%d",
button:"cal3",
showsTime:false

});

</script>
</td>
</tr>

<tr id='th4' style='display:none'><td colspan="2"><br/></td></tr>


<tr id='th5' style='display:none'>
	<td >Bank Details <span style="color:#ff0000">*</span></td>
	<td><textarea name="bankdtls" class="form-control"  rows="3" cols="24"></textarea></td>
</tr>
<tr id='th6' style='display:none'><td colspan="2"><br/></td></tr>


<!-------------------------------------------------------------------------------------->

<tr id='th7' style='display:none'>
<td>Transaction No <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="transition_no" id="transition_no" value=""  ></td>
</tr>

<tr id='th8' style='display:none'><td colspan="2"><br/></td></tr>

<!-------------------------------------------------------------------------------------->

<tr id='th9' style='display:none'>
	<td >Card No <span style="color:#ff0000">*</span></td>
	<td><input type="text" class="form-control" name="card_no" id="card_no" value=""  ></td>
</tr>
<tr id='th10' style='display:none'><td colspan="2"><br/></td></tr>



<tr id='th11' style='display:none'>
	<td >Card Holder <span style="color:#ff0000">*</span></td>
	<td><input type="text" class="form-control" name="card_holder" id="card_holder" value=""  ></td>
</tr>
<tr id='th12' style='display:none'><td colspan="2"><br/></td></tr>

<tr id='th13' style='display:none'>
	<td >Card Details <span style="color:#ff0000">*</span></td>
	<td><input type="text" class="form-control" name="card_details" id="card_details" value=""  ></td>
</tr>
<tr id='th14' style='display:none'><td colspan="2"><br/></td></tr>

<!-------------------------------------------------------------------------------------->

<tr>
	<td >Transaction Details</td>
		<td><textarea name="transactionDtls" class="form-control"  rows="6" cols="24"></textarea></td>
</tr>

<tr ><td colspan="2"><br/></td></tr>


</table> 




<div class="form-group">



<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit" class="btn btn-success"  value="Submit" />
<input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
</div>




</form>


<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>

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