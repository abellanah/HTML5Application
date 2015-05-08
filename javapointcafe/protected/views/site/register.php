<div id="wrapper">
    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="navbar navbar-collapse">	
        <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo/logo.png" width="200" height="160" style="padding-top:10px; padding-left:50px" alt=""/>
        </div>
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_menu.css">
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/script.js"></script>	
    </div>
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
                    <li><a class="active" href="<?php echo Yii::app()->createUrl('site/adduser'); ?>" style="color:black"><b>Register Admin</b></a></li>
                    <li><a href="<?php echo Yii::app()->createUrl('management/logout'); ?>" style="color:black"><b>Logout</b></a></li>
                </ul>
            </div>
        </div>
        <!-- end Topbar -->	
        <!-- Configure Logo -->	
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Add Admin User</strong>
            </div>
            <div class="panel-body">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'user-test-form',
                    // Please note: When you enable ajax validation, make sure the corresponding
                    // controller action is handling ajax validation correctly.
                    // See class documentation of CActiveForm for details on this,
                    // you need to use the performAjaxValidation()-method described there.
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form-horizontal')
                ));
                ?>
                <div class="row">
                    <div class="col-lg-2"><label class="control-label" >Username:</label></div>
                    <div class="col-lg-10"><?php echo $form->textField($model, 'user_username', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'user_username', array('class' => 'text-danger')); ?>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-2"><label class="control-label" >Password:</label></div>
                    <div class="col-lg-10"><?php echo $form->passwordField($model, 'user_password', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'user_password', array('class' => 'text-danger')); ?>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-2"><label class="control-label" >Confirm Password:</label></div>
                    <div class="col-lg-10"><?php echo $form->passwordField($model, 'confirm_user_password', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'confirm_user_password', array('class' => 'text-danger')); ?>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-2"><label class="control-label" >Full Name:</label></div>
                    <div class="col-lg-10"><?php echo $form->textField($model, 'user_full_name', array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'user_full_name', array('class' => 'text-danger')); ?>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-offset-2 col-lg-10"><?php echo CHtml::submitButton('Save', array('class' => 'btn btn-default')); ?></div>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
        <!--end Configure Logo-->	
    </div>
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
    jQuery(document).ready(function() {
        jQuery('a.gallery2').colorbox({opacity: 0.5});
    });
</script>
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