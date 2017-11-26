<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'nombre') ?>

    

    <?= $form->field($model, 'cod_clasifi') ?>

    <?= $form->field($model, 'dimension_producto') ?>

    <?php // echo $form->field($model, 'imag_adju') ?>

    <?php // echo $form->field($model, 'unidades') ?>

    <?php // echo $form->field($model, 'costo') ?>

    <?php // echo $form->field($model, 'estado_id') ?>

    <?php // echo $form->field($model, 'color_id') ?>

    <?php // echo $form->field($model, 'cantidad_color') ?>

    <?php // echo $form->field($model, 'materiales_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
