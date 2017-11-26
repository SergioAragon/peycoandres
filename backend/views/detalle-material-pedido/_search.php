<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleMaterialPedidoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-material-pedido-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_dmp') ?>

    <?= $form->field($model, 'material_id') ?>

    <?= $form->field($model, 'cantidad') ?>

    <?= $form->field($model, 'costo') ?>

    <?= $form->field($model, 'pedido_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
