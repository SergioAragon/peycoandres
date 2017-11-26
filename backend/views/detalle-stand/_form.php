<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\DetalleMaterialPedido;
use app\models\Producto;
use app\models\Estado;

/* @var $this yii\web\View */
/* @var $model app\models\DetalleStand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalle-stand-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'id_ds')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detalleMP_id')->DropDownList(
                                  ArrayHelper::map( DetalleMaterialPedido::find()->all(), 'id_dmp', 'id_dmp' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <?= $form->field($model, 'producto_id[]')->DropDownList(
                                  ArrayHelper::map( Producto::find()->all(), 'id_producto', 'nombre' ),
                                  [
                                            'prompt'=>'seleccione',
                                            'multiple'=>true

                                  ]
                                  );  ?>

    <?= $form->field($model, 'estado_id')->DropDownList(
                                  ArrayHelper::map( Estado::find()->all(), 'id_estado', 'descripcion' ),
                                  [
                                            'prompt'=>'seleccione'

                                  ]
                                  );  ?>

    <?= $form->field($model, 'precio_total')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cantidades')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
