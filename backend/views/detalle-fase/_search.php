<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleFaseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-fase-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_df') ?>

    <?= $form->field($model, 'fecha_e') ?>

    <?= $form->field($model, 'fecha_s') ?>

    <?= $form->field($model, 'fecha_cambioF') ?>

    <?= $form->field($model, 'fase_id') ?>

    <?php // echo $form->field($model, 'estado_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
