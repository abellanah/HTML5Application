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
                        <li ><a href='<?php echo Yii::app()->createUrl('management/menuindex'); ?>'><span>Categories</span></a></li>
                        <li class='last'><a href='<?php echo Yii::app()->createUrl('management/viewcategory', array('id' => $category->category_id)); ?>'><span>Subcategories</span></a></li>
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
                    <li><a class="active" href="<?php echo Yii::app()->createUrl('site/adduser'); ?>" style="color:black"><b>Register Admin</b></a></li>
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
                <strong>Category: <?php echo $category->category_name; ?></strong>
            </div>
            <div  class="panel-body">
                <div class="panel panel-default">
                    <div class="panel-heading small">
                        <strong>Edit Category</strong>
                    </div>
                    <div  class="panel-body">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'category-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <div class="row">
                            <div class="col-lg-2">Category Name:</div>
                            <div class="col-lg-10"><?php echo $form->textField($category, 'category_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'category_name', array('class' => 'text-danger')); ?></div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-2"><?php echo CHtml::submitButton('Save', array('class' => 'btn btn-default')); ?></div>
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading small">
                        <strong>Manage subcategories</strong>
                    </div>
                    <div  class="panel-body">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'subcategory-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>
                        <div class="row">
                            <div class="col-lg-2">Subcategory Name:</div>
                            <div class="col-lg-10"><?php echo $form->textField($model, 'subcategory_name', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                                <?php echo $form->error($model, 'subcategory_name', array('class' => 'text-danger')); ?></div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-lg-10 col-lg-offset-2"><?php echo CHtml::submitButton('Add', array('class' => 'btn btn-default')); ?></div>
                        </div>
                        <?php $this->endWidget(); ?>
                        <div id="Gallery">
                            <?php
                            $this->widget('zii.widgets.grid.CGridView', array(
                                'id' => 'subcategory-grid',
                                'dataProvider' => $subcategories->search(),
                                'columns' => array(
                                    'subcategory_name',
                                    array(
                                        'class' => 'CButtonColumn',
                                        'template' => '{view}{delete}',
                                        'buttons' => array(
                                            'view' => array(
                                                'url' => 'Yii::app()->createUrl("management/viewsubcategory",array("id"=>$data->subcategory_id))',
                                            ),
                                            'delete' => array(
                                                'url' => 'Yii::app()->createUrl("management/deletesubcategory",array("id"=>$data->subcategory_id))',
                                            ),
                                        )
                                    ),
                                ),
                            ));
                            ?>

                        </div>
                    </div>
                </div>
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