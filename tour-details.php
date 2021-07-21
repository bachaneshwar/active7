
<?php
include 'header.php';
 ?>


		<!-- END NAVBAR -->

		<!-- START TITLE TOP -->
		<section class="page_banner" style="background-image: url(assets/img/bg/section-bg.jpg);  background-size:cover; background-position: center center;">
			<div class="banner_overlay">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h1 class="section-blog-title">Tour details</h1>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- END TITLE TOP -->

		<!-- START BLOG -->
		<section class="tour_details section-padding">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-7 col-xs-12">
						<div class="single_tour_details">
							<span class="tour_duration"><i class="icofont-clock-time"></i> 5 days 4 night</span>
              <?php
              if ($_GET['name']=="THI") {
              // code...
              ?>

              <h3 class="tour_title">Special Thailand Tour</h3>

							<div class="tour_slider">
								<div class="tour_slider_img"><img src="assets/img/package/1.jpg" class="img-responsive" alt="image" /></div>
								<div class="tour_slider_img"><img src="assets/img/package/2.jpg" class="img-responsive" alt="image" /></div>
								<div class="tour_slider_img"><img src="assets/img/package/3.jpg" class="img-responsive" alt="image" /></div>
							</div>


							<p>
                <b>DAY 1 :-</b>
“Welcome to Thailand. On arrival in Bangkok, you will be greeted by your friendly  local representative outside the baggage hall area at the airport. (At Swarnabhoomi Airport GATE 10C; At DMK airport Gate 1 ) Sit back in the comfort of your coach, drive to the beautiful beach destination – Pattaya which lies about 150-km southeast of Bangkok. On arrival in Pattaya check into your hotel and relax (Standard Check in time after 1500Hrs). This evening proceeds to visit the Colosseum/Alcazar Show Pattaya, Thailand’s latest, largest and most spectacular cabaret show.
<p>
<b>DAY2:-</b>
Today after an American breakfast at the hotel get set to explore the charm and beauty of Coral Island (subject to weather condition). Start with an exciting ride in a speedboat to the Island, En route we shall stop at a pontoon where you have an option of experiencing parasailing (on your own). Next stop an option of experiencing Underwater Sea Walk (on your own). Once we reach the Island here you can enjoy various water-sports activities like banana boat ride, jet ski, swimming in the tropical water, etc. on your own (Do not forget to carry your swimwear).
</p>
<p>
<b>DAY 3:-</b>
Today after an American breakfast at the hotel, check out and drive to the capital city - Bangkok.   
 Chance to enjoy a fun-filled  with sky trian along with free time at Indra market/ MBK shopping center
 (at an additional cost):
       .
     </p>
        <p>
<b>DAY 4:-</b>
Today after an American breakfast at your hotel, day free at leisure OR get a chance to experience some adventure at Thailand’s greatest open-air zoo and Leisure Park. Whether it is an exciting safari drive through the picturesque African wilderness setting in the open zoo, an intimate encounter with the friendly dolphins and playful sea lions or an exhilarating fast-paced action stunt, spectacular Safari World has it all. Enjoy Indian Lunch at Marine Park for all who opt for an optional excursion. A drive through the scenic Safari Park presents a unique opportunity for the closest encounter possible with rare and endangered species of the animal kingdom.   .   </p>
<p>
<b>Day5:-</b>  
Today after an American breakfast at your hotel, proceed to the airport as this fantastic tour comes to an end. Return home with wonderful memories of your tour with Active7.</p>

<?
}elseif ($_GET['name']=="ANDA") {
  ?>
  <h3 class="tour_title">Special Andaman Tour</h3>

  <div class="tour_slider">
    <div class="tour_slider_img"><img src="assets/img/package/1.jpg" class="img-responsive" alt="image" /></div>
    <div class="tour_slider_img"><img src="assets/img/package/2.jpg" class="img-responsive" alt="image" /></div>
    <div class="tour_slider_img"><img src="assets/img/package/3.jpg" class="img-responsive" alt="image" /></div>
  </div>


  <p>
    <b>DAY 1 :-</b>
From kolkata Airport On arrive at Port Blair airport, our representative will receive and escort to the hotel. After check-in at the hotel and a little relax, we proceed to Cellular Jail (National Memorial). At evening, we move for the Light and Sound Show at Cellular Jail where the saga of the freedom struggle brought alive.<p>
<b>DAY2:-</b>
Today, we start our journey towards Havelock Island via ferry from Port Blair Harbor. On arrival at Havelock Island, our representative will receive and escort you to check-in to the resort. After relax, proceed to Radhanagar Beach (Beach No. 7), the Times Magazine rated the finest beach among the best beaches in Asia. It is an ideal place for swimming, sea bathing and basking on the sun-kissed the beach
</p>
<p>
<b>DAY 3:-</b>
Today morning proceed to Elephant Beach by sharing a boat, 1 session of Snorkeling complimentary for all pax. (Subject to operation).
.
</p>
<p>
<b>Note:</b> If Elephant Beach is not operational the guest would be taken to Kalapathar Beach.
</p>
<p>
<b>DAY 4:-</b>
oday Check out from Havelock Island & proceed back towards Port Blair (via ferry).  </p>
<p>
  <p>
  <b>Shopping:</b> At evening, we proceed to Sagarika ( the Govt. Emporium of Handcraft) and local market for shopping.
</p>
<b>Day5:-</b>  
<b>Depart From Andaman Island:</b>
 
Proceed to the airport as this fantastic tour comes to an end. Return home with wonderful memories of your tour with Active7..</p>


  <?php
}
?>
<!-- ANDAMAN -->

							<!-- START MAP -->
							<!-- <div class="tour-map">
								<h3 class="tour_title">Tour Location</h3>
								<iframe height="400" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d50431.01496117057!2d144.9372018671769!3d-37.81441383014957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2sbd!4v1572172541109!5m2!1sen!2sbd"></iframe>
							</div> -->
							<!-- END MAP -->
						</div>
					</div><!--- END COL -->

					<div class="col-lg-4 col-md-5 col-xs-12">
						<div class="book_now">
							<h4>Tour Booking</h4>
							<form id="contact-form" method="post" enctype="multipart/form-data">
								<div class="row">
									<div class="form-group col-md-12">
										<input type="text" name="name" class="form-control" id="first-name" placeholder="Name" required="required">
									</div>
									<div class="form-group col-md-12">
										<input type="email" name="email" class="form-control" id="email" placeholder="Email" required="required">
									</div>
									<div class="form-group col-md-12">
										<input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" required="required">
									</div>
									<div class="form-group col-md-12">
										<input type="text" name="date" class="form-control" id="date" placeholder="Date" required="required">
									</div>
									<div class="form-group col-md-12">
										<input type="text" name="person" class="form-control" id="person" placeholder="No of Person" required="required">
									</div>
									<div class="col-md-12">
										<div class="actions">
											<input type="submit" value="Submit" name="submit" class="book_now_btn"/>
										</div>
									</div>
								</div>
							</form>
						</div>


					</div>

          <!--- END COL -->
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</section>
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
