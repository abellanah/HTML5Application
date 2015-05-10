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
                    <li class="active" ><a href="#"> <span style="color:blue"><b>Ordered Items</b></span></a></li> 
                    <li><a href="#" style="color:lightgray"> Review</a></li> 
                    <li><a href="#" style="color:lightgray"> Confirmation</a></li> 
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
        <div class="well">
            <form class="form-horizontal" method="post" action="<?php echo Yii::app()->createUrl('site/updatecart'); ?>">
                <div class="row">
                    <div class="col-lg-2 col-lg-offset-1">
                        <label class="control-label">Select Item: </label>
                    </div>
                    <?php
                    $items_array = array();
                    foreach ($items as $item) {
                        $items_array[$item->item_id] = $item->item_description;
                    }
                    ?>
                    <div class="col-lg-4">
                        <?php echo CHtml::dropDownList('item_id', '', $items_array, array('class' => 'form-control')); ?>
                    </div>
                    <div class="col-lg-1">
                        <?php echo CHtml::numberField('item_quantity', '1', array('class' => 'form-control', 'min' => 1)); ?>
                    </div>
                    <div class="col-lg-2">
                        <?php echo CHtml::submitbutton('Add to Cart', array('class' => 'btn btn-warning')); ?>
                    </div>
                </div>
            </form>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>Ordered Items Summary</strong>
            </div>
            <div class="panel-body">
                <?php
                if (isset(Yii::app()->session['cart'])) {
                    $cart = unserialize(Yii::app()->session['cart']);
                    if ($cart) {
                        echo '<table class="table table-hover">';
                        echo '<tr>';
                        echo '<th>Item</th>';
                        echo '<th>Quantity</th>';
                        echo '<th>Price</th>';
                        echo '<th>Amount</th>';
                        echo '<th></th>';
                        echo '</tr>';
                        $total = 0;
                        foreach ($cart as $key => $value) {
                            $item = Item::model()->findByPk($key);
                            echo '<tr>';
                            echo '<td>' . $item->item_description . '</td>';
                            echo '<td>' . $value . '</td>';
                            echo '<td>$' . number_format($item->item_price, 2) . '</td>';
                            echo '<td>$' . number_format($value * $item->item_price, 2) . '</td>';
                            echo '<td>' . Chtml::link('X', array('site/removefromcart/' . $key), array('class' => 'btn btn-xs btn-danger', 'onclick' => 'return confirm("Are you sure you want to delete this item from cart?");')) . '</td>';
                            echo '</tr>';
                            $total += ($value * $item->item_price);
                        }
                        echo '</table>';
                        echo "<h3>Grand Total: $" . number_format($total, 2) . "</h3>";
                        echo '<div class="container padding1">';
                        echo '<a href="' . Yii::app()->createUrl('site/checkout') . '" class="btn btn-warning"><b>Submit order</b></a>';
                        echo '</div>';
                    } else {
                        echo '<h4>Cart is empty.</h4>';
                    }
                } else {
                    echo '<h4>Cart is empty.</h4>';
                }
                ?>
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

    function changeQuantity(item_id) {
        bootbox.alert("Enter new quantity", function (new_quantity) {
            alert(new_quantity + " - " + item_id);
        });
    }


</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!---->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>