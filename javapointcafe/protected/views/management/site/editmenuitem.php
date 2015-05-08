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
                <li class="active has-sub open"><a href='#'><span>Configure Our Menu</span></a>
                    <ul style="display: block;">
                        <li><a href='<?php echo Yii::app()->createUrl('management/menuindex'); ?>'><span>Categories</span></a></li>
                        <li><a href='<?php echo Yii::app()->createUrl('management/viewcategory', array('id' => $model->subcategory->category_id)); ?>'><span>Subcategories</span></a></li>
                        <li class='last'><a href='<?php echo Yii::app()->createUrl('management/viewsubcategory', array('id' => $model->subcategory->subcategory_id)); ?>'><span>Items</span></a></li>
                    </ul>
                </li>
                <li><a href='<?php echo Yii::app()->createUrl('management/location'); ?>'><span>Configure Location & Hours</span></a></li>
            </ul>
        </div>

    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
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
        <!--Configure Our Menu-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Category: <?php echo $model->subcategory->category->category_name; ?>
                    <br /> Subcategory: <?php echo $model->subcategory->subcategory_name; ?>
                    <br /> Item: <?php echo $model->item_description; ?>
                </strong>
            </div>
            <div class="panel-body">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'category-form',
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data',)
                ));
                $allsubcategoriesModel = Subcategory::model()->findAll();
                $allsubcategories = array();
                foreach ($allsubcategoriesModel as $value) {
                    $allsubcategories[$value->subcategory_id] = $value->category->category_name . ' - ' . $value->subcategory_name;
                }
                ?>
                <div class="row">
                    <div class="col-lg-2">Subcategory:</div>
                    <div class="col-lg-10"><?php echo $form->dropDownList($model, 'subcategory_id', $allsubcategories, array('class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'subcategory_id', array('class' => 'text-danger')); ?></div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-2">Item Name:</div>
                    <div class="col-lg-10"><?php echo $form->textField($model, 'item_description', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'item_description', array('class' => 'text-danger')); ?></div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-2">Item Price:</div>
                    <div class="col-lg-10"><?php echo $form->textField($model, 'item_price', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                        <?php echo $form->error($model, 'item_price', array('class' => 'text-danger')); ?></div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-2">Item Image:</div>
                    <div class="col-lg-10">
                        <?php echo CHtml::activeFileField($model, 'item_image', array('class' => 'btn btn-warning')); ?>
                        <?php echo $form->error($model, 'item_image', array('class' => 'text-danger')); ?>
                        <img src="<?php echo Yii::app()->request->baseUrl . "/images/menu/" . $model->item_image; ?>" width="334" height="209" style="margin-top:10px; border: 1px solid rgb(236, 236, 236);" alt=""/>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-2"><?php echo CHtml::submitButton('Save', array('class' => 'btn btn-default')); ?></div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
        </div>
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