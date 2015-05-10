<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>
<!-- Home -->
<div class="banner">
    <div class="container">
        <div class="header">
            <div class="logo wow fadeInLeft col-md-12 text-center" data-wow-delay="0.5s">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png" width="200" height="160" style="padding-top:10px; padding-left:50px" alt=""/>
            </div>
            <div class="top-menu col-md-12 text-center" style="font-family: 'Open Sans', sans-serif; font-size: 18px; font-weight: 800;">
                <span class="menu"></span>
                <ul>
                    <li class="active"><a href="#about">OUR STORY</a></li>
                    <li><a class="scroll" href="#Gallery">MENU</a></li>
                    <li><a class="scroll" href="#location">LOCATION AND HOURS</a></li>	
                    <li class="active" ><a href="<?php echo Yii::app()->createUrl('site/showcart'); ?>">YOUR ORDER</a></li>
                </ul>
            </div>
            <!-- script-for-menu -->
            <script>
                $("span.menu").click(function () {
                    $(".top-menu ul").slideToggle("slow", function () {
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
                $(document).ready(function () {
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

                    <p><?php echo $details->story_desc_1; ?></p>
                </div>
                <div class="about-list">
                    <ul>
                        <li><b><?php echo $details->story_desc_2; ?></b></li>
                        <li><b><?php echo $details->story_desc_3; ?></b></li>
                        <li><b><?php echo $details->story_desc_4; ?></b></li>
                        <li><b><?php echo $details->story_desc_5; ?></b></li>
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
                jQuery(document).ready(function () {
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
                    <?php
                    $categories = Category::model()->findAll();

                    foreach ($categories as $category) {
                        $subcategories = $category->subcategories;
                        if ($subcategories) {
                            echo "<li class='has-sub'>";
                            echo "<a href='#'>";
                            echo "<span>" . $category->category_name . "</span>";
                            echo "</a>";

                            echo "<ul>";
                            foreach ($subcategories as $subcategory) {
                                echo "<li><a class='scroll' href='#sc" . $subcategory->subcategory_id . "'><span>" . $subcategory->subcategory_name . "</span></a></li>";
                            }
                            echo '</ul>';
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <!-- Side menu end -->
        <div class="col-md-9 gallery-top">
            <?php
            foreach ($categories as $category) {
                $subcategories = $category->subcategories;
                if ($subcategories) {
                    foreach ($subcategories as $subcategory) {
                        $items = $subcategory->items;
                        if ($items) {
                            echo "<div class='gallery' id='sc" . $subcategory->subcategory_id . "' style=\"font-family: 'Open Sans', sans-serif\">";
                            echo "<ul>";
                            foreach ($items as $item) {
                                echo "<li class='wow bounceIn' data-wow-delay='0.5s'>";
                                echo "<div style='clear:both;'>";
                                echo "<h3 style='float:left'>" . $item->item_description . "</h3>";
                                echo "<h3 style='float:right'>$" . number_format($item->item_price, 2) . "</h3>";
                                echo "</div>";
                                echo "<a class='gallery2' href='" . Yii::app()->request->baseUrl . "/images/menu/" . $item->item_image . "'>";
                                echo "<img src='" . Yii::app()->request->baseUrl . "/images/menu/" . $item->item_image . "' width='334' height='209' alt='' />";
                                echo "</a>";
                                echo "<div class='row'>";
                                echo "<div style='clear: both; padding-top:0.5em; padding-bottom:2em'>";
                                echo "<div class='col-lg-7 text-center' style='float:right'>";
                                echo "<div class='input-group'>";
                                echo "<input type='number' min='1' id='item" . $item->item_id . "' class='form-control' placeholder='1' value='1'>";
                                echo "<span class='input-group-btn'>";
                                echo "<button class='btn btn-default' onclick='addToCart(" . $item->item_id . ")'>Add To Cart</button>";
                                echo "</span>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                                echo "</li>";
                            }
                            echo "</ul>";
                            echo "</div>";
                        }
                    }
                }
            }
            ?>
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
                    <p><?php echo $details->location_desc; ?></p>
                    <wbr>
                    <div class="icon2"></div>
                    <a href="<?php echo $details->location_map; ?>" class="location-padding" style="color:light blue">Directions</a>
                </div>
                <div>
                    <p><b>OPEN HOURS:</b></p>
                    <p class="location-padding"><?php echo $details->location_hours; ?></p>
                </div>
                <div>
                    <div class="icon1"></div>
                    <p><b>CONTACT US:</b></p>
                    <p><?php echo $details->location_contact_no; ?></p>
                    <a href="mailto:<?php echo $details->location_contact_email; ?>"><?php echo $details->location_contact_email; ?></a>
                </div>
            </div>
            <div class="col-md-4 wow bounceIn" data-wow-delay="0.4s">
                <a>
                    <iframe src="<?php echo $details->location_map; ?>" width="360" height="420" frameborder="0" style="border:0"></iframe>
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
        <a href="<?php echo Yii::app()->createUrl('management/login'); ?>" class="btn btn-xs btn-warning">Store Login</a>
    </div>
</div>

<!---->
<script type="text/javascript">
                $(document).ready(function () {
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
                function addToCart(iid) {
                    if (document.getElementById('item' + iid)) {
                        quantity = document.getElementById('item' + iid).value;
                        $.ajax({
                            url: "/javapointcafe/index.php/site/addtocart",
                            method: "GET",
                            data: {item_id: iid, item_quantity: quantity},
                            success: function (response) {
                                $data = JSON.parse(response);
                                bootbox.alert($data['result']);
                            }
                        });
                    }
                }

//    function removeEmployee(training_id, company_id) {
////        alert(company_id);
//        $.ajax({
//            url: 'removeUser',
//            method: 'GET',
//            data: {tid: training_id, eid: company_id},
//            success: function(response) {
//                $.fn.yiiGridView.update('participants-grid');
//                $.fn.yiiGridView.update('pending-grid');
//            }
//        });
//    }
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"></span></a>
<!---->
