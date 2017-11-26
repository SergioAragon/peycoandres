 <?php 

use frontend\models\Producto;



  ?>


  <div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <?php 
             $i=0;

foreach ($dataCla as $key => $value) {
    $i++;
    $class='';
    if ($i ==1) {
        $class= 'class="active"';
    }
             ?>
            <li <?php echo $class; ?>><a href="#<?php echo $value["descripcion"] ?>" data-toggle="tab"><?php echo $value["descripcion"] ?></a></li>
            <?php } ?>
            <!-- <li><a href="#blazers" data-toggle="tab">camisa</a></li> -->
        </ul>
    </div>
    <div class="tab-content">
 <?php 
$j=0;

foreach ($dataCla as $key => $value) {
    $j++;
    $class='';
    if($j==1) {
         $class ='class="active"';
    }
             ?>

        <div class="tab-pane fade <?php $class; ?> in" id="<?php echo $value["descripcion"] ?>" >
           <?php 
$product = new Producto();
$product = $product->getDataTabProductos($value["id_clasifi"]);
foreach ($product as $valuepro) {


            ?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                             <a href="<?=Yii::$app->homeUrl?> product/detalle/<?=$valuepro["id_producto"] ?>">
                            <img  id="img_<?=$valuepro["id_producto"]?>"      src="<?= '/peyco/backend/web/img/'.$valuepro["imag_adju"]?>" alt="<?= $valuepro["nombre"]  ?>" />
                               </a>
                            <h2 id="txtPre_<?=$valuepro["id_producto"]?>">$<?php echo number_format($valuepro["costo"],0,"","." )?></h2>
                            <p id="txtNom_<?=$valuepro["id_producto"]?>" >
                                <a href="<?=Yii::$app->homeUrl?>product/detalle/<?=$valuepro["id_producto"] ?>">
                                    
                                <?= $valuepro["nombre"]  ?>
                                    
                                </a>
                            </p>
                            <a href="javascript::void(0)"  onclick="addCart(<?=$valuepro["id_producto"]?>)"  class="btn btn-default add-to-cart")"> 
                                <i class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
<?php } ?>
    </div>
</div><!--/category-tab-->