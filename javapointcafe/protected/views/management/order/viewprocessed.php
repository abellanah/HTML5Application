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
                <li><a href='<?php echo Yii::app()->createUrl('management/order'); ?>'><span>New Orders</span></a></li>
                <li class="active"><a href='<?php echo Yii::app()->createUrl('management/processed'); ?>'><span>Processed Orders</span></a></li>
            </ul>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

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

        <!--Processed Orders-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Customer Name: <?php echo $model->customer_name; ?></strong>
            </div>
            <div id="about" class="panel-body"> 	 		 	
                <div>
                    <?php
                    $this->widget('zii.widgets.grid.CGridView', array(
                        'id' => 'customer-view-grid',
                        'dataProvider' => $orders->search(),
                        'columns' => array(
                            'orderItem.item_description',
                            'order_quantity',
                            array(
                                'header' => 'Item Price',
                                'value' => '"$".number_format($data->orderItem->item_price,2)',
                                'htmlOptions' => array('style' => 'text-align: right;')
                            ),
                            array(
                                'header' => 'Amount',
                                'value' => '"$".number_format($data->orderItem->item_price * $data->order_quantity,2)',
                                'htmlOptions' => array('style' => 'text-align: right;')
                            ),
                        ),
                    ));
                    ?>
                </div>
                <div class="col-lg-12">
                    TOTAL AMOUNT: $<?php echo number_format($orders->orderCustomer->total_amount, 2) ?>
                </div>
            </div>
        </div>
        <!--end Processed Orders-->

        <!-- /#page-content-wrapper -->
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
