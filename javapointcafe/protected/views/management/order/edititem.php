<!-- Navigation -->

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
                <li class="active" ><a href='<?php echo Yii::app()->createUrl('management/order'); ?>'><span>New Orders</span></a></li>
                <li><a href='<?php echo Yii::app()->createUrl('management/processed'); ?>'><span>Processed Orders</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'order-item-form',
        // Please note: When you enable ajax validation, make sure the corresponding 
        // controller action is handling ajax validation correctly. 
        // See class documentation of CActiveForm for details on this, 
        // you need to use the performAjaxValidation()-method described there. 
        'enableAjaxValidation' => false,
    ));
    ?>
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <!-- Topbar -->
        <div class="row">
            <div class="top-menu">
                <ul class="nav nav-pills" style="padding-top:40px">
                    <li class="active"><a class="#" href="<?php echo Yii::app()->createUrl('management/order'); ?>" style="color:black"><b>Order Management</b></a></li>
                    <li><a class="active" href="<?php echo Yii::app()->createUrl('management/site'); ?>" style="color:black"><b>Site Management</b></a></li>
                    <li><a class="active" target="_blank" href="<?php echo Yii::app()->createUrl('site/index'); ?>" style="color:black"><b>Navigate site</b></a></li>
                    <li><a class="active" href="<?php echo Yii::app()->createUrl('site/adduser'); ?>" style="color:black"><b>Register Admin</b></a></li>
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
        <!-- New Orders -->	
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Edit Item Order - <?php echo $model->orderItem->item_description; ?></strong>
                <div class="pull-right">
                    <!--<button type="button" class="btn btn-default btn-xs">Save</button>-->
                    <?php echo CHtml::submitButton('Save', array('class' => 'btn btn-default btn-xs')); ?>
                </div>
            </div>
            <div class="panel-body"> 
                <div>
                    Order Item Quantity: <?php echo $form->textField($model, 'order_quantity', array('class' => 'form-control')); ?>
                </div>
            </div>
        </div>
        <!--end New Orders-->	
        <!-- /#page-content-wrapper -->
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
