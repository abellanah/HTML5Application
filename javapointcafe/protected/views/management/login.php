<div class="megatron">
    <div class="row">
        <div class="wow bounceIn">
            <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" style="padding-top:20px;padding-left:40px;padding-bottom:25px" alt=""/>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="banner-info">
            <h1 style="margin-bottom: 0px;">Java Point Cafe</h1>
            <div class="col-md-4"><span></span></div>
            <div class="col-md-4 banner-text" data-wow-delay="0.5s">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'login-form',
                    'enableClientValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'htmlOptions' => array('class' => 'form-horizontal'),
                ));
                ?>          
                <fieldset>
                    <legend>Login</legend>
                    <div class="form-group">
                        <div class="col-lg-3 control-label">Username</div>
                        <div class="col-lg-9">
                            <?php echo $form->textField($model, 'user_username', array('class' => 'form-control', 'placeholder' => 'Username')); ?>
                            <?php echo $form->error($model, 'user_username', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3 control-label">Password</div>
                        <div class="col-lg-9">
                            <?php echo $form->passwordField($model, 'user_password', array('class' => 'form-control', 'placeholder' => 'Password')); ?>
                            <?php echo $form->error($model, 'user_password', array('class' => 'text-danger')); ?>            </div>
                    </div>
                    <div class="col-lg-10 col-lg-offset-2">
                        <?php echo CHtml::submitButton('Login', array('class' => 'btn btn-warning')); ?>
                    </div>
                </fieldset>
            </div>
            <?php $this->endWidget(); ?>
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
    $(function () {
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