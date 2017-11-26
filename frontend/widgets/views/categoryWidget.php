<?php 

use frontend\models\Clasificacion;


 ?>


<h2>Category</h2>
<div class="panel-group category-products" id="accordian"><!--category-productsr-->
	<?php 

foreach ($datapa as $key => $value) {
$dataSub = new Clasificacion();
		$dataSub= $dataSub->getClasifBy($value["id_clasifi"]);

	 ?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordian" href="#<?= $value["descripcion"] ?>">

<?php 
if ($dataSub) {

 ?>

					<span class="badge pull-right"><i class="fa fa-plus"></i></span>
					<?php } ?>
				<?php echo $value["descripcion"]?>
				</a>
			</h4>
		</div>
		<?php 
		if ($dataSub) {
		
		 ?>
		<div id="<?= $value["descripcion"]?>" class="panel-collapse collapse">
			<div class="panel-body">
				<ul>
					<?php 

foreach ($dataSub as  $valueSub) {
	# code...


					 ?>
					<li><a href="<?=Yii::$app->homeUrl."product/listbycat/".$valueSub["id_clasifi"]?>"><?php echo $valueSub["descripcion"] ?> </a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		<?php } ?>
	</div>
<?php } ?>
</div><!--/category-products-->