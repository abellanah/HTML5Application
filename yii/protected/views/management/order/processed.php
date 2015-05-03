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
                    <li><a href="<?php echo Yii::app()->createUrl('management/logout'); ?>" style="color:black"><b>Logout</b></a></li>
                </ul>
            </div>
        </div>
        <!-- end Topbar -->	

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'customer-grid',
            'dataProvider' => $model->search(),
            'columns' => array(
                'customer_name',
                'created_time',
                array(
                    'name' => 'total_amount',
                    'header' => 'Amount',
                    'value' => '"PHP ".number_format($data->total_amount,2)',
                ),
                array(
                    'class' => 'CButtonColumn',
                    'template' => '{view}{update}{delete}'
                ),
            ),
        ));
        ?>

        <!--Processed Orders-->
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Processed Orders</strong>
                <div class="pull-right">
                    <button type="button" class="btn btn-default btn-xs">Clear All</button>
                </div>
            </div>
            <div id="about" class="panel-body"> 	 		 	
                <div>
                    <table id="t02">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Item 1</td>
                                <td>2</td>
                                <td>29.99</td>
                                <td>59.98</td>
                            </tr>
                            <tr>
                                <td>Item 2</td>
                                <td>1</td>
                                <td>19.99</td>
                                <td>19.99</td>
                            </tr>
                            <tr>
                                <td>Item 3</td>
                                <td>5</td>
                                <td>40.00</td>
                                <td>200.00</td>
                            </tr>
                            <tr>
                                <td>Item 4</td>
                                <td>1</td>
                                <td>29.99</td>
                                <td>29.99</td>
                            </tr>
                            <tr>
                                <td>Item 5</td>
                                <td>2</td>
                                <td>75.00</td>
                                <td>150.00</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3"><b>TOTAL</b></td>
                                <td colspan="2"><b>100.00</b></td>
                            </tr>
                        </tfoot>
                    </table>
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
