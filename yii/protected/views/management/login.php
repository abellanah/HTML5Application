<div class="megatron">
<div class="row">
	<div class="wow bounceIn">
	<div class="logo wow fadeInLeft" data-wow-delay="0.5s">
		<a href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" style="padding-top:20px;padding-left:40px;padding-bottom:25px" alt=""/></a>
	</div>
	</div>
</div>
	 <div class="container">
		 <div class="banner-info">
			<h1>Java Point Cafe</h1>
			<div class="col-md-4"><span></span></div>
			 <div class="col-md-4 banner-text" data-wow-delay="0.5s">
				 <form style="background:rgba(255, 255, 255, 0.27);width:360px; height:200px">
					 <h3 style="color:white;padding-top:15px"><strong>Log-in</strong></h3>
					  <div class="form-group" style="padding-top:20px">
						<label style="color:white">Username:</label>
						<input type="text"></input>
					  </div>
					  <div class="form-group">
						<label style="color:white">Password:</label>
						<input type="text"></input>
					  </div>
                                          <a href="index-ordermgt.html" style="font-size:larger; color:white">
                                              <button type="button" class="btn btn-info btn-lg" style="background-color:blue"><b>Submit</b></button>  
                                          </a>

				 </form>
			 </div>
			 <div class="col-md-4"><span></span></div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<!---->
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/responsiveslides.min.js"></script>
  <script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider2").responsiveSlides({
        auto: true,
        pager: true,
        speed: 300,
        namespace: "callbacks",
      });
    });
  </script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.lightbox.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/lightbox.css" media="screen" />
		<script type="text/javascript">
			$(function() {
				$('.gallery a').lightBox();
			});
</script>

<!---->
<div class="footer text-center">
	 <div class="container">				 
		 <p class="wow bounceIn" data-wow-delay="0.4s">Copyright &copy; 2015 Java Point Cafe. All rights reserved</p>
		 <div class="social">			 
			 <a href="#"><span class="behance"></span></a>
			 <a href="#"><span class="dribble"></span></a>
			 <a href="#"><span class="twitter"></span></a>
			 <a href="#"><span class="facebook"></span></a>
			 <a href="#"><span class="linkedin"></span></a>
		 </div>
	 </div>
</div>
<!---->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>