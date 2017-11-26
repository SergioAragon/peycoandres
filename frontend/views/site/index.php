<?php 

use frontend\widgets\facturesitemsWidget;
use frontend\widgets\categorytabWidget;
use frontend\widgets\recommendedWidget;
use frontend\widgets\silderWidget;
use frontend\widgets\leftsidebarWidget;

 ?>

			<?=silderWidget::widget();?>
        
            <div class="row">
                
                <?= leftsidebarWidget::widget();?>

                <div class="col-sm-9 padding-right">
        
				<?=facturesitemsWidget::widget();?>
				<?=categorytabWidget::widget();?>
				<?=recommendedWidget::widget();?>
    
                </div>
            </div>