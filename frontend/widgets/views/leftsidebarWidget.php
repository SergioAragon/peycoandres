
<?php 

use frontend\widgets\categoryWidget;
use frontend\widgets\pricerangeWidget;
use frontend\widgets\shippingWidget;


 ?>

<div class="col-sm-3">
                    <div class="left-sidebar">
                       <?=categoryWidget::widget();?>
                       <?=pricerangeWidget::widget();?>
                       <?=shippingWidget::widget();?>
                    
                    </div>
                </div>
