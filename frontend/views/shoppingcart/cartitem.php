<div class="table-responsive cart_info">
	<table class="table table-condensed">
		<thead>
			<tr class="cart_menu">
				<td class="image">Item</td>
				<td class="description"></td>
				<td class="price">Price</td>
				<td class="quantity">Quantity</td>
				<td class="total">Total</td>
				<td></td>
			</tr>
		</thead>
		<tbody>
			<?php 
			$subtotal=0;
               foreach ($cart as $key => $value) {
                 ?>
			<tr>
				<td class="cart_product">
					<a href=""><img  src="<?= '/peyco/backend/web/img/'.$value["imag_adju"]?>" alt="<?=$value["nombre"] ?>" width="100" ></a>
				</td>
				<td class="cart_description">
					<h4><a href="<?= Yii::$app->homeUrl.'product/detalle/'.$key ?>"><?=$value["nombre"] ?></a></h4>
					<p>Web ID: <?= $key;  ?></p>
				</td>
				<td class="cart_price">
					<p>$<?php echo number_format($value["costo"],0,"","." )?></p>
				</td>
				<td class="cart_quantity">
					<div class="cart_quantity_button">
						<a class="cart_quantity_up" href="javascript:void(0)" onclick="itemDown(<?= $key ?>)"> - </a>
						<input class="cart_quantity_input" type="text" name="quantity_<?=$key?>" id="quantity_<?=$key?>" value="<?= $value["pro_sl"] ?>" autocomplete="off" size="2">
						<a class="cart_quantity_down" href="javascript:void(0)" onclick="itemUp(<?= $key ?>)"> + </a>
					</div>
				</td>
				<td class="cart_total">
					<p class="cart_total_price">$<?= number_format($value["pro_sl"] * $value["costo"],0,"","." ); $subtotal +=$value["pro_sl"]* $value["costo"];  ?></p>
				</td>
				<td class="cart_delete">
					<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
				</td>
			</tr>
<?php } ?>
	    </tbody>
	</table>
</div>