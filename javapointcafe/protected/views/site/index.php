<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<div style="float:right;">
    <a href="<?php echo Yii::app()->createUrl('management/login'); ?>" class="navbar-brand">Store Login</a> 
</div>
<!-- Home -->
<div class="banner">
    <div class="container">
        <div class="header">
            <div class="logo wow fadeInLeft col-md-12 text-center" data-wow-delay="0.5s">
                <a href="index.html"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png" alt=""/></a>
            </div>
            <div class="top-menu col-md-12 text-center" style="font-family: 'Open Sans', sans-serif; font-size: 18px; font-weight: 800;">
                <span class="menu"></span>
                <ul>
                    <li class="active"><a href="#about">OUR STORY</a></li>
                    <li><a class="scroll" href="#Gallery">MENU</a></li>
                    <li><a class="scroll" href="#location">LOCATION AND HOURS</a></li>	
                    <li class="active" ><a href="checkout.html">YOUR ORDER</a></li>
                </ul>
            </div>
            <!-- script-for-menu -->
            <script>
                $("span.menu").click(function() {
                    $(".top-menu ul").slideToggle("slow", function() {
                    });
                });
            </script>
            <!-- script-for-menu -->	  	       
        </div>
        <span> </span>  
        <span> </span> 

        <!-- Landing page slideshow -->
        <!-- bxSlider Javascript file -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.bxslider.min.js"></script>
        <!-- bxSlider CSS file -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.bxslider.css" rel="stylesheet" type='text/css' property=""/>                     
        <script type="text/javascript">
                $(document).ready(function() {
                    $('.bxslider').bxSlider({mode: 'fade', captions: true, auto: true});
                });
        </script>

        <div class="banner-info">
            <div class="col-md-10">
                <ul class="bxslider">
                    <?php
                    foreach ($items as $value) {
                        echo '<li>';
                        echo '<img src="' . Yii::app()->request->baseUrl . '/images/menu/' . $value->item_image . '" title="' . $value->item_description . '" width="920" height="494" />';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Landing page slideshow END -->
    </div>
</div>

<!-- Our Story -->
<div id="about" class="content">
    <div class="container">
        <div class="gallery-head">
            <div class="col-md-6 about-device wow fadeInLeft" data-wow-delay="0.5s">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/java.png" width="480" height="650" alt=""/>
            </div>
            <div class="col-md-6 about-device-info wow fadeInRight" data-wow-delay="0.5s">
                <div class="device-text">					 
                    <h3 style="font-family: 'Open Sans', sans-serif;">OUR STORY</h3>

                    <p><?php echo $details->story_desc_1;?></p>
                </div>
                <div class="about-list">
                    <ul>
                        <li><b><?php echo $details->story_desc_2;?></b></li>
                        <li><b><?php echo $details->story_desc_3;?></b></li>
                        <li><b><?php echo $details->story_desc_4;?></b></li>
                        <li><b><?php echo $details->story_desc_5;?></b></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div> 
    </div>
</div>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox-min.js"></script>
<script>
                jQuery(document).ready(function() {
                    jQuery('a.gallery2').colorbox({opacity: 0.5});
                });
</script>


<!-- Gallery -->
<div id="Gallery" class="content">
    <div class="container">
        <div class="gallery-head">
            <h3 style="font-family: 'Open Sans', sans-serif;">OUR MENU</h3>
        </div>
        <!-- Side menu start -->
        <div class="col-md-3 gallery-top">
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_menu.css">
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>

            <div id='cssmenu' style="font-family: 'Open Sans', sans-serif">
                <ul>
                    <li class='active'><a href='#Gallery'><span>Full Menu</span></a></li>
                    <li class='has-sub'><a href='#'><span>Brunch</span></a>
                        <ul>
                            <li><a href='#test'><span>Omelettes</span></a>
                            <li><a href='#'><span>Waffles</span></a>
                            <li><a href='#'><span>Pancakes</span></a>
                            <li><a href='#'><span>Salads</span></a>
                            <li><a href='#'><span>Sandwiches</span></a>
                        </ul>      
                    <li><a href='#'><span>Coffee</span></a></li>
                    <li><a href='#'><span>Tea</span></a></li>
                    <li><a href='#'><span>Drinks</span></a></li>
                    <li class='last'><a href='#'><span>Pastries</span></a></li>
                </ul>
            </div>
        </div>
        <!-- Side menu end -->
        <div class="col-md-9 gallery-top">
            <div class="gallery" style="font-family: 'Open Sans', sans-serif">
                <ul>
                    <li class="wow bounceIn" data-wow-delay="0.5s">
                        <div style="clear: both">
                            <h3 style="float:left">Breakfast Burrito</h3>
                            <h3 style="float:right">$5.05</h3>
                        </div>
                        <a class='gallery2' href="<?php echo Yii::app()->request->baseUrl; ?>/images/g5.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g5.jpg" alt=""/></a> 
                        <div class="row">
                            <div style="clear: both; padding-top:0.5em; padding-bottom:2em">
                                <div class="col-lg-6 text-center" style="float:right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Add To Cart</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="wow bounceIn" data-wow-delay="0.5s">
                        <div style="clear: both">
                            <h3 style="float:left">VEGETARIAN BENEDICT</h3>
                            <h3 style="float:right">$5.05</h3>
                        </div>
                        <a class='gallery2' href="<?php echo Yii::app()->request->baseUrl; ?>/images/g1.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g1.jpg" alt=""/></a> 
                        <div class="row">
                            <div style="clear: both; padding-top:0.5em; padding-bottom:2em">
                                <div class="col-lg-6 text-center" style="float:right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Add To Cart</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="wow bounceIn" data-wow-delay="0.5s">
                        <div style="clear: both">
                            <h3 style="float:left">CLASSIC EGG BENEDICT</h3>
                            <h3 style="float:right">$5.05</h3>
                        </div>
                        <a class='gallery2' href="<?php echo Yii::app()->request->baseUrl; ?>/images/g2.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g2.jpg" alt=""/></a> 
                        <div class="row">
                            <div style="clear: both; padding-top:0.5em; padding-bottom:2em">
                                <div class="col-lg-6 text-center" style="float:right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Add To Cart</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="wow bounceIn" data-wow-delay="0.5s">
                        <div style="clear: both">
                            <h3 style="float:left">HUEVOS RANCHEROS</h3>
                            <h3 style="float:right">$5.05</h3>
                        </div>
                        <a class='gallery2' href="<?php echo Yii::app()->request->baseUrl; ?>/images/g3.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g3.jpg" alt=""/></a> 
                        <div class="row">
                            <div style="clear: both; padding-top:0.5em; padding-bottom:2em">
                                <div class="col-lg-6 text-center" style="float:right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Add To Cart</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="wow bounceIn" data-wow-delay="0.5s">
                        <div style="clear: both">
                            <h3 style="float:left">CHICKEN QUESADILLA</h3>
                            <h3 style="float:right">$5.05</h3>
                        </div>
                        <a class='gallery2' href="<?php echo Yii::app()->request->baseUrl; ?>/images/g4.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g4.jpg" alt=""/></a> 
                        <div class="row">
                            <div style="clear: both; padding-top:0.5em; padding-bottom:2em">
                                <div class="col-lg-6 text-center" style="float:right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Add To Cart</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="wow bounceIn" data-wow-delay="0.5s">
                        <div style="clear: both">
                            <h3 style="float:left">BERRY PANCAKE</h3>
                            <h3 style="float:right">$5.05</h3>
                        </div>
                        <a class='gallery2' href="<?php echo Yii::app()->request->baseUrl; ?>/images/g6.jpg"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g6.jpg" alt=""/></a> 
                        <div class="row">
                            <div style="clear: both; padding-top:0.5em; padding-bottom:2em">
                                <div class="col-lg-6 text-center" style="float:right">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="1" value="1">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Add To Cart</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>                    

                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>      

<!-- Location -->
<div id="location" class="location">
    <div class="container">
        <div class="location-text">			
            <h3 style="font-family: 'Open Sans', sans-serif;">LOCATION & HOURS</h3>
            <span></span>	
        </div>
        <div class="location-grids">
            <div class="col-md-4 wow bounceIn" data-wow-delay="0.4s"> 
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/jpcimage.jpg" alt="image" style="width:360px;height:420px;border:5px solid white">	 
            </div>
            <div class="col-md-4 location-grid text-center wow bounceIn" data-wow-delay="0.4s">
                <div>
                    <p><b>OUR LOCATION:</b></p>
                    <p><?php echo $details->location_desc;?></p>
                    <wbr>
                    <div class="icon2"></div>
                    <a href="<?php echo $details->location_map;?>" class="location-padding" style="color:light blue">Directions</a>
                </div>
                <div>
                    <p><b>OPEN HOURS:</b></p>
                    <p class="location-padding"><?php echo $details->location_hours;?></p>
                </div>
                <div>
                    <div class="icon1"></div>
                    <p><b>CONTACT US:</b></p>
                    <p><?php echo $details->location_contact_no;?></p>
                    <a href="mailto:<?php echo $details->location_contact_email;?>"><?php echo $details->location_contact_email;?></a>
                </div>
            </div>
            <div class="col-md-4 wow bounceIn" data-wow-delay="0.4s">
                <a>
                    <iframe src="<?php echo $details->location_map;?>" width="360" height="420" frameborder="0" style="border:0"></iframe>
                </a>
            </div>
            <a class="wow bounceIn col-md-12 text-center "data-wow-delay="0.5s" href="<?php echo Yii::app()->createUrl('site/index'); ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt=""/></a>
            <div class="clearfix"></div>
        </div>
    </div>	 

</div>
<!---->
<div class="footer text-center">
    <div class="container">		

        <p class="wow bounceIn" data-wow-delay="0.4s">Copyright &copy; 2015 Java Point Cafe. All rights reserved.</p>
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
                    $().UItoTop({easingType: 'easeOutQuart'});
                });
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"></span></a>
<!---->
