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
                <li class="active" ><a href='<?php echo Yii::app()->createUrl('management/site'); ?>'><span>Configure Logo</span></a></li>
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
                <li><a href='<?php echo Yii::app()->createUrl('management/location'); ?>'><span>Configure Location & Hours</span></a></li>
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
        'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data',)
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
        <!-- Configure Logo -->	
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Configure Logo</strong>
                <div class="pull-right">
                    <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-default btn-xs')); ?>
                </div>
            </div>
            <div id="about" class="panel-body"> 
                <div class="row">
                    <div class="col-md-2">
                        <div style="padding-left:30px;padding-bottom:15px"><strong>Change picture</strong></div>
                        <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
                            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png" style="padding-left:30px;padding-bottom:30px" width="150" height="150" alt=""/>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="input-group" style="padding-left:30px;padding-top:50px">
                            <?php echo CHtml::activeFileField($model, 'logo', array('class' => 'btn btn-warning')); ?>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!--end Configure Logo-->	
    </div>
    <?php $this->endWidget(); ?>
    <!-- /#wrapper -->
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