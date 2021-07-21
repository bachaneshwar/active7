<?php
include 'header.php';
error_reporting(0);
include "ctrl_panel/lib_panel/config.php";
$pay_key="rzp_live_YthCWBpOyjjhUW";
 ?>


    	<!-- END NAVBAR -->
<script language="javascript" type="text/javascript" src="member/ajax.js"></script>
		<!-- START TITLE TOP -->
		<section class="page_banner" style="background-image: url(assets/img/bg/section-bg.jpg);  background-size:cover; background-position: center center;">
			<div class="banner_overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="section-blog-title">Active Seven Pass</h1>
							Brook was here.
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END TITLE TOP -->
<!-- <center><b><h3>Active Seven Pass</h3></b></center> -->
<style>
.razorpay-payment-button{
 display:none;
}
</style>
<div class="panel-heading">
<p class="text-muted">
<?php
$msg=$_REQUEST[msg];
echo "<center><font color=\"#ff0066\" size=\"5\">".$msg."</font></center>";

?>
<center><b style="color:red;" id="errmessage"></b></center>

</p>
</div> <!-- /panel-heading -->
<center><h3>Register</h3></center>
<div class="container">
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
 	data-image="http://active7.in/active7_logo.jpeg"
 	data-prefill.name="<?=$_SESSION[spid]?>"

 >
 </script>
 <!-- that value we want to receive in return page::: like member is , amount etc..... -->
 <input type="hidden" custom="Hidden Element" name="hidden" value="<?=$_SESSION[spid]?>">
 <!-- <input type="hidden" custom="Hidden Element" name="active_pass_id"> -->
 <!-- payment get -->

 <table style="width:100%">



 <tr>
 <td>Sponsor Id <span style="color:#ff0000">*</span></td>
 <td><input type="text" class="form-control" name="sponsorid" id="sponsorid" value="<?=$sponsor[spid]?>" onkeyup="ajax21();check_mem();"  required></td>
 </tr>


 <tr ><td colspan="2"><br/></td></tr>

 <tr>
 <td>Sponsor Name <span style="color:#ff0000">*</span></td>
 <td><input type="text" class="form-control" name="spname" id="spname1" value="<?=$sponsor[sname]?>"  readonly></td>
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

 <tr><td colspan="2"><br/></td></tr>
 <!--
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
 	<td > Choose Active Pass <span style="color:#ff0000"></span></td>
 	<td>
 		<select class="form-control" id="sel1" name="active_pass_id" required>
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
 <tr>
 	<td >Mobile Number <span style="color:#ff0000">*</span></td>
 	<td><input type="text" name="mob_no" value="" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
 	</td>
 </tr>
 <tr>
 	<td colspan="2"><br></td>
 </tr>
 <tr >

 <td>Amount <span style="color:#ff0000">*</span></td>
 <?php
 $get_amt="SELECT * FROM `amount_rate`";
 $QRES=mysqli_query($con,$get_amt);
 $roq1=mysqli_fetch_array($QRES);
 $joining_amt= $roq1[amount]+$roq1[Sgst]+$roq1[Cgst];
   ?>
 <td><input type="text" class="form-control" name="amount" id="assoc_name" value="<?=$joining_amt; ?>" readonly></td>

 </tr>


 <!-- <tr>
 	<td colspan="2"><br></td>
 </tr>
 <tr>
 	<td >E-mail <span style="color:#ff0000"></span></td>
 	<td><input type="email" name="email" value="" class="form-control" ></td>
 </tr>
 <tr>
 	<td colspan="2"><br></td>
 </tr> -->

 <!-- <tr>
 	<td >Address</td>
 		<td><textarea name="address" class="form-control"  rows="6" cols="24"></textarea></td>
 </tr>
 <tr>
 	<td colspan="2"><br></td>
 </tr> -->


 <!--
 <tr>
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
 <!-- <tr>
 	<td colspan="2"><br></td>
 </tr> -->

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
 <select class="form-control">
 <option value="">Select District</option>
 </select>
 </div>
 <div id="loadspeci"></div>
 </td>
 </tr> -->
 <!-- <tr>
 	<td colspan="2"><br></td>
 </tr>

 <tr>
 	<td >City/Town </td>
 	<td><input type="text" name="city" class="form-control"  value="" ></td>
 </tr>
 <tr>
 	<td colspan="2"><br></td>
 </tr> -->


 <!-- <tr>
 	<td >PIN Code </td>
 	<td><input type="text" name="zip" class="form-control" maxlength="6" value="" ></td>
 </tr>
 <tr>
 	<td colspan="2"><br></td>
 </tr> -->

 <!--
 <tr>
 	<td >Aadhar No <span style="color:#ff0000"></span></td>
 	<td><input type="text" class="form-control"  name="aadhar"  maxlength="12"  value="" ></td>
 </tr>
 <tr>
 	<td colspan="2"><br></td>
 </tr>

 <tr>
 	<td >PAN No <span style="color:#ff0000"></span></td>
 	<td><input type="text" class="form-control"  name="pan"  maxlength="10" value="" ></td>
 </tr> -->

 <!-- <tr>
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



 <tr ><td colspan="2"><br/></td></tr>




 </table>

 <div class="form-group" style="margin-top:20px;">


 <center>
 <input type="hidden" name="st" value="1" />

 <input type="submit" name="call_submit"  id="call_submit" class="razorpay-payment-button1"  value="Pay" onClick="onClick()"/>
 <input type="reset" name="reset"  class="btn btn-warning" value="Exit" />
 </center>
 <p> <a id="clicks" style="display:none;">0</a></p>
 </div>



 </form>
</div>
<center>

</center>
		<!-- START BLOG -->

		<!-- END BLOG -->

		<!-- START DEALS & DISCOUNT -->
		<!-- <section class="related-deal section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12" data-aos="fade-up">
						<div class="section-title text-center white-title">
							<span>Related Packages</span>
							<h2>The Best Of Our All <br>Tour Packages</h2>
						</div>
					</div>
				</div>

				<div class="row text-left">
					<div class="col-md-12" data-aos="fade-up">
						<div id="package-slider">
							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/1.jpg" alt="">
								</div>
								<div class="package-hover">
									<div class="pull-left"><h5>Australia</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>

							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/2.jpg" alt="">
								</div>

								<div class="package-hover">
									<div class="pull-left"><h5>Canada</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>

							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/3.jpg" alt="">
								</div>

								<div class="package-hover">
									<div class="pull-left"><h5>France</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>

							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/4.jpg" alt="">
								</div>

								<div class="package-hover">
									<div class="pull-left"><h5>Germany</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>

							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/5.jpg" alt="">
								</div>

								<div class="package-hover">
									<div class="pull-left"><h5>Japan</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>

							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/6.jpg" alt="">
								</div>

								<div class="package-hover">
									<div class="pull-left"><h5>Orange</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>

							<div class="single_package">
								<div class="pack_image">
									<img class="img-fluid" src="assets/img/package/7.jpg" alt="">
								</div>

								<div class="package-hover">
									<div class="pull-left"><h5>China</h5></div>
									<div class="pull-right"><span class="pack_price">$236</span></div>
									<div class="clearfix"></div>
									<div class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
									</div>
									<span class="time_zone"><i class="icofont-wall-clock"></i> 5 days - 4 night</span>
									<p>Lorem ipsum dolor sit amet adipiscing elit. In efficitur diam tellus Phasellus</p>
									<a href="tour-details.html" class="btn-bg">Book Now</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section> -->
		<!-- END DEALS & DISCOUNT -->

		<!-- START FOOTER -->
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<div class="footer-widget">
							<div class="foot-logo">
									<a href="index.php"><img src="active7_logo.jpeg" alt=""></a>
							</div>
							<p>Copyright &copy; 2019 |  All Rights Reserved.</p>
						</div>
					</div><!--- END COL -->

					<div class="col-lg-3">
						<div class="footer-widget">
							<h3 class="fot-title">Quick Links</h3>
							<ul>
								<li><a href="#">Home</a></li>
								<li><a href="#">Term</a></li>
								<li><a href="#">Privacy & Policy</a></li>
								<li><a href="#">Blog</a></li>
								<li><a href="#">Contact Us</a></li>
							</ul>
						</div>
					</div><!--- END COL -->

					<div class="col-lg-3">
						<div class="footer-widget">
							<h3 class="fot-title">About Us</h3>
							<ul>
								<li><a href="#">Our Story</a></li>
								<li><a href="#">Travel Blog & Tips</a></li>
								<li><a href="#">Working With Us</a></li>
								<li><a href="#">Tour Guid</a></li>
								<li><a href="#">Be Our Partner</a></li>
							</ul>
						</div>
					</div><!--- END COL -->

					<div class="col-lg-3">
						<div class="footer-widget">
							<h3 class="fot-title">Support</h3>
							<ul>
								<li><a href="#">Customer Support</a></li>
								<li><a href="#">Privacy & Policy</a></li>
								<li><a href="#">Terms & Condition</a></li>
								<li><a href="#">Forum</a></li>
								<li><a href="#">Tour Guid</a></li>
							</ul>
						</div>
					</div><!--- END COL -->

				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</div>
		<!-- END FOOTER -->
    <script type="text/javascript">
       var clicks = 0;
       function onClick() {
           clicks += 1;
           document.getElementById("clicks").innerHTML = clicks;
           if (clicks>1) {
 document.getElementById("call_submit").disabled=true;
           }
       };
       </script>

    <script>
    function ajax21() {
        var name = document.getElementById('sponsorid').value;
        // alert("name");
        var xmlHttp;
        try {
            // Firefox, Opera 8.0+, Safari
            xmlHttp = new XMLHttpRequest();
        } catch (e) {
            // Internet Explorer
            try {
                xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                    alert("Your browser does not support AJAX!");
                    return false;
                }
            }
        }
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4) {
                // alert(xmlHttp.responseText);
                document.getElementById('spname1').value= xmlHttp.responseText;
                //document.getElementById('loader').innerHTML = xmlHttp.responseText;
            }
        }
        xmlHttp.open("POST", "member/fetch.php?sponsorid=" + name, true);
        xmlHttp.send();
    }

    </script>
    <script>
      function check_mem(){
      var spname = document.getElementById('sponsorid').value;
        //write your js code here


        // var vch_no_det = document.getElementById('vch_no_det').value;

        var a = new XMLHttpRequest();
        a.onreadystatechange = function()
        {
        if(a.readyState == 4 && a.status == 200)
        {
    		// alert(a.responseText);
        if (a.responseText=="ok") {

    		document.getElementById("call_submit").disabled = true;
    		document.getElementById("errmessage").innerHTML="Sorry! You Have Already 3 Member";



        }else{

        	document.getElementById("call_submit").disabled = false;
        	document.getElementById("errmessage").innerHTML="";
        }

        }
        }
        // a.open("GET","getold_tem_det.php",true);
        a.open("GET","member/member_check.php?spname="+spname,true);
        a.send();
    }

    </script>
		<!-- Latest jQuery -->
		<script src="assets/js/jquery-1.12.4.min.js"></script>
		<!-- Latest compiled and minified Bootstrap -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- modernizer JS -->
		<script src="assets/js/modernizr-2.8.3.min.js"></script>
		<!-- jquery nav JS -->
		<script src="assets/js/jquery.nav.js"></script>
		<!-- jquery smooth-scroll JS -->
		<script src="assets/js/smooth-scroll.js"></script>
		<!-- owl-carousel min js  -->
		<script src="assets/owlcarousel/js/owl.carousel.min.js"></script>
		<!-- jquery.slicknav -->
		<script src="assets/js/jquery.slicknav.js"></script>
		<!-- stellar js -->
		<script src="assets/js/jquery.stellar.min.js"></script>
		<!-- countTo js -->
		<script src="assets/js/jquery.inview.min.js"></script>
		<!-- magnific-popup js -->
		<script src="assets/js/jquery.magnific-popup.js"></script>
		<!-- scrolltopcontrol js -->
		<script src="assets/js/scrolltopcontrol.js"></script>
		<!-- slick js -->
		<script src="assets/js/slick.js"></script>
		<!-- form-contact js -->
		<script src="assets/js/form-contact.js"></script>
		<!-- aos js -->
		<script src="assets/js/aos.js"></script>
		<!-- scripts js -->
		<script src="assets/js/scripts.js"></script>
	</body>

<!-- Mirrored from themesvila.com/html-templates/turista/tour-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Dec 2019 06:18:22 GMT -->
</html>
