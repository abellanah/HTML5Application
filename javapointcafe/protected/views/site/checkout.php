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
                    <li><a href="<?php echo Yii::app()->createUrl('site/showcart'); ?>">Ordered Items</a></li> 
                    <li class="active" ><a href="#"> <span style="color:blue"><b>Review</b></span></a></li> 
                    <li><a href="#" style="color:lightgray">Confirmation</a></li> 
                </ul>
            </div> 	
        </div>         
    </div>
    <div class="container">
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
        <div class="row">
            <div class="col-md-7">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Ordered Items Summary</strong>
                    </div>
                    <div class="panel-body">
                        <?php
                        if (isset(Yii::app()->session['cart'])) {
                            $cart = unserialize(Yii::app()->session['cart']);
                            echo '<table class="table table-hover">';
                            echo '<tr>';
                            echo '<th>Item</th>';
                            echo '<th>Quantity</th>';
                            echo '<th>Price</th>';
                            echo '<th>Amount</th>';
                            echo '</tr>';
                            $total = 0;
                            foreach ($cart as $key => $value) {
                                $item = Item::model()->findByPk($key);
                                echo '<tr>';
                                echo '<td>' . $item->item_description . '</td>';
                                echo '<td>' . $value . '</td>';
                                echo '<td>$' . number_format($item->item_price, 2) . '</td>';
                                echo '<td>$' . number_format($value * $item->item_price, 2) . '</td>';
                                echo '</tr>';
                                $total += ($value * $item->item_price);
                            }
                            echo '</table>';
                            echo "<h3>Grand Total: $" . number_format($total, 2) . "</h3>";
                        } else {
                            echo '<h4>Cart is empty.</h4>';
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong>Customer Information</strong><br />
                        <span style="color:red">*<i>Required fields</i></span>
                    </div>
                    <div class="panel-body">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'category-form',
                            'enableAjaxValidation' => false,
                        ));
                        ?>

                        <div class="form-group">
                            <label><span style="color:red">*</span>Name</label>
                            <?php echo $form->textField($model, 'customer_name', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'customer_name', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red">*</span>Email Address</label>
                            <?php echo $form->textField($model, 'customer_email', array('size' => 60, 'maxlength' => 255, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'customer_email', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red">*</span>Contact No</label>
                            <?php echo $form->textField($model, 'customer_contact', array('size' => 45, 'maxlength' => 45, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'customer_contact', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="form-group">
                            <label><span style="color:red">*</span>Preferred Pick-up Time</label>
                            <?php echo $form->timeField($model, 'customer_preferred_time', array('class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'customer_preferred_time', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="form-group">
                            <label>Special Instructions</label>
                            <?php echo $form->textArea($model, 'customer_instructions', array('rows' => 6, 'cols' => 50, 'class' => 'form-control')); ?>
                            <?php echo $form->error($model, 'customer_instructions', array('class' => 'text-danger')); ?>
                        </div>
                        <div class="checkbox">
                            <label>
                                <?php echo $form->checkBox($model, 'customer_subscribe'); ?> I want to receive promo alerts by email.
                            </label>
                        </div>
                        <div class="padding2">            
                            <?php echo CHtml::submitButton('Confirm Order', array('class' => 'btn btn-warning')); ?> 
                        </div>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>	
</div>	 	 


<!-- Main -->

<!---->
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
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
