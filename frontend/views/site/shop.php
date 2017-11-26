<?php 

// use frontend\widgets\facturesitemsWidget;
// use frontend\widgets\categorytabWidget;
// use frontend\widgets\recommendedWidget;
use frontend\widgets\shopWidget;
use frontend\widgets\leftsidebarWidget;

 ?>

 <div class="row">
                
                <?= leftsidebarWidget::widget();?>

                <div class="col-sm-9 padding-right">

					<?=shopWidget::widget();?>
				</div>
					
			</div>