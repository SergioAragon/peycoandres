<div class="product-details"><!--product-details-->
	<div class="col-sm-5">
		<div class="view-product">
			<img  id="img_<?=$data["id_producto"]?>" src="<?= '/peyco/backend/web/img/'.$data["imag_adju"]?>" alt="<?= $data["nombre"] ?>"/>
			<h3>ZOOM</h3>
		</div>
		<div id="similar-product" class="carousel slide" data-ride="carousel">

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar1.jpg" alt=""></a>
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar2.jpg" alt=""></a>
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar3.jpg" alt=""></a>
				</div>
				<div class="item">
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar1.jpg" alt=""></a>
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar2.jpg" alt=""></a>
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar3.jpg" alt=""></a>
				</div>
				<div class="item">
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar1.jpg" alt=""></a>
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar2.jpg" alt=""></a>
					<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/similar3.jpg" alt=""></a>
				</div>

			</div>

			<!-- Controls -->
			<a class="left item-control" href="#similar-product" data-slide="prev">
				<i class="fa fa-angle-left"></i>
			</a>
			<a class="right item-control" href="#similar-product" data-slide="next">
				<i class="fa fa-angle-right"></i>
			</a>
		</div>

	</div>
	<div class="col-sm-7">
		<div class="product-information"><!--/product-information-->
			<img src="<?=Yii::$app->homeUrl?>images/product-details/new.jpg" class="newarrival" alt="" />
			<h2  id="txtNom_<?=$data["id_producto"]?>"><?= $data["nombre"] ?></h2>
			<p>Web ID: <?= $data["id_producto"] ?></p>
			<img  id="img_<?=$data["id_producto"]?>" src="<?=Yii::$app->homeUrl?>images/product-details/rating.png" alt="" />
			<span>
				<span id="txtPre_<?=$data["id_producto"]?>">US $<?= $data["costo"]?></span>
				<label>Quantity:</label>
				<input type="text" value="3" name="number" id="number" />
				<button type="button" class="btn btn-fefault cart" onclick="addCart(<?=$data["id_producto"]?>)">
					<i class="fa fa-shopping-cart"></i>
					Add to cart
				</button>
			</span>
			<p><b>Availability:</b> In Stock</p>
			<p><b>Condition:</b> New</p>
			<p><b>Brand:</b> E-SHOPPER</p>
			<a href=""><img src="<?=Yii::$app->homeUrl?>images/product-details/share.png" class="share img-responsive"  alt="" /></a>
		</div><!--/product-information-->
	</div>
					</div><!--/product-details-->