<!DOCTYPE html>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->

<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->

<!--[if gt IE 8]><!-->

<html class="no-js">

<!--<![endif]-->





<?php
include_once("include/top.php");
$sponsor=$my->total_row($con,member,spid,$_REQUEST[SPONSOR]);
?>



<body>

	<!--[if lt IE 9]>

		<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>

	<![endif]-->

	<div class="preloader">

		<div class="preloader_image"></div>

	</div>

	<!-- search modal -->



	<!-- Unyson messages modal -->



	<!-- eof .modal -->

	<!-- wrappers for visual page editor and boxed version of template -->

	<div id="canvas">

		<div id="box_wrapper">

			<!-- template sections -->



<?php
include_once("include/header_top.php");
include_once("include/menu.php");
?>





<script type="text/javascript">
function validate_form(form){
if( form.elements['sponsorid'].value=="" ) { alert("Please type  Sponsor Id"); form.elements['sponsorid'].focus(); return false; }
if( form.elements['spname'].value=="" ) { alert("Please type correct Sponsor Id"); form.elements['sponsorid'].focus(); return false; }
if ( ( form.leg[0].checked == false ) && ( form.leg[1].checked == false )) { alert ( "Please choose One Placement" ); return false;}
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



			<section class="page_breadcrumbs ds background_cover color_overlay section_padding_top_30 section_padding_bottom_30">

				<div class="container">

					<div class="row">

						<div class="col-sm-12 text-center">

							<h2>Registration</h2>

							<ol class="breadcrumb greylinks">



								<li> <a href="#">Home</a> </li>

								<li class="active">Registration</li>

							</ol>

						</div>

					</div>

				</div>

			</section>

			<section class="ls page_portfolio section_padding_top_150 section_padding_bottom_150">

				<div class="container">

					<div class="row">

						<div class="col-sm-12">


<center>
	<h5><?php if($_SESSION[msg]){print "Thanks for being awesome!" ; $_SESSION[msg]="";} ?>
			 <?php if($_REQUEST[msg]!=""){print $_REQUEST[msg] ; } ?></h5>
	</center>

				<form action="insert_member.php" name="newform"   method="post" onsubmit="return validate_form(this)" >



      <table class="table table-bordered">




<tr>

<td>Sponsor Id <span style="color:#ff0000">*</span></td>

<td><input type="text" class="form-control" name="sponsorid" id="sponsorid" value="<?=$sponsor[spid]?>" onkeyup="ajax21();"  required></td>

</tr>





<tr ><td colspan="2"><br/></td></tr>



<tr>

<td>Sponsor Name <span style="color:#ff0000">*</span></td>

<td><input type="text" class="form-control" name="sname" id="spname" value="<?=$sponsor[sname]?>"  readonly></td>

</tr>

<tr ><td colspan="2"><br/></td></tr>




<tr>
<td>Placement <span style="color:#ff0000">*</span></td>
<td>
<input type="radio" name="leg" id="leg" value="L"  /> L &nbsp;&nbsp;
<input type="radio" name="leg" id="leg" value="R"   /> R
</td>
</tr>


<tr>
	<td colspan="2"><br></td>
</tr>
<tr>



<td>Member Name <span style="color:#ff0000">*</span></td>

<td><input type="text" class="form-control" name="assoc_name" id="assoc_name" ></td>

</tr>
<tr ><td colspan="2"><br/></td></tr>
<tr>
<td>Father's Name <span style="color:#ff0000">*</span></td>
<td><input type="text" class="form-control" name="fname" id="fname" ></td>
</tr>

<tr><td colspan="2"><br/></td></tr>

<tr>
  <td>Date Of Birth</td>
  <td><input type="date" name="dob" id="dob"></td>
</tr>
<tr><td colspan="2"><br/></td></tr>



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

	<td >Mobile Number <span style="color:#ff0000">*</span></td>

	<td><input type="text" name="mob_no" value="" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">

	</td>

</tr>

<tr>

	<td colspan="2"><br></td>

</tr>

<tr>

	<td >E-mail <span style="color:#ff0000"></span></td>

	<td><input type="email" name="email" value="" class="form-control" ></td>

</tr>

<tr>

	<td colspan="2"><br></td>

</tr>



<tr>

	<td >Address</td>

		<td><textarea name="address" class="form-control"  rows="6" cols="24"></textarea></td>

</tr>

<tr>

	<td colspan="2"><br></td>

</tr>

<tr>

	<td >Address1</td>

		<td><textarea name="address1" class="form-control"  rows="6" cols="24"></textarea></td>

</tr>

<tr>

	<td colspan="2"><br></td>

</tr>

<tr>

	<td >City </td>

	<td><input type="text" name="city" class="form-control"  value="" ></td>

</tr>

<tr>

	<td colspan="2"><br></td>

</tr>

<tr>

	<td >State </td>

		<td>
	<select class="form-control" name="state" id="state">
    <option value="">Select</option>
<?php

$msgsql="SELECT * FROM `state`";

$msgres=mysqli_query($con,$msgsql);



while($row10=mysqli_fetch_array($msgres)){
$state_name=$row10[state_name];


    echo "<option value=$state_name>$state_name</option>";
}
?>
</select>
</td>

</tr>


<tr>

	<td colspan="2"><br></td>

</tr>
<tr>
	<td >District </td>

	<td><input type="text" name="dist" class="form-control"  value="" ></td>

</tr>

<tr>

	<td >PIN Code </td>

	<td><input type="text" name="zip" class="form-control" maxlength="6" value="" ></td>

</tr>

<tr>

	<td colspan="2"><br></td>

</tr>



<!-- <tr>
	<td >Aadhar No <span style="color:#ff0000"></span></td>
	<td><input type="text" class="form-control"  name="aadhar"  maxlength="12"  value="" ></td>
</tr>
<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >PAN No <span style="color:#ff0000"></span></td>
	<td><input type="text" class="form-control"  name="pan"  maxlength="10" value="" ></td>
</tr>



<tr>
	<td colspan="2"><br></td>
</tr>


<tr>
	<td >PAYTM Number <span style="color:#ff0000"></span></td>
	<td><input type="text" name="paytm" value="<?=$member_det[paytm]?>" class="form-control" maxlength="10" onkeypress="return keyRestrict(event, '1234567890')">
	</td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr>











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

<tr>
	<td >Nominee Name</td>
	<td><input type="text" name="nominee_name" class="form-control" value="" ></td>
</tr>

<tr>
	<td colspan="2"><br></td>
</tr>

<tr>
	<td >Nominee Relation</td>
	<td><input type="text" name="nominee_rel" class="form-control" value="" ></td>
</tr>
<tr ><td colspan="2"><br/></td></tr>

<tr>
	<td><input type="checkbox" name="" required="">&nbsp;&nbsp;I agree that I read all the <a href="terms_and_condition.php">terms and conditions</a>.</td>
	<td><input type="checkbox" required="">&nbsp;&nbsp;<a href="privacy_policy.php">Privacy Policy</a></td>


</tr> -->
<tr>
	<td><img src="captcha.php" width="120" height="30" border="1" alt="CAPTCHA">
		<input type="text" size="6" maxlength="5" name="captcha" id="captcha" value="" style="height:30px;">
	</td>

</tr>





<tr>
	<td colspan="2"><Center><input type="submit" value="Registration" data-sitekey="6LehzHUUAAAAAOeD9C35Ytf76DOAsES1W95iIGFY" class="g-recaptcha btn btn-warning"/></center></td>
</tr>
</table>

</form>
						</div>
					</div>

				</div>
			</section>

<?
include_once("include/footer.php");
?>


		</div>

		<!-- eof #box_wrapper -->

	</div>

	<!-- eof #canvas -->
	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>

</body>
</html>
