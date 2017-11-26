<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleFase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-fase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_e')->textInput() ?>

    <?= $form->field($model, 'fecha_s')->textInput() ?>

    <?= $form->field($model, 'fecha_cambioF')->textInput() ?>

    <?= $form->field($model, 'fase_id')->textInput() ?>

    <?= $form->field($model, 'estado_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
