<?php
include("include/top.php");
include("include/menu.php");
$pay_key="rzp_test_jIcli5Gt6KAu8y";

$sponsor=$my->total_row($con,member,spid,$_SESSION[spid]);
$sponsor1=$my->total_row($con,member,spid,$_SESSION[spid]);

$amount_dtls=$my->total_row($con,amount_rate,id,1);
$company_dtls=$my->total_row($con,company_address,id,1);

?>
<!-- //////////////////////////////////////////////////// Content-Panel div -->

<script type="text/javascript">

</script>
<body onload="check_mem();">

<div id="content-panel">
<div class="container-fluid">

<div class="row">
    <div class="col-xs-12 dashboard-header">
    <h1 class="dash-title">Pay Bill</h1>
    <!-- //////////////////////////////////////////////////// Breadcrumb -->
        <ol class="breadcrumb">
          <li><a href="current_ewallet_status.php?m=5"><i class="fa fa-home" aria-hidden="true"></i> Pay Bill</a></li>
          <li><a href="current_ewallet_status.php?m=5" class="active">Pay Now</a></li>
        </ol> <!-- /breadcrumb -->

    </div> <!-- /dashboard -->
</div> <!-- /row -->
<!-- //////////////////////////////////////////////////// Work Shift Master -->
<div class="row">


<!-- <script type="text/javascript">
function validate_form(form){
if( form.elements['sponsorid'].value=="" ) { alert("Please type  Sponsor Id"); form.elements['sponsorid'].focus(); return false; }
if( form.elements['spname'].value=="" ) { alert("Please type correct Sponsor Id"); form.elements['sponsorid'].focus(); return false; }
if( form.elements['assoc_name'].value=="" ) { alert("Please type Member Name") form.elements['assoc_name'].focus(); return false; }
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
</script> -->
<script language="javascript" type="text/javascript" src="ajax.js"></script>

    <div class="col-md-12 col-sm-12 col-xs-12">



        <div class="panel">
		<br/>

            <div class="panel-heading">
                <p class="text-muted">
				<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>
<center><b style="color:red;" id="errmessage"></b></center>

				</p>
            </div> <!-- /panel-heading -->

            <div class="panel-body m-t-0" >

<!-- <form action="insert_member.php" method="post" name="newform" onsubmit="return validate_form(this);" >
 -->
 <style>
 .razorpay-payment-button{
  display:none;
 }
 </style>
 <form action="return.php" method="POST">
<!-- payment get -->
<?php
$get_amt="SELECT * FROM `amount_rate`";
$QRES=mysqli_query($con,$get_amt);
$roq1=mysqli_fetch_array($QRES);
$joining_amt= $roq1[amount]+$roq1[Sgst]+$roq1[Cgst];

$amt=$joining_amt*100; //in razerpay 100 = 1rupes
?>
<script
	src="https://checkout.razorpay.com/v1/checkout.js"
	data-key="<?=$pay_key?>";// Enter the Key ID generated from the Dashboard
	data-amount="<?=$amt?>" // Amount is in currency subunits. Default currency is INR. Hence, 29935 refers to 29935 paise or INR 299.35.
	data-currency="INR"
	
	data-description="Active7 Joining Amount"
	data-image="https://example.com/your_logo.jpg"
	data-prefill.name="<?=$_SESSION[spid]?>"

	>
</script>
<!-- that value we want to receive in return page::: like member is , amount etc..... -->
<input type="hidden" custom="Hidden Element" name="hidden" value="<?=$_SESSION[spid]?>">
<!-- <input type="hidden" custom="Hidden Element" name="active_pass_id"> -->
<!-- payment get -->
<table style="width:100%">

<center>
<div class="form-group">
    <label for="inputsm">Biller Name</label>
    <input class="form-control input-sm" name="biller_name" id="inputsm" type="text" style="width:34%;">
  </div>

  <div class="form-group">
    <label for="inputsm">Payee Mobile Number</label>
    <input class="form-control input-sm" name="pay_mobile_num" id="inputsm" type="text" style="width:34%;">
  </div>

  <div class="form-group">
    <label for="inputsm">Mobile Number</label>
    <input class="form-control input-sm" name="mobile_num" id="inputsm" type="text" style="width:34%;">
  </div>

  <div class="form-group">
    <label for="inputsm">Amount</label>
    <input class="form-control input-sm" name="amount" id="inputsm" type="text" style="width:34%;">
  </div>

  <div class="form-group">
    <label for="inputsm">Select Payment Mode</label><br>
     <select name="payment_mode"  class="form-control" style="width:34%;">
        <option selected disabled value="">Select</option>
        <option >Cash</option>
        <option >Online</option>
     </select>
  </div>

  <div class="form-group">
    <label for="inputsm">Customer Convenience fees</label>
    <input class="form-control input-sm" id="inputsm" type="text" style="width:34%;">
  </div>

  <div class="form-group">
    <label for="inputsm">Total Amount</label>
    <input class="form-control input-sm" id="inputsm" type="text" style="width:34%;">
  </div>
</table>

<div class="form-group" style="margin-top:20px;">

</center>
<center>
<input type="hidden" name="st" value="1" />

<input type="submit" name="call_submit"  id="call_submit" class="razorpay-payment-button1"  value="Pay" />
<!-- <input type="reset" name="reset"  class="btn btn-warning" value="Exit" /> -->
</center>

</div>



</form>
 <!-- /form-horizontal -->
            </div>


			<!-- /panel-body -->
        </div> <!-- /panel-->
    </div> <!-- /col -->
</div> <!-- /row -->
<script>
  function check_mem(){
  var spname = document.getElementById('sponsorid').value;
    //write your js code here

    // alert(plate_qty);
    // var vch_no_det = document.getElementById('vch_no_det').value;

    var a = new XMLHttpRequest();
    a.onreadystatechange = function()
    {
    if(a.readyState == 4 && a.status == 200)
    {

    if (a.responseText=="ok") {
      // alert("spname");
      document.getElementById("call_submit").disabled = true;
    	document.getElementById("errmessage").innerHTML="Sorry! You Have Already 3 Member";


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
<!--
<script>

function check_mem()
{

// alert(plate_qty);
// var vch_no_det = document.getElementById('vch_no_det').value;

var a = new XMLHttpRequest();
a.onreadystatechange = function()
{
if(a.readyState == 4 && a.status == 200)
{

  alert("okk");
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
check_mem();
</script> -->
<?php include("include/footer.php"); ?>
