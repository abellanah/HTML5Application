<div class="megatron">
    <div class="container">
        <div class="header">
            <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png" width="200" height="160" style="padding-top:10px; padding-left:50px" alt=""/>
            </div>
            <div class="top-menu">
                <span class="menu"></span>
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo Yii::app()->createUrl('site/index'); ?>"> << Continue Shopping</a></li> 
                    <li><a href="#" style="color:lightgray">Ordered Items</a></li> 
                    <li><a href="#" style="color:lightgray">Review</a></li> 
                    <li class="active"><a href="#"> <span style="color:blue"><b>Confirmation</b></span></a></li> 
                </ul>
            </div> 	
        </div>         
    </div>
    <div class="container padding3">
        <div class="panel panel1" style="background: rgba(52, 27, 43, 0.5);">
            <div class="panel-heading">
                <h1 class="major"> <span style="color:white"><b>Confirmation</b></span></h1>
                <p></p>
            </div>
            <div class="panel-body">
                <p><span style="font-size:larger; color:white">Your order confirmation number is <span style="font-size:larger; color:orange"><strong><?php echo $model->confirmation_no; ?></strong></span>.</span></p>
                <p><span style="font-size:larger; color:white">Please present this number to the Java Point Cafe staff to claim your order.</span></p>
                <p><span style="font-size:larger; color:white">Thank you!</span></p>
                <div class="padding4">
                    <a href="<?php echo Yii::app()->createUrl('site/index'); ?>" style="color:white" class="btn btn-info btn-lg"><b>Back to Home</b></a>
                </div>
            </div>

        </div>	
    </div>
</div>	 	 

<!--Footer-->
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
</script>
<!---->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>