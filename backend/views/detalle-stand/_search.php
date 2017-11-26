<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleStandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-stand-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ds') ?>

    <?= $form->field($model, 'detalleMP_id') ?>

    <?= $form->field($model, 'producto_id') ?>

    <?= $form->field($model, 'estado_id') ?>

    <?= $form->field($model, 'precio_total') ?>

    <?php // echo $form->field($model, 'cantidades') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
