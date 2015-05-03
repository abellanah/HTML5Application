<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="navbar navbar-collapse">	
        <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png" width="200" height="160" style="padding-top:10px; padding-left:50px" alt=""/>
        </div>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_menu.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>	
        <div id='cssmenu' style="font-family:'Open Sans', sans-serif; padding-top:200px;padding-left:15px">
            <ul>
                <li><span></span></li>
                <li><a href='<?php echo Yii::app()->createUrl('management/site'); ?>'><span>Configure Logo</span></a></li>
                <li><a href='<?php echo Yii::app()->createUrl('management/story'); ?>'><span>Configure Our Story</span></a></li>
                <li class='has-sub'><a href='#'><span>Configure Our Menu</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Brunch</span></a>
                            <ul>
                                <li><a class="scroll" href='#'><span>Omelettes</span></a>
                                <li><a class="scroll" href='#'><span>Waffles</span></a>
                                <li><a class="scroll" href='#'><span>Pancakes</span></a>
                                <li><a class="scroll" href='#'><span>Salads</span></a>
                                <li><a class="scroll" href='#'><span>Sandwiches</span></a>
                            </ul>  
                        <li><a class="scroll" href='#'><span>Coffee</span></a></li>
                        <li><a class="scroll" href='#'><span>Tea</span></a></li>
                        <li><a class="scroll" href='#'><span>Drinks</span></a></li>
                        <li class='last'><a class="scroll" href='#'><span>Pastries</span></a></li>
                    </ul>
                <li class="active" ><a href='<?php echo Yii::app()->createUrl('management/location'); ?>'><span>Configure Location & Hours</span></a></li>
            </ul>
        </div>

    </div>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'management-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
        'htmlOptions' => array('class' => 'form-horizontal')
    ));
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <div id="alertMsg">
            <?php
            if (isset(Yii::app()->session['alertMessage'])) {
                ?>
                <div class="alert alert-dismissable alert-<?php echo Yii::app()->session['alertMessage']['type']; ?>">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo Yii::app()->session['alertMessage']['message']; ?>
                </div>
                <?php
                unset(Yii::app()->session['alertMessage']);
            }
            ?>
        </div> 
        <!-- Topbar -->
        <div class="row">
            <div class="top-menu">
                <ul class="nav nav-pills" style="padding-top:40px">
                    <li><a class="#" href="<?php echo Yii::app()->createUrl('management/order'); ?>" style="color:black"><b>Order Management</b></a></li>
                    <li class="active"><a class="active" href="<?php echo Yii::app()->createUrl('management/site'); ?>" style="color:black"><b>Site Management</b></a></li>
                    <li><a class="active" target="_blank" href="<?php echo Yii::app()->createUrl('site/index'); ?>" style="color:black"><b>Navigate site</b></a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('management/logout'); ?>" style="color:black"><b>Logout</b></a></li>
                </ul>
            </div>
        </div>
        <!-- end Topbar -->	
        <?php if ($form->errorSummary($model)) { ?>
            <div class="alert alert-dismissable alert-danger" style="padding-left:30px;">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo $form->errorSummary($model); ?>
            </div>
        <?php } ?>
        <!--Configure Location & Hours-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Configure Location & Hours</strong>
                <div class="pull-right">
                    <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-default btn-xs')); ?>
                </div>
            </div>
            <div id="location" class="location panel-body">
                <div class="location-text">			
                    <h3>Location & Hours</h3>
                </div>
                <div class="location-grids">
                    <div class="col-md-4"> 
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/jpcimage.jpg" alt="image" style="width:320px;height:420px;border:5px solid white">	 
                    </div>
                    <div class="col-md-4 location-grid text-center">
                        <div>
                            <p><b>OUR LOCATION:</b></p>
                            <?php echo $form->textField($model, 'location_desc', array('class' => 'form-control')); ?>
                            <div class="icon2"></div>
                            <p>Enter link to Google map:</p>
                            <?php echo $form->textField($model, 'location_map', array('class' => 'form-control')); ?>
                        </div>
                        <div>
                            <p><b>OPEN HOURS:</b></p>
                            <?php echo $form->textField($model, 'location_hours', array('class' => 'form-control')); ?>
                        </div>
                        <div>
                            <div class="icon1"></div>
                            <p><b>CONTACT US:</b></p>
                            <?php echo $form->textField($model, 'location_contact_no', array('class' => 'form-control')); ?>
                            <p>Email:</p>
                            <?php echo $form->textField($model, 'location_contact_email', array('class' => 'form-control')); ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <a>
                            <iframe src="<?php echo $model->location_map; ?>" width="320" height="420" frameborder="0" style="border:0"></iframe>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->
    <?php $this->endWidget(); ?>
</div>

<!-- jQuery script-->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
<!--admin page JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/admin/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script> 
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min-sb.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/sb-admin-2.js"></script>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.colorbox-min.js"></script>
<script>
    jQuery(document).ready(function () {
        jQuery('a.gallery2').colorbox({opacity: 0.5});
    });
</script>
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