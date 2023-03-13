	<!-- Footer Bootom -->
    <div class="footer-bottom">
			<div class="container">
				<div class="col-md-6 col-sm-6">
					<p>&copy; 2022 VO THANH PHU All Rights Reserved. </p>
				</div>
				<div class="col-md-6 col-sm-6">
					<nav class="navbar navbar-default">						
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#footer-menu" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="navbar-collapse collapse" id="footer-menu">
							<ul class="nav navbar-nav">
								<li><a href="about-us.html">Tất cả tin</a></li>
								<li><a href="#">Thể loại</a></li>
								<li><a href="#">Đăng nhập</a></li>
								<li><a href="contact-us.html">Liên hệ</a></li>
							</ul>
						</div>
					</nav>
				</div>
			</div>
		</div><!-- Footer Bootom /- -->
	</div>
	<!-- Footer Section /- -->
	
	<!-- jQuery Include -->
	<script src="libraries/jquery.min.js"></script>	
	<script src="libraries/jquery.easing.min.js"></script><!-- Easing Animation Effect -->
	<script src="libraries/bootstrap/bootstrap.min.js"></script> <!-- Core Bootstrap v3.2.0 -->
	<script src="libraries/jquery.animateNumber.min.js"></script> <!-- Used for Animated Numbers -->
	<script src="libraries/jquery.appear.js"></script> <!-- It Loads jQuery when element is appears -->
	<script src="libraries/jquery.knob.js"></script> <!-- Used for Loading Circle -->
	<script src="libraries/wow.min.js"></script> <!-- Use For Animation -->
	<script src="libraries/flexslider/jquery.flexslider-min.js"></script> <!-- flexslider   -->
	<script src="libraries/owl-carousel/owl.carousel.min.js"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="libraries/expanding-search/modernizr.custom.js"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="libraries/expanding-search/classie.js"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script src="libraries/expanding-search/uisearch.js"></script> <!-- Core Owl Carousel CSS File  *	v1.3.3 -->
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>
	<script type="text/javascript" src="libraries/jssor.js"></script>
    <script type="text/javascript" src="libraries/jssor.slider.min.js"></script>
	<script type="text/javascript" src="libraries/jquery.marquee.js"></script>
	<!-- Customized Scripts -->
	<script src="js/functions.js"></script>
	<script type="text/javascript" ></script>
	

</body>
<script>
$(document).ready(function(){
    $.ajax({url: "/loait",
		 success: function(result){
      $("#data").html(result);
    }});
});

</script>

</html>